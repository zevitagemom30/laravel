## v1.0.0 API: Processamento manual
Esta API permite realizar a consolidação de um munícipe escolhido.

### URL:
```
POST api/v1/processamento/manual/{ID}
```

### Parâmetros:
A tabela a seguir descreve os parâmetros aceitos pela API:

| Tipo  | Chave | Valor |
| ------------- | ------------- | ------------- |
| Route  | id  | `integer` |

### Cenários:
**Cenário A**: Deve retornar um erro referente à validação de campos de acordo com a configuração da unidade.

```
"Dado" que uma requisição HTTP ao servidor é feita
"E" seja enviado um munícipe com dados incompletos de acordo com o tipo de validação configurado na unidade
"Quando" o servidor responder
"Então" deve ser apresentada uma mensagem de erro
```

```json
HTTP_CODE: 200
{
    "status": false,
    "body": {
        "error": {
            "data_nascimento": [
                "The data nascimento field is required."
            ]
        },
        "error_type": "App\\Exceptions\\ValidatorException",
        "result": null,
        "complement": "/var/www/html/app/app/Exceptions/ValidatorException.php:9"
    }
}
```

---

**Cenário B**: Deve retornar uma mensagem simbolizando que não existem munícipes a serem consolidados e que o enviado já é considerado o principal.

```
"Dado" que uma requisição HTTP ao servidor é feita
"E" o munícipe informado não possui outros munícipes semelhantes
"E" o munícipe informado já é o principal
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
            "manual": [
                {
                    "registro-definido-para-ser-principal-ja-e-principal": {
                        "municipe": {
                            "id": 1,
                            "codigo_cns": "71114",
                            "registro_principal": 1,
                            "ref": null,
                        }
                    }
                },
                {
                    "somente-registro-base": {
                        "municipe": {
                            "id": 1,
                            "codigo_cns": "71114",
                            "registro_principal": 1,
                            "ref": null
                        }
                    }
                }
            ],
            "ini_time": 1686473909,
            "end_time": 1686473909,
            "spent_time": 0
        },
        "complement": null
    }
}
```

---

**Cenário C**: Deve retornar uma mensagem simbolizando que não existem munícipes a serem consolidados e que o enviado se tornou o principal.

```
"Dado" que uma requisição HTTP ao servidor é feita
"E" o munícipe informado não possui outros munícipes semelhantes
"E" o munícipe informado era um secundário
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
            "manual": [
                {
                    "registro-atualizado-como-principal": {
                        "municipe": {
                            "id": 1,
                            "codigo_cns": "71114",
                            "registro_principal": true,
                            "ref": null,
                        }
                    }
                },
                {
                    "somente-registro-base": {
                        "municipe": {
                            "id": 1,
                            "codigo_cns": "71114",
                            "registro_principal": true,
                            "ref": null,
                        }
                    }
                }
            ],
            "ini_time": 1686474143,
            "end_time": 1686474143,
            "spent_time": 0
        },
        "complement": null
    }
}
```

---

**Cenário D**: Deve retornar uma mensagem simbolizando que existem munícipes a serem consolidados e que o enviado já é o principal

```
"Dado" que uma requisição HTTP ao servidor é feita
"E" o munícipe informado possui outros munícipes semelhantes
"E" o municipe informado era um principal
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
            "manual": [
                {
                    "registro-definido-para-ser-principal-ja-e-principal": {
                        "municipe": {
                            "id": 1,
                            "codigo_cns": "71114",
                            "registro_principal": 1,
                            "ref": null,
                        }
                    }
                },
                {
                    "registro-atualizado-como-secundario": {
                        "municipe": {
                            "id": 3,
                            "codigo_cns": "1111",
                            "registro_principal": false,
                            "ref": 1,
                        }
                    }
                },
                {
                    "unificacao-finalizada-com-alteracoes": {
                        "status": true
                    }
                }
            ],
            "ini_time": 1686474309,
            "end_time": 1686474309,
            "spent_time": 0
        },
        "complement": null
    }
}
```

---

**Cenário E**: Deve retornar um erro quando o CNS não está devidamente preenchido

```
"Dado" que uma requisição HTTP ao servidor é feita
"E" seja enviado um munícipe que possui CNS em branco
"E" nenhum de seus semelhantes possui CNS também
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
            "manual": [
                {
                    "erro-durante-processamento": {
                        "error": "Nenhum registro com CNS preenchido foi encontrado durante a definição do principal."
                    }
                }
            ],
            "ini_time": 1686474808,
            "end_time": 1686474809,
            "spent_time": 1
        },
        "complement": null
    }
}
```

---

**Cenário F**: Deve retornar uma mensagem simbolizando que um secundário permanecerá como secundário e o munícipe enviado já é principal e permanecerá como principal

