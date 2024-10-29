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
3. Edite o arquivo `.env` para preencher as informações necessárias de conexão com o banco de dados e outras variáveis de ambiente.
4. Configure as tabelas do banco de dados com o comando:
```
php artisan migrate
```

## Iniciando Ambiente de Desenvolvimento

1. Inicie o servidor Laravel com o comando:
```
php artisan serve
```
Esse comando iniciará o servidor de desenvolvimento do Laravel, tornando a aplicação acessível em `http://localhost:8000` por padrão.

2. Em seguida, em outro terminal, inicie o Vite para compilar e monitorar os assets frontend com o comando:
```
npm run dev
```
Esse comando compilará automaticamente os arquivos CSS e JavaScript, além de executar o Tailwind CSS para aplicar e atualizar os estilos em tempo real sempre quhouver alterações.

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

## Detalhes do Funcionamento

Conforme solicitado, utilizei as funções do **Laravel Breeze** para gerenciar todas as requisições da aplicação.

A plataforma foi originalmente desenvolvida em inglês, mas configurei todas as traduções para o português, com exceção dos callbacks. Não incluí botões para alternância de idioma ou de tema, pois esses itens não foram especificados como requisitos do projeto.

### Rotas de Visualização de Contas
As rotas de visualização e detalhamento das contas são:
- `user-bills` - Exibição das contas do usuário
- `bill-details` - Exibição dos detalhes de uma conta específica e formulário de edição

### Rotas de Gerenciamento de Contas
As rotas para gerenciamento de contas incluem:
- `store-bill` - Adicionar nova conta
- `update-bill` - Atualizar conta existente
- `delete-bill` - Excluir conta

### Acesso Administrativo
Há uma rota exclusiva para administradores visualizarem todas as contas, chamada `all-bills`. O controle de acesso e permissões foi implementado utilizando Policies, permitindo que apenas administradores acessem essa funcionalidade.

Embora não tenha sido um requisito, deixei a possibilidade para que administradores também possam gerenciar as contas dos usuários.

### Estrutura de Controllers
Considerando a simplicidade do projeto, utilizei um único controller, o `ContasController`, para gerenciar todas as operações de contas. Esse controller centraliza o processamento de todas as demandas, simplificando a estrutura da aplicação.

### Considerações
Embora este seja um projeto básico, existem várias oportunidades de aprimoramento. Acredito, no entanto, que os principais requisitos do teste foram atendidos com essa implementação.

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