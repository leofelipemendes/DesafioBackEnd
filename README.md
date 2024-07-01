
# Desafio Back End

Na maquina local
 - Instalar Composer version 2.0.8
 - Instalar Docker Version: 24.0.2
 - Instalar git version 2.25.1


Após clonar o projeto execute os seguintes passos:
 - docker-compose up --build -d - aguarde a criação dos containers
 - Ao termino execute docker ps para verificar se subiram 3 containers com nome:
    *nginx / php / db*
 - Execute o comando a seguir para instalar as dependencias do projeto:
    *docker exec -it php composer install*
 - Execute o comando: 
    *sudo cp .env.exemple .env* - por ser um teste não tem problema
 - Execute o comando : 
    *docker exec -it php php artisan migrate --seed* e assim criará todas as tabelas e adicionará 2 registros de usuarios, um admin e um user:
    
    admin@email.com
    senha: password

    'user@email.com'
    senha: password

 - Após esses passos existem 2 end points que não precisam de autenticação, são eles:

 {{base_url}}/import - para importar os dados da API para o sistema

 {{base_url}}/login - para fazer login com os usuarios

 A documentação com as collections usadas no postman estão em:

 https://documenter.getpostman.com/view/3761565/2sA3dvjY37


 