```
"Dado" que uma requisição HTTP ao servidor é feita
"E" o munícipe informado possui outros munícipes semelhantes
"E" o municipe informado já é principal e continuará como principal
"E" um semelhante já é considerado como secundário e continuará como secundário
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
            "manual": [
                {
                    "registro-definido-para-ser-principal-ja-e-principal": {
                        "municipe": {
                            "id": 3,
                            "codigo_cns": "7111",
                            "registro_principal": 1,
                            "ref": null,
                        }
                    }
                },
                {
                    "registro-definido-para-ser-secundario-ja-e-secundario": {
                        "municipe": {
                            "id": 1,
                            "codigo_cns": "1111",
                            "registro_principal": 0,
                            "ref": 3,
                        }
                    }
                },
                {
                    "unificacao-finalizada-sem-alteracoes": {
                        "status": true
                    }
                }
            ],
            "ini_time": 1686475169,
            "end_time": 1686475169,
            "spent_time": 0
        },
        "complement": null
    }
}
```

---

**Cenário G**: Deve retornar uma mensagem simbolizando que um secundário encontrado está inválido devido não possuir atributos necessários para classificação de precedência na substituição de dados do principal

```
"Dado" que uma requisição HTTP ao servidor é feita
"E" o munícipe informado possui outros munícipes semelhantes
"E" o munícipe informado já é principal
"E" o semelhante já é um secundário
"E" um semelhante não possui atributos obrigatórios
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
            "manual": [
                {
                    "registro-definido-para-ser-principal-ja-e-principal": {
                        "municipe": {
                            "id": 3,
                            "codigo_cns": "7111",
                            "registro_principal": 1,
                            "ref": null,
                        }
                    }
                },
                {
                    "registro-definido-para-ser-secundario-ja-e-secundario": {
                        "municipe": {
                            "id": 1,
                            "codigo_cns": "1111",
                            "registro_principal": 0,
                            "ref": 3,
                        }
                    }
                },
                {
                    "erro-durante-processamento": {
                        "error": "O registro id:[1] que não possui valores em: [created_at, updated_at]"
                    }
                }
            ],
            "ini_time": 1686475735,
            "end_time": 1686475735,
            "spent_time": 0
        },
        "complement": null
    }
}
```

--

**Cenário H**: Deve retornar uma mensagem informando que não existem alterações e nem falsas referências

```
"Dado" que uma requisição HTTP ao servidor é feita
"E" o munícipe informado possui outros munícipes semelhantes
"E" o munícipe informado já é principal
"E" o semelhante já é um secundário
"E" que não existe nenhum dado a ser atualizado
"E" que todas as referências de municipes estão corretas
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
            "manual": [
                {
                    "registro-definido-para-ser-principal-ja-e-principal": {
                        "municipe": {
                            "id": 3,
                            "codigo_cns": "7111",
                            "registro_principal": 1,
                            "ref": null,
                        }
                    }
                },
                {
                    "registro-definido-para-ser-secundario-ja-e-secundario": {
                        "municipe": {
                            "id": 1,
                            "codigo_cns": "1111",
                            "registro_principal": 0,
                            "ref": 3,
                        }
                    }
                },
                {
                    "apagadas-falsas-referencias": {
                        "message": {
                            "ref": 3,
                            "not_id": [
                                1
                            ],
                            "affected_rows": 0
                        }
                    }
                },
                {
                    "unificacao-finalizada-sem-alteracoes": {
                        "status": true
                    }
                }
            ],
            "ini_time": 1686476891,
            "end_time": 1686476892,
            "spent_time": 1
        },
        "complement": null
    }
}
```

---

**Cenário I**: Deve retornar uma mensagem informando existem alterações porém sem falsas referências

```
"Dado" que uma requisição HTTP ao servidor é feita
"E" o munícipe informado não possui outros munícipes semelhantes
"E" o munícipe informado já não era o principal
"E" que todas as referências de munícipes estão corretas
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
            "manual": [
                {
                    "registro-atualizado-como-principal": {
                        "municipe": {
                            "id": 1,
                            "codigo_cns": "1111",
                            "registro_principal": true,
                            "ref": null,
                        }
                    }
                },
                {
                    "somente-registro-base": {
                        "municipe": {
                            "id": 1,
                            "codigo_cns": "1111",
                            "registro_principal": true,
                            "ref": null,
                        }
                    }
                },
                {
                    "apagadas-falsas-referencias": {
                        "message": {
                            "ref": 1,
                            "affected_rows": 0
                        }
                    }
                }
            ],
            "ini_time": 1686477153,
            "end_time": 1686477153,
            "spent_time": 0
        },
        "complement": null
    }
}
```

