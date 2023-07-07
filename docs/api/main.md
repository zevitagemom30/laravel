## API'S

### Cabeçalhos
Para garantir a segurança das requisições ao servidor, é necessário incluir no cabeçalho de cada solicitação a chave `Bearer` seguida de um token válido. O valor desse token deve ser fornecido, normalmente, através da variável de ambiente `APP_TOKEN` configurada na aplicação.

Caso o `token` não seja enviado no cabeçalho da requisição, a seguinte mensagem de erro será retornada:

```json
HTTP_CODE: 401
{
    "error": "Unauthorized."
}
```

### v1.0.0:
- **Adicionados**:
    - [Busca de munícipes](https://github.com/OM30/saudesimples-servico-consolidacao/blob/main/docs/api/v1.0.0/busca_municipes.md)
    - [Busca de munícipes duplicados por referência](https://github.com/OM30/saudesimples-servico-consolidacao/blob/main/docs/api/v1.0.0/busca_municipes_duplicados.md)
    - [Busca por CNS](https://github.com/OM30/saudesimples-servico-consolidacao/blob/main/docs/api/v1.0.0/busca_cns.md)
    - [Dados podem ser considerados para cadastro principal](https://github.com/OM30/saudesimples-servico-consolidacao/blob/main/docs/api/v1.0.0/dados_podem_ser_considerados_para_cadastro_principal.md)
    - [Munícipe pode ser considerado para cadastro principal](https://github.com/OM30/saudesimples-servico-consolidacao/blob/main/docs/api/v1.0.0/munícipe_pode_ser_considerado_para_cadastro_principal.md)
    - [Processamento manual](https://github.com/OM30/saudesimples-servico-consolidacao/blob/main/docs/api/v1.0.0/processamento_manual.md)
    - [Processamento automático](https://github.com/OM30/saudesimples-servico-consolidacao/blob/main/docs/api/v1.0.0/processamento_automatico.md)

### Jobs
- **Processamento automático**: Além da API HTTP para o processamento automático, foi desenvolvido um comando (`command`) com a mesma lógica, permitindo a execução por meio de linha de comando dentro de um terminal.

    Para executar o processo automático, acesse o servidor PHP onde a aplicação está hospedada, navegue até a raiz do projeto e execute o seguinte comando:

    ```
    php artisan app:automatic-process
    ```

    Você será questionado antes de iniciar o processamento:
    ```
    Data de início: 11/06/2023 11:25:02

    Deseja realmente executar o processo automático de consolidação? (yes/no) [no]:
    > no

    Data de término: 11/06/2023 11:25:09
    ```

    No exemplo acima, foi escolhido não prosseguir com o processamento. No entanto, se desejar executá-lo, digite `yes`, como mostrado abaixo:

    ```
    Data de início: 11/06/2023 11:26:59

    Deseja realmente executar o processo automático de consolidação? (yes/no) [no]:
    > yes

    Identificador: registro-definido-para-ser-principal-ja-e-principal
    Valor: {
        "municipe": {
            "id": 2,
            "codigo_cns": "2222",
            "registro_principal": 1,
            "ref": null,
        }
    }
    Identificador: somente-registro-base
    Valor: {
        "municipe": {
            "id": 2,
            "codigo_cns": "2222",
            "registro_principal": 1,
            "ref": null,
        }
    }
    Identificador: apagadas-falsas-referencias
    Valor: {
        "message": {
            "ref": 2,
            "affected_rows": 0
        }
    }
    Identificador: nenhum-registro-encontrado
    Valor: {
        "processeds": [
            3,
            1,
            2
        ]
    }

    Data de término: 11/06/2023 11:27:00
    Programa encerrado com sucesso.
    ```

### Histórias
Clique [aqui](https://github.com/OM30/saudesimples-servico-consolidacao/blob/main/docs/stories/main.md) para ser redirecionado à página com maior detalhes sobre negócios.
