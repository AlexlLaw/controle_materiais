Aplicação feita com Laravel

# O que foi Feito

	1. CRUD de Produtos. 

          1.1Com importação de arquivos.csv, alimentando as tabela de produtos e turmas_materiais
	
	2. CRUD de Alunos. 
          
          2.1 - Consulta de endereço por cep
  
# back-end feito em Laravel

Depois que você clonar o codigo do bitbucket

  1-Abra o git bash dentro da pasta "Controle_vendas" e utilize "composer install" -> para instalar todas as dependencias.
  
  2. Abra o aquiro .env e coloque as configurações do seu banco.
  
	  2.1. Exemplo:
		
		DATABASE_NAME=vox
		  
	   	DATABASE_HOST=localhost
		
		DATABASE_PORT=5432
		  
	  	DATABASE_USER=postgres
		
	  	DATABASE_PASSWORD=123
		
		Obs: O banco deve ser *postgreesql*
		
	 2.2. o drive pdo_mysql devem estar habilitados nas configuracoes do php.ini

 3. Criar o banco "create database controle_vendas "

 4. no bash rodar o comando "php artisan migrate " para migrar as tabelas para o banco de dados

 5. rodar o comando "php artisan serve " para subir a aplicação.


