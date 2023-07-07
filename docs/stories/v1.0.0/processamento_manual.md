## v1.0.0 DOC: Processamento manual

A tela de busca de processamento manual permite definir um munícipe selecionado como o principal, desde que todos os requisitos sejam atendidos.

Primeiramente, vale destacar a busca por registros semelhantes, seguindo as seguintes regras: (`Primeira`, `Segunda`, `Terceira`).

- [Link para documentação sobre regras de duplicidade](https://github.com/OM30/saudesimples-servico-consolidacao/blob/main/docs/stories/busca_municipes_duplicados.md#criterios-de-similaridade-semelhanca)

Além disso, há a validação dos dados do munícipe selecionado com base na unidade de saúde vinculada.

- [Link para documentação sobre regras de validação para determinar se um munícipe pode ser considerado como cadastro principal](https://github.com/OM30/saudesimples-servico-consolidacao/blob/main/docs/stories/municipe_pode_ser_considerado_para_cadastro_principal.md)

A partir disso, conseguimos extrair alguns cenários possíveis durante o processamento, sendo eles:

- O munícipe selecionado não pode ser aprovado como "cadastro principal".
- O munícipe selecionado não possui semelhantes e já é um registro principal.
- O munícipe selecionado não possui semelhantes e não é um registro principal.
- O munícipe selecionado possui semelhantes e já é um registro principal.
- O munícipe selecionado possui semelhantes e não é um registro principal.
- O munícipe selecionado possui semelhantes e não precisa atualizar todo o histórico, pois todos os semelhantes já pertencem a ele.
- O munícipe selecionado possui semelhantes e precisa atualizar o histórico devido à descoberta de novos semelhantes.

Outro ponto importante é a regra de precedência ao sobrescrever os dados do munícipe principal, conforme mencionado na tarefa: https://projetos.om30.cloud/issues/11582

```
7 - prioridade 1
1 - prioridade 2
2 - prioridade 3
9 - prioridade 4
8 - prioridade 5
```

Caso ainda existam registros que se enquadrem na mesma "prioridade", a **data de criação** e a **data de atualização** serão consideradas, sendo que registros mais recentes têm prioridade.

## Referências
- [API] - (https://github.com/OM30/saudesimples-servico-consolidacao/blob/main/docs/api/v1.0.0/processamento_manual.md)
- [Histórias] - (https://github.com/OM30/saudesimples-servico-consolidacao/blob/main/docs/stories/main.md)
