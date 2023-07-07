## v1.0.0 API: Busca por CNS
Esta API permite buscar um munícipe principal com base no CNS (Cartão Nacional de Saúde) informado.

### URL:
```
GET api/v1/search/cns/{CNS}
```

### Parâmetros:
A tabela a seguir descreve os parâmetros aceitos pela API:

| Tipo  | Chave | Valor |
| ------------- | ------------- | ------------- |
| Route  | cns  | `integer` |

### Cenários:
**Cenário A**: Deve retornar uma busca vazia

```
"Dado" que uma requisição HTTP ao servidor é feita
"E" seja enviado um CNS que não pertence a nenhum munícipe
"Quando" o servidor responder
"Então" deve ser apresentada uma mensagem vazia
```

```json
HTTP_CODE: 200
{
    "status": false,
    "body": {
        "error": "",
        "error_type": "App\\Exceptions\\ResourceNotFoundException",
        "result": null,
        "complement": "/var/www/html/app/app/Services/SearchService.php:25"
    }
}
```

---

**Cenário B**: Deve retornar um munícipe encontrado

```
"Dado" que uma requisição HTTP ao servidor é feita
"E" seja enviado o CNS existente no cadastro secundário ou no cadastro principal
"Quando" o servidor responder
"Então" deve ser apresentado o munícipe encontrado
```

```json
HTTP_CODE: 200
{
    "status": true,
    "body": {
        "error": null,
        "error_type": null,
        "result": {
            "row": {
                "id": 1,
                "codigo_cns": "71114",
                "registro_principal": 1,
                "ref": null
            }
        },
        "complement": null
    }
}
```

---

**Cenário C**: Deve retornar um erro caso seja enviado o CNS inválido

```
"Dado" que uma requisição HTTP ao servidor é feita
"E" seja enviado um CNS inválido
"Quando" o servidor responder
"Então" deve ser apresentado um erro referente ao valor incorreto
```

```json
HTTP_CODE: 200
{
    "status": false,
    "body": {
        "error": [
            "O CNS deve ser informado e válido"
        ],
        "error_type": "App\\Exceptions\\ValidatorException",
        "result": null,
        "complement": "/var/www/html/app/app/Exceptions/ValidatorException.php:9"
    }
}
```

---

**Cenário D**: Deve retornar um erro para erros que não sejam relacionados a validações

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
- [História] - (https://github.com/OM30/saudesimples-servico-consolidacao/blob/main/docs/stories/v1.0.0/busca_cns.md)
- [API's] - (https://github.com/OM30/saudesimples-servico-consolidacao/blob/main/docs/api/main.md)
