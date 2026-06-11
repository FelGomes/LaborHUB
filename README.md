# LaborHUB

# Descrição

Devido a grande dificuldade de encontrar prestadores de serviços para determinadas demandas, surge a oportunidade 
e a necessidade de obter uma solução para tal impasse, sendo assim, surge a LaborHUB, uma plataforma web desenvolvida 
para conectar clientes com profissionais prestadores de serviços. O sistema permite um cadastro diversificado para ambos 
tipos de usuários sendo, clientes e profissional, subdividindo em pessoa fisíca e pessoa jurídica. A aplicação permite 
uma comunicação de fácíl usabilidade entre os usuários, podendo enviar solicitação de  andimento, facilitando a contração 
e oferta de serviços informais.

# Objetivos

- Conectar clientes e profissionais em uma única plataforma;
- Facilitar a divulgação e contratação de serviços;
- Gerenciar solicitações de atendimento;
- Disponibilizar um ambiente intuitivo para ambas as partes.
- Divulgação de novos profissionais e serviços 


# Funcionalidades

# Clientes
- Cadastro e autenticação
- Visualização dos profissionais
- Solicitação de serviço
- Acompanhamento das solicitações realizadas
- Realização de comentários
- Edição e exclusão da conta


# Profissionais
- Cadastro e autenticação
- Especificação do serviço prestado
- Gerencimento de solicitação
- Visualização de comentários
- Edição e exclusão da conta

# Administrador
- Acompanhamento de usuários ativos
- Edição e exclusão de usuários
- Monitoramento geral do sistema


# Tecnologias Utilizadas
- php
- MySQL Worckbench
- HTML 5
- CSS 3
- Boostrap 5.3
- Javascript
- Docker
- PhpMyAdmin
- Docker Desktop
- Docker Compose

# Arquitetura da aplicação
Na implementação do projeto foi utilizada a conteinerização com Docker, separando cada serviço em um container independente. 
Ao todo, foram criados quatro containers:

- **Proxy reverso:** para receber as requisições do host e repassar ao Servidor Web, sendo utilizado o Nginx Proxy Manager;
- **Servidor Web:** para servir as páginas do projeto ao host, sendo utilizado o servidor Apache;
- **MySQL:** para separar o banco de dados do projeto como um serviço separado do Servidor Web;
- **PhpMyAdmin:** para fornecer uma interface do banco de dados do projeto.


# Instalação e Execução
- Clone o repositório.
- Acesse a pasta do projeto.
- Execute o comando:
- docker compose up -d

Portas para acessar:
- HTTP : 80
- Painel Nginx Proxy Manager: 81
- PhpMyAdmin: 8051


# Estrutura do Projeto
- /www/: Todos os arquivos
- /Config/: Helpers
- /Controllers/: Classes de validações
- /Core/: Core
- /Models/: Database
- /public/: Js, Images, Css e Uploads de imagens
- /Router/: Routes
- /Utils/: Email e RenderView
- /Vendor/: Composer e phpmailer
- /views/: Telas da aplicação
- /php/ – Dockerfile
- docker-compose: Configuração dos containers
- htacces: Configuração do apache
- index: Incialização das rotas para formato em MVC


  
