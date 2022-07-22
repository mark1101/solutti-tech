<p align="center">
<img src="http://img.shields.io/static/v1?label=STATUS&message=FINALIZADO&color=GREEN&style=for-the-badge"/>
</p>


## Testando a aplicação 

O projeto deverá ser iniciado na máquina com a criação do banco de dados, em seguida do comando 

`composer install`
`npm install` 

copia do `.env.exemple` para `.env` e configurando as chaves de acesso ao banco de dados 

para finalização de configuração rode o comando `php artisan key:generate` e `php artisan migrate --seed` para iniciar as tabelas e inserir alguns dados
 
Pronto! a aplicação está pronta para ser usada. 

Rode o comando php `artisan serve` e acesse o link do servidor criado.

## Exemplos de requisições 

`1. Criação:` 

i. `POST` - /api/products  (brand_id é um atributo que se refere ao id na marca, que já é cadastrada dentro do banco de dados com o comando php artisan migrate --seed)

`{
   "name" : "Geladeira",
   "descripion" : "Este produto é totalmente versátil. Tudo para ser
    personalizado para comportar o que você preferir.",
   "tension": "220v",
   "brand_id": 1
}`

ii. Resposta:  
Sucess. 
`{
    "message": "Produto criado com sucesso",
    "newProduct": {
        "name": "nome2",
        "description": "descricao",
        "tension": "110",
        "brand_id": "1",
        "updated_at": "2022-07-22T06:39:50.000000Z",
        "created_at": "2022-07-22T06:39:50.000000Z",
        "id": 14
    }
}`

Erros. 
`{
    "description": [
        "O campo description é obrigatório."
    ],
    "tension": [
        "O campo tension é obrigatório."
    ]
}`


`2. Atualização:` 

ii. `PUT` - /api/products/{id}  (brand_id é um atributo que se refere ao id na marca, que já é cadastrada dentro do banco de dados com o comando php artisan migrate --seed)

`{
   "name" : "Geladeira Vermelha",
   "descripion" : "Este produto é totalmente versátil. Tudo para ser
    personalizado para comportar o que você preferir.",
   "tension": "220v",
   "brand_id": 1
}`

ii. Resposta: 

success.
`{
    "message": "Produto editado com sucesso",
    "newProduct": {
        "id": 5,
        "name": "nome2 atualizadooooo",
        "description": "descricao",
        "tension": "110",
        "brand_id": "1",
        "created_at": "2022-07-22T04:47:53.000000Z",
        "updated_at": "2022-07-22T06:45:44.000000Z"
    }
}`

error. 
'cai em campos de validação'

`3. Exclusão:` 

i. `DELETE` - /api/products/{id}

ii. Resposta 

sucess. 
`{
    "status": "success",
    "message": "Produto apagado com sucesso"
}`

error. 
`{
    "status": "error",
    "message": "Erro ao concluir requisição"
}`

`4. Apresentar todos produtos:` 

i. `GET` - /api/products




