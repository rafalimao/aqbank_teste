## Teste Prático AQBank - API de Biblioteca

Este é um sistema de gerenciamento de biblioteca desenvolvido com o framework Laravel. O sistema oferece uma API RESTful para gerenciar autores, livros e empréstimos, além de funcionalidades de autenticação de usuário e envio de notificações por email usando filas.

## Requisitos

- PHP >= 7.4
- Composer
- MySQL

## Instalação

1. Clone o repositório:

```bash
git clone https://github.com/rafalimao/aqbank_teste
```

2. Instale as dependências do Composer:
```bash
cd sistema-gerenciamento-biblioteca
composer install
```

3. Copie o arquivo .env.example para .env e configure as variáveis de ambiente, como conexão com o banco de dados e configurações de email.

4. Gere a chave de aplicativo:
```bash
php artisan key:generate
```

5. Execute as migrações do banco de dados para criar as tabelas necessárias:
```bash
php artisan migrate
```
6. Inicie o servidor de desenvolvimento:
```bash
php artisan serve
```
Acesse o sistema em http://localhost:8000.

## Testes

Para executar os testes, use o seguinte comando:

```bash
php artisan test
```
## Licença

Este projeto é licenciado sob a [MIT license](https://opensource.org/licenses/MIT).
