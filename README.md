# Sistema de Contas

###

## Objetivo

###

Desenvolver uma aplicação web para controle de contas a pagar e receber usando o framework Laravel. O sistema deve incluir autenticação de usuários, níveis de acesso, testes unitários, segurança básica e uma documentação simples.

###

## Requisitos do Ambiente

###

- **PHP** v8.3
- **Laravel** v11.29.0
- **Composer** v2.7.2
- **MySQL** v8.0.37
- **Node.js** v20.14.0

###

## Instalação

###

1. Clone o Repositório para sua máquina
2. Execute os seguintes comandos no terminal para instalar as dependências:

```
composer update
```
Se você possui múltiplas versões do Composer instaladas, pode ser necessário utilizar o comando `composer2 update`.
```
npm install
```

## Configuração do Laravel
1. Crie o arquivo de ambiente com o seguinte comando:
```
cp .env.example .env
```
2. Gere a chave da aplicação
```
php artisan key:generate
```
3. Configure as tabelas do banco de dados com o comando:
```
php artisan migration
```
4. Edite o arquivo `.env` para preencher as informações necessárias de conexão com o banco de dados e outras variáveis de ambiente.

## Executando Testes no Projeto

O projeto está configurado para utilizar um banco de dados em memória durante a execução de testes unitários ou de funcionalidade. Siga os passos abaixo para rodar os testes:

1. Realize as migrações para o banco de dados de teste:
```
php artisan migrate --env=testing
```

2. Execute os testes:
```
php artisan test
```

## Tecnologias Usadas

###

<div align="left">
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/laravel/laravel-original.svg" height="40" alt="laravel logo"  />
  <img width="12" />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg" height="40" alt="php logo"  />
  <img width="12" />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/html5/html5-original.svg" height="40" alt="html5 logo"  />
  <img width="12" />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/css3/css3-original.svg" height="40" alt="css3 logo"  />
  <img width="12" />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/javascript/javascript-original.svg" height="40" alt="javascript logo"  />
  <img width="12" />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/tailwindcss/tailwindcss-original-wordmark.svg" height="40" alt="tailwindcss logo"  />
</div>

###

## Licença
Este projeto é licenciado sob a MIT License. Consulte o arquivo LICENSE para obter mais detalhes.