## v1.0.0 API: Busca de munícipes
Esta API permite buscar municípes com base em diferentes filtros para obter resultados mais precisos.

### URL:
```
GET api/v1/municipes/buscar
```

### Parâmetros:
A tabela a seguir descreve os parâmetros aceitos pela API:

| Tipo  | Chave | Valor |
| ------------- | ------------- | ------------- |
| Query  | codigo_cns  | `integer` |
| Query  | cpf_numero  | `string` |
| Query  | nome  | `string` |
| Query  | registro_principal  | `boolean` |

### Cenários:
**Cenário A**: Deve retornar uma busca vazia

```
"Dado" que uma requisição HTTP ao servidor é feita
"Quando" o servidor responder
"Então" deve ser apresentada uma lista de munícipes vazia sem erros
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
            "rows": []
        },
        "complement": null
    }
}
```

---

**Cenário B**: Deve retornar um ou mais usuários cadastrados baseando-se nos filtros

```
"Dado" que uma requisição HTTP ao servidor é feita
"E" seja enviado o *cpf_numero* e/ou *codigo_cns* e/ou *nome* e/ou *registro_principal*
"Quando" o servidor responder
"Então" deve ser apresentado todos munícipes que combinam com os filtros
```

```json
HTTP_CODE: 200
{
    "status": true,
    "body": {
        "error": null,
        "error_type": null,
        "result": {
            "total": 2,
            "rows": [
                {
                    "id": 1,
                    "codigo_cns": "1234",
                    "registro_principal": 0,
                    "ref": 2,
                },
                {
                    "id": 2,
                    "codigo_cns": "5678",
                    "registro_principal": 1,
                    "ref": null,
                }
            ]
        },
        "complement": null
    }
}
```

---

**Cenário C**: Deve retornar somente munícipes considerados como principais

```
"Dado" que uma requisição HTTP ao servidor é feita
"E" seja enviado *registro_principal* com o valor de `1`
"Quando" o servidor responder
"Então" deve ser apresentado somente os munícipes configurados como `principal`
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
                    "codigo_cns": "5678",
                    "registro_principal": 1,
                    "ref": null,
                }
            ]
        },
        "complement": null
    }
}
```

---

**Cenário D**: Deve retornar somente munícipes considerados como secundários

```
"Dado" que uma requisição HTTP ao servidor é feita
"E" seja enviado *registro_principal* com o valor de `0`
"Quando" o servidor responder
"Então" deve ser apresentado somente os munícipes configurados como `secundário`
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
                    "codigo_cns": "1234",
                    "registro_principal": 0,
                    "ref": 2,
                }
            ]
        },
        "complement": null
    }
}
```

---

**Cenário E**: Deve retornar um erro caso seja enviado o CNS inválido

```
"Dado" que uma requisição HTTP ao servidor é feita
"E" seja enviado *codigo_cns* com o valor de `XXX`
"Quando" o servidor responder
"Então" deve ser apresentado um erro referente ao valor incorreto do filtro aplicado
```

```json
HTTP_CODE: 200
{
    "status": false,
    "body": {
        "error": [
            "O código CNS deve ser um inteiro maior que zero"
        ],
        "error_type": "App\\Exceptions\\ValidatorException",
        "result": null,
        "complement": "/var/www/html/app/app/Exceptions/ValidatorException.php:9"
    }
}
```

---

**Cenário F**: Deve retornar um erro para erros que não sejam relacionados a validações

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
- [História] - (https://github.com/OM30/saudesimples-servico-consolidacao/blob/main/docs/stories/v1.0.0/busca_municipes.md)
- [API's] - (https://github.com/OM30/saudesimples-servico-consolidacao/blob/main/docs/api/main.md)
