
# Projeto Catálogo de Produtos

- Projeto para estudos 2022

### Backend Laravel - API

- Cadastro de Produtos
- Cadastro de Categorias
- Cadastro de Usuários
- Compras
- Envio e Recebimentos de mensagem - (rabbitMQ)

### Backend NodeJS

- Recebimento de mensagem de Compras
- Processamento de pagamentos

### MailTrap - Simulador de envio de e-mails

- Receber emails de compras e processamento de pagamentos

### Frontend - VueJS (Vuetify - Vuex)

- Cadastro de usuário
- Login
- Catalogo de Produtos
- Página do Produto
- Página de compras
_________

### Tecnologias

- PHP - Laravel ( Migrations, Eloquent, Authentication JWT )
- NodeJS
- RabbitMQ ( Mensageria )
- Git - GitFlow
- VueJS ( Vuetify - Vuex )
- Docker - Docker compose
- DB Postgresql

_________

## Instalação

- Você deve ter instalado o docker e docker compose
- Criar uma conta no mailtrap.io e adicionar as crendênciais no docker compose no serviço mail
- docker-compose up -d --build
- Abrir o Frontend no http://localhost:8080
- Vamos criar a parte administrativa para cadastros, por enquanto os dados são criados pelos Seeds do Laravel
