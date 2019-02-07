# Create-Recipes

### começando
    rode o comando composer install para instalar as dependencias 

### configuração
    em seu arquivo .env mude as configurações de banco de dados para o seu banco.  
    para criar as tabelas necessarias em seu banco rode o comando php artisan migrate.  

### routes API
	/api/login  
	Method - POST  
	Header - Content-Type:application/json, Accept:application/json               
	Body - email: useremail@example , password: example  
	Response - Token
	Obs : token é expirado a cada 1 hora. guarde este token para realizar suas requests

    /api/all-recipes    
    Method - GET  
	Header - Content-Type:application/json, Accept:application/json, Authorization:Bearer yourToken                  
	Response - Computadores cadastrados.
	Obs: retorna a lista de todos as receitas cadastradas.
    
    /api/recipe/{recipe}  
    Method - GET  
	Header - Content-Type:application/json, Accept:application/json, Authorization:Bearer yourToken                  
	Response - Receita cadastrada.
	Obs: retorna o registro da receita especificada pelo id.  
    
    /api/create-recipe  
    Method - POST  
	Header - Content-Type:application/json, Accept:application/json, Authorization:Bearer yourToken                
	Body - title:"ex", ingredients:"ex", method_preparation:"ex" 
	Response - mensagem de sucess ou error.  
	Obs: Cria uma nova receita na base de dados, todos os campos são obrigatórios. 

    /api/update-recipe/{recipe}  
    Method - POST  
	Header - Content-Type:application/json, Accept:application/json, Authorization:Bearer yourToken                
	Body - title:"ex", ingredients:"ex", method_preparation:"ex"  
	Response - mensagem de sucess ou error.  
	Obs: altera uma receita especificada pelo id.  
    
    /api/delete-recipe/{recipe}  
    Method - POST  
	Header - Content-Type:application/json, Accept:application/json, Authorization:Bearer yourToken  
	Response - mensagem de sucess ou error.  
	Obs: deleta uma receita especificada pelo id.
