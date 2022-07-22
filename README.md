
## Testando a aplicação 

O projeto deverá ser iniciado na máquina com a criação do banco de dados, em seguida do comando 

composer install 
npm install 

copia do .env.exemple para .env e configurando as chaves de acesso ao banco de dados 

para finalização de configuração rode o comando php artisan key:generate e php artisan migrate --seed para iniciar as tabelas e inserir alguns dados
 
Pronto! a aplicação está pronta para ser usada. 

## Exemplos de requisições 

1. Criação: 

i. POST - /api/products  (brand_id é um atributo que se refere ao id na marca, que já é cadastrada dentro do banco de dados com o comando php artisan migrate --seed)

{
   "name" : "Geladeira",
   "descripion" : "Este produto é totalmente versátil. Tudo para ser
    personalizado para comportar o que você preferir.",
   "tension": "220v",
   "brand_id": 1
}

2. Atualização: 

ii. PUT - /api/products/{id}  (brand_id é um atributo que se refere ao id na marca, que já é cadastrada dentro do banco de dados com o comando php artisan migrate --seed)

{
   "name" : "Geladeira Vermelha",
   "descripion" : "Este produto é totalmente versátil. Tudo para ser
    personalizado para comportar o que você preferir.",
   "tension": "220v",
   "brand_id": 1
}

3. Exclusão: 

i. DELETE - /api/products/{id}

4. Apresentar todos produtos: 

i. GET - /api/products




