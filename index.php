<?php
// Configurações do banco de dados
$host = 'db';
$user = 'root';
$password = 'senha';
$database = 'meu_banco';

// Conexão com o banco de dados
$mysqli = new mysqli($host, $user, $password, $database);

// Verifica se ocorreu algum erro na conexão
if ($mysqli->connect_errno) {
    die('Erro ao conectar-se ao banco de dados: ' . $mysqli->connect_error);
}

// Inclui uma nova pessoa no banco de dados
if (isset($_POST['nome']) && isset($_POST['idade'])) {
    $stmt = $mysqli->prepare('INSERT INTO pessoas (nome, idade) VALUES (?, ?)');
    $stmt->bind_param('si', $_POST['nome'], $_POST['idade']);
    $stmt->execute();
}

// Atualiza uma pessoa no banco de dados
if (isset($_POST['nome']) && isset($_POST['idade']) && isset($_POST['id'])) {
    $stmt = $mysqli->prepare('UPDATE pessoas SET nome = ?, idade = ? WHERE id = ?');
    $stmt->bind_param('sii', $_POST['nome'], $_POST['idade'], $_POST['id']);
    $stmt->execute();
}

// Remove uma pessoa do banco de dados
if (isset($_GET['id'])) {
    $stmt = $mysqli->prepare('DELETE FROM pessoas WHERE id = ?');
    $stmt->bind_param('i', $_GET['id']);
    $stmt->execute();
}

// Lista as pessoas cadastradas no banco de dados
$result = $mysqli->query('SELECT * FROM pessoas');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Pessoas</title>
</head>
<body>
    <h1>Cadastro de Pessoas</h1>

    <h2>Incluir Pessoa</h2>
    <form method="post">
        <label>Nome:</label>
        <input type="text" name="nome" required>
        <label>Idade:</label>
        <input type="number" name="idade" required>
        <button type="submit">Incluir</button>
    </form>

    <h2>Atualizar Pessoa</h2>
    <form method="post">
        <label>ID:</label>
        <input type="number" name="id" required>
        <label>Nome:</label>
        <input type="text" name="nome">
        <label>Idade:</label>
        <input type="number" name="idade">
        <button type="submit">Atualizar</button>
    </form>

    <h2>Lista de Pessoas</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Idade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nome']; ?></td>
                    <td><?php echo $row['idade']; ?></td>
                    <td>
                        <a href="?id=<?php echo $row['id']; ?>">Remover</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
