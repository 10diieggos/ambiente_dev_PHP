# Ambiente básico em Docker para aplicações em PHP

Este é um repositório que contém um ambiente básico em Docker para iniciar uma aplicação em PHP. O ambiente inclui o PHP 7.4 e o MySQL 8.0, bem como o phpMyAdmin para gerenciamento do banco de dados. O objetivo deste projeto é fornecer um ponto de partida para desenvolvedores que desejam criar uma aplicação em PHP usando Docker como ambiente de desenvolvimento.

## Pré-requisitos

Antes de executar o projeto, é necessário ter os seguintes softwares instalados na sua máquina:

- Docker: https://www.docker.com/
- Docker Compose: https://docs.docker.com/compose/

## Como usar o ambiente

1. Clone este repositório para a sua máquina:

```bash
git clone https://github.com/seu-usuario/ambiente-php-docker.git
```
2. Entre na pasta do projeto:
```bash
cd ambiente-php-docker
```
3. Execute o Docker Compose para criar os containers do projeto:

```bash
docker-compose up -d
```

4. Acesse o phpMyAdmin no navegador:

http://localhost:8080/

5. Faça login no phpMyAdmin com as seguintes credenciais:
Usuário: root 
Senha: senha

6. Crie uma nova tabela chamada `pessoas` com os seguintes campos:
   - `id`: chave primária, inteiro, auto-incrementado, NOT NULL;
   - `nome`: string, tamanho 50, NOT NULL;
   - `idade`: inteiro, NOT NULL.

7. Coloque sua aplicação PHP dentro da pasta `app` na raiz do projeto. Como exemplo, há um arquivo `index.php` na pasta `app` que exibe uma lista de pessoas cadastradas na tabela `pessoas`.

8. Acesse sua aplicação no navegador:
http://localhost:8000/

9. Para testar a aplicação, crie alguns registros na tabela `pessoas` por meio do phpMyAdmin e verifique se eles são exibidos corretamente na página `index.php`.

Pronto! Agora você tem um ambiente básico em Docker para iniciar sua aplicação em PHP.

## Personalização

Você pode personalizar as seguintes variáveis de ambiente no arquivo `docker-compose.yml` para atender às suas necessidades:

- `MYSQL_USER`: usuário do banco de dados (padrão: `root`).
- `MYSQL_PASSWORD`: senha do banco de dados (padrão: `senha`).
- `MYSQL_DATABASE`: nome do banco de dados (padrão: `meu_banco`).
- `PHP_PORT`: porta para acessar a aplicação em PHP (padrão: `8000`).
- `PHPMYADMIN_PORT`: porta para acessar o phpMyAdmin (padrão: `8081`).

## Licença

Este projeto está licenciado sob a licença MIT. Consulte o arquivo LICENSE.md para obter mais informações.
