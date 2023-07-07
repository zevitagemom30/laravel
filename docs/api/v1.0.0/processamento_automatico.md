## v1.0.0 API: Processamento automático
Esta API permite realizar a consolidação de todos os munícipes existente na base de dados.

### URL:
```
POST api/v1/processamento/automatico
```

### Observações:
- [API processamento manual] - (https://github.com/OM30/saudesimples-servico-consolidacao/blob/main/docs/api/processamento_manual.md)

`95%` dos cenários dessa API estão descritos na `API MANUAL`, ou seja, abaixo constará apenas a diferença e os cenários relevantes a serem comentados.

### Cenários:
**Cenário A**: Deve retornar uma mensagem simbolizando que um secundário se tornou principal e o munícipe encontrado se tornou um secundário

```
"Dado" que uma requisição HTTP ao servidor é feita
"E" o munícipe encontrado possui outros munícipes semelhantes
"E" o munícipe encontrado se tornará um secundário
"E" um semelhante será considerado como principal
"Quando" o servidor responder
"Então" deve ser apresentada uma lista de processamento
```

```json
HTTP_CODE: 200
{
    "status": true,
    "body": {
        "error": null,
        "error_type": null,
        "result": {
            "automatic": [
                {
                    "registro-atualizado-como-principal": {
                        "municipe": {
                            "id": 3,
                            "codigo_cns": "7111",
                            "registro_principal": true,
                            "ref": null,
                        }
                    }
                },
                {
                    "registro-atualizado-como-secundario": {
                        "municipe": {
                            "id": 1,
                            "codigo_cns": "1111",
                            "registro_principal": false,
                            "ref": 3,
                        }
                    }
                },
                {
                    "unificacao-finalizada-com-alteracoes": {
                        "status": true
                    }
                }
                {
                    "nenhum-registro-encontrado": {
                        "processeds": [
                            3,
                            1
                        ]
                    }
                }
            ],
            "ini_time": 1686474960,
            "end_time": 1686474960,
            "spent_time": 0
        },
        "complement": null
    }
}
```

---

**Cenário B**: Deve retornar uma mensagem simbolizando que houveram várias tentativas e não foi possivel prosseguir

```
"Dado" que uma requisição HTTP ao servidor é feita
"E" algum erro aconteceu por pelo menos 3x consecutivas
"Quando" o servidor responder
"Então" deve ser apresentada uma lista de processamento
```

```json
HTTP_CODE: 200
{
    "status": true,
    "body": {
        "error": null,
        "error_type": null,
        "result": {
            "automatic": [
                {
                    "erro-durante-processamento": {
                        "message": "test",
                        "type": "InvalidArgumentException",
                        "times": 1
                    }
                },
                {
                    "erro-durante-processamento": {
                        "message": "test",
                        "type": "InvalidArgumentException",
                        "times": 2
                    }
                },
                {
                    "erro-durante-processamento": {
                        "message": "test",
                        "type": "InvalidArgumentException",
                        "times": 3
                    }
                }
            ],
            "ini_time": 1686479429,
            "end_time": 1686479429,
            "spent_time": 0
        },
        "complement": null
    }
}
```

## Referências
- [História] - (https://github.com/OM30/saudesimples-servico-consolidacao/blob/main/docs/stories/v1.0.0/processamento_automatico.md)
- [API's] - (https://github.com/OM30/saudesimples-servico-consolidacao/blob/main/docs/api/main.md)
