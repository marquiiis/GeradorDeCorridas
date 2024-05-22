# Gerador de Corridas

Este projeto é uma aplicação simples para gerenciar corridas, permitindo criar e cancelar corridas. A aplicação é implementada em PHP e utiliza SQLite como banco de dados. Inclui testes unitários usando PHPUnit.

## Requisitos

- PHP 7.4 ou superior
- Composer
- SQLite

## Configuração do Ambiente

1. Clone o repositório:

   ```sh
   git clone https://github.com/seu-usuario/gerador-de-corridas.git
   cd gerador-de-corridas


## Instale as dependências do Composer:
   ```sh
   composer install
```
## Configure o PHP para habilitar as extensões necessárias:

Localize o arquivo php.ini:
   ```sh
   php -i | findstr /c:"Loaded Configuration File"
```
Abra o arquivo php.ini e habilite as extensões pdo_sqlite e sqlite3 descomentando as linhas:
   ```sh
   extension=pdo_sqlite
   extension=sqlite3
```
## Testes Locais com PHPUnit

Instale as dependências de desenvolvimento (PHPUnit):
  ```sh
   composer require --dev phpunit/phpunit
```
Execute os testes:
  ```sh
   vendor/bin/phpunit
```
Você deve ver uma saída indicando que todos os testes passaram:
  ```sh
   PHPUnit 9.5.0 by Sebastian Bergmann and contributors.

..                                                                  2 / 2 (100%)

Time: 00:00.008, Memory: 4.00 MB

OK (2 tests, 2 assertions)

```
## Testes com Postman
Configurar uma nova requisição POST:
- URL: http://localhost:8000/index.php
- Método: POST
- Body: Selecione raw e JSON como tipo de conteúdo.
- Corpo da Requisição (JSON):
  ```sh
   {
      "action": "create",
      "user_id": 1,
      "start_location": "Location A",
      "end_location": "Location B"
   }
### Enviar a requisição:
Você deve receber uma resposta como:
```sh
{
  "message": "Race created successfully"
}
```
## Cancelar uma Corrida
Configurar uma nova requisição POST:
- URL: http://localhost:8000/index.php
- Método: POST
- Body: Selecione raw e JSON como tipo de conteúdo.
- Corpo da Requisição (JSON):
```sh
   {
      "action": "cancel",
      "id": 1
   }
```
### Enviar a requisição:
Você deve receber uma resposta como:
```sh
{
   {
      "message": "Race cancelled successfully"
   }
}
```
## Cancelar uma Corrida Inexistente
Configurar uma nova requisição POST:
- URL: http://localhost:8000/index.php
- Método: POST
- Body: Selecione raw e JSON como tipo de conteúdo.
- Corpo da Requisição (JSON):
```sh
{
  "action": "cancel",
  "id": 999
}
```
### Enviar a requisição:
Você deve receber uma resposta como:

```sh
{
  "message": "Race not found"
}
```