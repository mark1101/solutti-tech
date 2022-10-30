<p align="center">
<img src="http://img.shields.io/static/v1?label=STATUS&message=FINALIZADO&color=GREEN&style=for-the-badge"/>
</p>


## O MODELO DA APLICACAO FOI INICADA A PARTIR DE UM PROJETO QUE TENHO DE BASE NA MINHA MAQUINA COM LARAVEL + VUE 

## Testando a aplicação 

O projeto deverá ser iniciado na máquina com a criação do banco de dados, em seguida do comando 

`composer install`
`npm install` 

copia do `.env.exemple` para `.env` e configurando as chaves de acesso ao banco de dados 

para finalização de configuração rode o comando `php artisan key:generate`
 
Pronto! a aplicação está pronta para ser usada. 

Rode o comando php `artisan serve` e acesse o link do servidor criado.

## Testes de Emails 

Para testar essa funcionalidade que foi aplicada no registro e edição de produtos, deverá ser configurado o .env da aplicação com o email que será usado para realizar o disparo de email, todas as funções e layout de email foram criados com suas devidas mensagens.

## Exemplos de requisições para produtos em questão da loja segue a mesma linha de rotas com /api/lojas e os tipos de requisições. 

`1. Criação:` 

i. `POST` - /api/produtos  (loja_id é um atributo que se refere ao id na loja)

http://127.0.0.1:8000/api/produtos?nome=Armario&valor=1090&loja_id=1 //requisicao postman

`{
   "nome" : "Armario",
   "valor" : 1090,
   "loja_id": 1 //inicialmente deverá ser registrado uma loja dentro do banco de dados
}`

ii. Resposta:  
Sucess. 
`{
    "message": "Produto criado com sucesso",
    "novo produto: ": {
        "nome": "Armario",
        "valor": "1090",
        "loja_id": "1",
        "ativo": 1,
        "updated_at": "2022-10-30T18:47:54.000000Z",
        "created_at": "2022-10-30T18:47:54.000000Z",
        "id": 5,
        "mensagem": "Criado" // mensagem que será enviada pelo email
    }
}`

Erros Exemplo. 
`{
    "nome": [
        "O campo nome é obrigatório."
    ],
    "valor": [
        "O campo valor é obrigatório."
    ],
    "loja_id": [
        "O campo loja é obrigatório."
    ]
}`


`2. Atualização:` 

ii. `PUT` - /api/produtos/{id} 

http://127.0.0.1:8000/api/produtos/5?nome=Armario 3 portas&valor=1090&loja_id=1 //requisicao postman

`{
   "nome" : "Armario 3 portas",
   "valor" : 1090, 
   "loja_id": 1
}`

ii. Resposta: 

success.
`{
   "message": "Produto editado com sucesso",
    "produto editado: ": {
        "id": 5,
        "nome": "Armario 3 portas",
        "valor": "1090",
        "loja_id": "1",
        "ativo": 1,
        "created_at": "2022-10-30T18:47:54.000000Z",
        "updated_at": "2022-10-30T18:49:57.000000Z",
        "mensagem": "Editado"
    }
}`

error. 

{
   "valor": [
       "O campo valor é obrigatório."
   ]
}

`3. Exclusão:` 

i. `DELETE` - /api/produtos/{id}

ii. Resposta 

sucess. 
`{
    "message": "Produto apagado com sucesso"
`}

error. 
`{
    "status": "error",
    "message": "Erro ao concluir requisição"
}`

`4. Apresentar todos produtos:` 

i. `GET` - /api/produtos




