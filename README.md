<p align="center">
<img src="http://img.shields.io/static/v1?label=STATUS&message=FINALIZADO&color=GREEN&style=for-the-badge"/>
</p>


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

`{
   "nome" : "Geladeira",
   "valor" : 1090,
   "loja_id": 1 //inicialmente deverá ser registrado uma loja dentro do banco de dados
}`

ii. Resposta:  
Sucess. 
`{
    "mensagem": "Produto criado com sucesso",
    "novo produto": {
        "nome": "geladeira",
        "valor": R$ 1090.00,
        "loja_id": 1,
        //dados de criacao como created_at e updated_at
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

`{
   "nome" : "Geladeira Vermelha",
   "valor" : 1090, 
   "loja_id": 1
}`

ii. Resposta: 

success.
`{
    "mensagem": "mensagem de sucesso",
}`

error. 
'cai em campos de validação'

`3. Exclusão:` 

i. `DELETE` - /api/produtos/{id}

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

i. `GET` - /api/produtos




