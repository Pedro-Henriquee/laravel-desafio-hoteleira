
# Desafio em Laravel - Sistema de Gestão de Quartos e Reservas

Este é um sistema desenvolvido em Laravel para a gestão de quartos e reservas de um cliente para um hotel. O sistema permite a reserva de quartos, gerenciamento de disponibilidade e edição, entre outras funcionalidades.

## Requisitos

- PHP >= 7.3
- Laravel
- Composer
- Node.js
- NPM (Node Package Manager)
- Banco de dados PostgreSQL

## Instalação

1. Clone o repositório:

   ```bash
   git clone https://github.com/Pedro-Henriquee/laravel-desafio-hoteleira.git
   ```

2. Instale as dependências do PHP usando o Composer:

   ```bash
   composer install
   ```

3. Copie o arquivo `.env.example` para `.env` e configure suas variáveis de ambiente, como conexão com o banco de dados:

   ```bash
   cp .env.example .env
   ```

3. Execute as migrações do banco de dados para criar as tabelas necessárias:

   ```bash
   php artisan migrate
   ```

4. Instale as dependências JavaScript utilizando o NPM:

   ```bash
   npm install
   ```

## Executando o Projeto

1. Compilar os arquivos:

   ```bash
   npm run dev
   ```

2. Iniciar o servidor:

   ```bash
   php artisan serve
   ```

Após executar esses passos, acesse o sistema em seu navegador, utilizando o endereço `http://localhost:8000` por padrão.

---
