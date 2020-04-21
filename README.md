# Comic Stock

Um estoque de Comics

## Requirements
- [Docker](https://www.docker.com)
- [Docker-Compose](https://docs.docker.com/compose)

## Encoding
- UTF-8

## Regras do sistema e considerações
- `REGRAS-SISTEMA.md`

## DOC APIS para Postman
- `DOC API - Comic Stock.postman_collection.json`

## Env
- O arquivo .env-example será automaticamente copiado para .env. O .env gerado irá conter as configurações defaults para o ambiente

## Migrações e Seeders
- Estão automatizadas em `deploy.sh`

## Portas MySql
- Por padrão é 3306
- Caso seja necessário trocar: antes de subir o projeto alterar em "docker-compose.yml" e respectivamente em .env-example

-docker-compose.yml:
ports:
        - "{porta}:3306"

## Subir Projeto
1. `$ docker-compose up`

## Fazer deploy
1. `$ docker exec -it gnu-api-php-fpm bash`
2. `sh deploy.sh`
3. Acessar localhost:8080
