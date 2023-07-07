## v1.0.0 API: Busca de munícipes duplicados
Esta API permite buscar municípes duplicados com base em um outro munícipe como referência.

### URL:
```
GET api/v1/municipes/{ID}/buscar-duplicados
```

### Parâmetros:
A tabela a seguir descreve os parâmetros aceitos pela API:

| Tipo  | Chave | Valor |
| ------------- | ------------- | ------------- |
| Route  | id  | `integer` |


### Tipos de semelhança
- `identical`: Primeira regra
- `similar`: Segunda regra
- `less_than_similar`: Terceira regra

### Cenários:
**Cenário A**: Deve retornar uma lista de munícipes duplicados (`identical` = Primeira regra)

```
"Dado" que uma requisição HTTP ao servidor é feita
"E" seja enviado um munícipe como parâmetro
"Quando" o servidor responder
"Então" deve ser apresentada uma lista de munícipes duplicados
```

```json
HTTP_CODE: 200
{
    "status": true,
    "body": {
        "error": null,
        "error_type": null,
        "result": {
            "total": 1,
            "rows": [
                {
                    "id": 3,
                    "codigo_cns": "1111",
                    "registro_principal": 0,
                    "ref": 1
                }
            ],
            "key": "identical"
        },
        "complement": null
    }
}
```

---

**Cenário B**: Deve retornar uma lista de munícipes duplicados (`similar` = Segunda regra)

```
"Dado" que uma requisição HTTP ao servidor é feita
"E" seja enviado um munícipe como parâmetro
"Quando" o servidor responder
"Então" deve ser apresentada uma lista de munícipes duplicados
```

```json
HTTP_CODE: 200
{
    "status": true,
    "body": {
        "error": null,
        "error_type": null,
        "result": {
            "total": 1,
            "rows": [
                {
                    "id": 2,
                    "codigo_cns": "1234",
                    "registro_principal": 0,
                    "ref": 1
                }
            ],
            "key": "similar"
        },
        "complement": null
    }
}
```

---

**Cenário C**: Deve retornar uma lista de munícipes duplicados (`less_than_similar` = Terceira regra)

```
"Dado" que uma requisição HTTP ao servidor é feita
"E" seja enviado um munícipe como parâmetro
"Quando" o servidor responder
"Então" deve ser apresentada uma lista de munícipes duplicados
```

```json
HTTP_CODE: 200
{
    "status": true,
    "body": {
        "error": null,
        "error_type": null,
        "result": {
            "total": 1,
            "rows": [
                {
                    "id": 1,
                    "codigo_cns": "1111",
                    "registro_principal": 0,
                    "ref": 1
                }
            ],
            "key": "similess_than_similarlar"
        },
        "complement": null
    }
}
```

---

**Cenário D**: Deve retornar uma lista vazia

```
"Dado" que uma requisição HTTP ao servidor é feita
"E" seja enviado um munícipe como parâmetro
"Quando" o servidor responder
"Então" deve ser apresentada uma lista vazia sem munícipes duplicados
```

```json
HTTP_CODE: 200
{
    "status": true,
    "body": {
        "error": null,
        "error_type": null,
        "result": {
            "total": 0,
            "rows": [],
            "key": "none"
        },
        "complement": null
    }
}
```

---

**Cenário E**: Deve retornar uma erro por parâmetro não encontrado

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
        "error": "O munícipe de referência não foi encontrado",
        "error_type": "App\\Exceptions\\MunicipeNotFoundException",
        "result": null,
        "complement": "/var/www/html/app/app/Strategies/Municipe/GetDuplicatesByReferenceStrategy.php:36"
    }
}
```

---

**Cenário F**: Deve retornar uma erro por parâmetro negativo

```
"Dado" que uma requisição HTTP ao servidor é feita
"E" seja enviado um munícipe menor que zero
"Quando" o servidor responder
"Então" deve ser apresentada uma mensagem de erro
```

```json
HTTP_CODE: 200
{
    "status": false,
    "body": {
        "error": [
            "O ID do munícipe enviado deve ser inteiro e maior que zero"
        ],
        "error_type": "App\\Exceptions\\ValidatorException",
        "result": null,
        "complement": "/var/www/html/app/app/Exceptions/ValidatorException.php:9"
    }
}
```

---

**Cenário G**: Deve retornar um erro em caso de erros que não sejam sobre validações.

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
- [História] - (https://github.com/OM30/saudesimples-servico-consolidacao/blob/main/docs/stories/v1.0.0/busca_municipes_duplicados.md)
- [API's] - (https://github.com/OM30/saudesimples-servico-consolidacao/blob/main/docs/api/main.md)
