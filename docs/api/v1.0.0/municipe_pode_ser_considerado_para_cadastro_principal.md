## v1.0.0 API: Munícipe pode ser considerado para cadastro principal
Esta API permite verificar se os dados de um municipe podem ser considerados válidos para o cadastro principal.

### URL:
```
POST api/v1/municipes/{ID}/pode-ser-cadastro-principal
```

### Parâmetros:
A tabela a seguir descreve os parâmetros aceitos pela API:

| Tipo  | Chave | Valor |
| ------------- | ------------- | ------------- |
| Route  | id  | `integer` |

### Cenários:
**Cenário A**: Deve retornar uma resposta verdadeira

```
"Dado" que uma requisição HTTP ao servidor é feita
"E" seja enviado um munícipe coerente com o tipo de validação configurado na unidade
"Quando" o servidor responder
"Então" deve ser apresentada uma resposta verdadeira
```

```json
HTTP_CODE: 200
{
    "status": true,
    "body": {
        "error": null,
        "error_type": null,
        "result": true,
        "complement": null
    }
}
```

---

**Cenário B**: Deve retornar uma lista de erros devido à omissão de campos obrigatórios

```
"Dado" que uma requisição HTTP ao servidor é feita
"E" o munícipe informado não possui em seu cadastro os dados obrigatórios de acordo com o tipo de validação configurado na unidade
"Quando" o servidor responder
"Então" deve ser apresentada uma lista erros
```

```json
HTTP_CODE: 400
{
    "status": false,
    "body": {
        "error": {
            "nome": [
                "The nome field is required."
            ],
            "data_nascimento": [
                "The data nascimento field is required."
            ],
            "nome_pai": [
                "The nome pai field is required."
            ]
        },
        "error_type": "App\\Exceptions\\ValidatorException",
        "result": null,
        "complement": "/var/www/html/app/app/Exceptions/ValidatorException.php:9"
    }
}
```

---

**Cenário C**: Deve retornar um erro devido não encontrar a unidade vinculada

```
"Dado" que uma requisição HTTP ao servidor é feita
"E" seja enviado um munícipe que possui uma unidade desconhecida
"Quando" o servidor responder
"Então" deve ser apresentada uma mensagem do respectivo erro
```

```json
HTTP_CODE: 400
{
    "status": false,
    "body": {
        "error": "Não foi possível encontrar os dados da unidade de saúde",
        "error_type": "App\\Exceptions\\ResourceNotFoundException",
        "result": null,
        "complement": "/var/www/html/app/app/Strategies/Municipe/CanTurnPrincipalStrategy.php:58"
    }
}
```

---

**Cenário D**: Deve retornar um erro devido à idade inferior a 18 anos e à falta de um responsável

```
"Dado" que uma requisição HTTP ao servidor é feita
"E" o munícipe enviado possui uma *data_nascimento* que, comparada com a data atual, represente um menor de idade
"E" não possua em seu cadastro o *nome_responsavel* preenchido
"Quando" o servidor responder
"Então" deve ser apresentada uma mensagem do respectivo erro
```

```json
HTTP_CODE: 400
{
    "status": false,
    "body": {
        "error": {
            "nome_responsavel": [
                "O nome do responsável não foi enviado"
            ]
        },
        "error_type": "App\\Exceptions\\ValidatorException",
        "result": null,
        "complement": "/var/www/html/app/app/Exceptions/ValidatorException.php:9"
    }
}
```

---

**Cenário E**: Deve retornar um erro para erros que não sejam relacionados a validações

```
"Dado" que uma requisição HTTP ao servidor é feita
"Quando" o servidor responder
"Então" deve ser apresentado um erro referente ao processamento.
```

```json
HTTP_CODE: 200
{
    "status": false,
    "body": {
        "error": "test",
        "error_type": "InvalidArgumentException",
        "result": null,
        "complement": "/var/www/html/app/app/Validators/Municipe/GetWithFiltersValidator.php:28"
    }
}
```

---

**Cenário F**: Deve retornar uma erro por parâmetro não encontrado

```
"Dado" que uma requisição HTTP ao servidor é feita
"E" seja enviado um munícipe que não existente
"Quando" o servidor responder
"Então" deve ser apresentada uma mensagem de erro
```

```json
HTTP_CODE: 200
{
    "status": false,
    "body": {
        "error": "O munícipe não foi encontrado",
        "error_type": "App\\Exceptions\\MunicipeNotFoundException",
        "result": null,
        "complement": "/var/www/html/app/app/Strategies/Municipe/GetDuplicatesByReferenceStrategy.php:36"
    }
}
```

## Referências
- [História] - (https://github.com/OM30/saudesimples-servico-consolidacao/blob/main/docs/stories/v1.0.0/municipe_pode_ser_considerado_para_cadastro_principal.md)
- [API's] - (https://github.com/OM30/saudesimples-servico-consolidacao/blob/main/docs/api/main.md)