---

**Cenário J**: Deve retornar uma mensagem informando houveram alterações e será necessário atualizar todas as tabelas de histórico

```
"Dado" que uma requisição HTTP ao servidor é feita
"E" o munícipe informado possui outros munícipes semelhantes
"E" o munícipe informado já era o principal
"E" que existem novas secundários descobertos
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
            "manual": [
                {
                    "registro-definido-para-ser-principal-ja-e-principal": {
                        "municipe": {
                            "id": 1,
                            "codigo_cns": "777",
                            "registro_principal": 1,
                            "ref": null,
                        }
                    }
                },
                {
                    "registro-atualizado-como-secundario": {
                        "municipe": {
                            "id": 3,
                            "codigo_cns": "111",
                            "registro_principal": false,
                            "ref": 1,
                        }
                    }
                },
                {
                    "apagadas-falsas-referencias": {
                        "message": {
                            "ref": 1,
                            "not_id": [
                                3
                            ],
                            "affected_rows": 0
                        }
                    }
                },
                {
                    "disparado-gatilho-atualizacao-todas-tabelas": {
                        "ids": {
                            "new": 1,
                            "old": [
                                3
                            ]
                        }
                    }
                },
                {
                    "unificacao-finalizada-com-alteracoes": {
                        "status": true
                    }
                }
            ],
            "ini_time": 1686477383,
            "end_time": 1686477384,
            "spent_time": 1
        },
        "complement": null
    }
}
```

---

**Cenário K**: Deve retornar um erro interno durante processamento

```
"Dado" que uma requisição HTTP ao servidor é feita
"E" o problema encontrado acontece dentro do controle de erros
"Quando" o servidor responder
"Então" deve ser apresentado um erro referente ao processamento.
```

```json
HTTP_CODE: 200
{
    "status": true,
    "body": {
        "error": null,
        "error_type": null,
        "result": {
            "manual": [
                {
                    "erro-durante-processamento": {
                        "message": "test",
                        "type": "InvalidArgumentException",
                        "times": 1
                    }
                }
            ],
            "ini_time": 1686477658,
            "end_time": 1686477658,
            "spent_time": 0
        },
        "complement": null
    }
}
```

---

**Cenário L**: Deve retornar um erro externo durante processamento

```
"Dado" que uma requisição HTTP ao servidor é feita
"E" o problema encontrado acontece fora do controle de erros
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
        "complement": "/var/www/html/app/app/Strategies/Process/ManualProcessStrategy.php:38"
    }
}
```

---

**Cenário M**: Deve retornar um erro por parâmetro não encontrado

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
        "complement": "/var/www/html/app/app/Strategies/Process/ManualProcessStrategy.php:43"
    }
}
```

---

**Cenário N**: Deve retornar uma erro quando não encontra os dados da unidade de saúde vinculada

```
"Dado" que uma requisição HTTP ao servidor é feita
"E" seja enviado um munícipe válido
"E" que a unidade de saúde vinculada seja inválida
"Quando" o servidor responder
"Então" deve ser apresentada uma mensagem de erro
```

```json
HTTP_CODE: 200
{
    "status": true,
    "body": {
        "error": null,
        "error_type": null,
        "result": {
            "manual": [
                {
                    "erro-durante-processamento": {
                        "message": "Não foi possível encontrar os dados da unidade de saúde",
                        "type": "App\\Exceptions\\ResourceNotFoundException",
                        "times": 1
                    }
                }
            ],
            "ini_time": 1686477960,
            "end_time": 1686477960,
            "spent_time": 0
        },
        "complement": null
    }
}
```

---

**Cenário O**: Deve retornar uma erro quando não pode-se processar o munícipe informado como principal e o problema não esteja vinculado a validação

```
"Dado" que uma requisição HTTP ao servidor é feita
"E" seja enviado um munícipe impossível de processamento
"Quando" o servidor responder
"Então" deve ser apresentada uma mensagem de erro
```

```json
HTTP_CODE: 200
{
    "status": true,
    "body": {
        "error": null,
        "error_type": null,
        "result": {
            "manual": [
                {
                    "nao-pode-ser-principal": {
                        "municipe": {
                            "id": 1,
                            "codigo_cns": "777",
                            "registro_principal": 1,
                            "ref": null,
                        }
                    }
                }
            ],
            "ini_time": 1686478070,
            "end_time": 1686478070,
            "spent_time": 0
        },
        "complement": null
    }
}
```

## Referências
- [História] - (https://github.com/OM30/saudesimples-servico-consolidacao/blob/main/docs/stories/v1.0.0/processamento_manual.md)
- [API's] - (https://github.com/OM30/saudesimples-servico-consolidacao/blob/main/docs/api/main.md)
