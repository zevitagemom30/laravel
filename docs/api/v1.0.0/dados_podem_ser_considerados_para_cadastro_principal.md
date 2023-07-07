## v1.0.0 API: Dados podem ser considerados para cadastro principal
Esta API permite verificar se os dados a serem cadastrados/atualizados em um munícipe podem ou não ser considerados válidos para o cadastro principal.

### URL:
```
POST api/v1/municipes/pode-ser-cadastro-principal
```

### Parâmetros:
A tabela a seguir descreve os parâmetros aceitos pela API:

| Tipo  | Chave | Valor |
| ------------- | ------------- | ------------- |
| Body  | validacao  | `integer` |
| Body  | municipe  | `object` |

Para o campo `municipe:object`, segue um exemplo abaixo do JSON com as chaves e valores:
```json
{
        "nome" : "jose",
        "data_nascimento" : "1996-05-09",
        "sexo_id" : "1",
        "nome_pai" : "vanderley",
        "nome_mae" : "maria",
        "nacionalidade_id" : "1",
        "nascimento_estado_id" : "1",
        "nascimento_municipio_id" : "1",
        "telefone_celular" : "123",
        "residencia_cep" : "17400000",
        "residencia_numero" : "456",
        "tipo_logradouro_id" : "1",
        "nome_responsavel" : " ",
        "residencia_logradouro" : "guaranta",
        "residencia_bairro" : "eucaliptos",
        "raca_cor_id" : "1",
        "unidade_saude_referencia_id" : "1",
        "profissional_equipe_id" : "1",
        "codigo_cns" : "1",
        "cpf_numero" : "1",
        "ocupacao_id" : "1"
    }
```

Para o campo `validacao:integer`, podem ser enviadas 3 opções:
- `1`: Sem validação
- `2`: Validação CPF ou CNS
- `3`: Validação completa do munícipe


### Cenários:
**Cenário A**: Deve retornar uma resposta verdadeira

```
"Dado" que uma requisição HTTP ao servidor é feita
"E" seja enviado dados coerentes com o tipo de validação configurado na unidade
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
"E" não sejam enviados dados obrigatórios de acordo com o tipo de validação configurado na unidade
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

**Cenário C**: Deve retornar um erro devido ao tipo de validação inválido

```
"Dado" que uma requisição HTTP ao servidor é feita
"E" seja enviado o campo *validacao* inválido
"Quando" o servidor responder
"Então" deve ser apresentada uma mensagem do respectivo erro
```

```json
HTTP_CODE: 400
{
    "status": false,
    "body": {
        "error": {
            "validacao": [
                "O tipo da validação não é considerado válido"
            ]
        },
        "error_type": "App\\Exceptions\\ValidatorException",
        "result": null,
        "complement": "/var/www/html/app/app/Exceptions/ValidatorException.php:9"
    }
}
```

---

**Cenário D**: Deve retornar um erro devido à idade inferior a 18 anos e à falta de um responsável

```
"Dado" que uma requisição HTTP ao servidor é feita
"E" seja enviada uma *data_nascimento* que, comparada com a data atual, represente um menor de idade
"E" não seja enviado o campo *nome_responsavel*
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

## Referências
- [História] - (https://github.com/OM30/saudesimples-servico-consolidacao/blob/main/docs/stories/v1.0.0/dados_podem_ser_considerados_para_cadastro_principal.md)
- [API's] - (https://github.com/OM30/saudesimples-servico-consolidacao/blob/main/docs/api/main.md)
