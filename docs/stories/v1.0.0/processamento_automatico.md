## v1.0.0 DOC: Processamento automático

A tela de busca de processamento automático permite executar e percorrer todos os munícipes da base de dados para realizar a consolidação e unificação, desde que todos os requisitos sejam atendidos.

Em relação às regras de similaridade e registros semelhantes, no processamento automático, são aplicadas as seguintes regras:

- `Primeira regra`: São buscados municípes que possuam os mesmos dados cadastrados em: cpf_numero, codigo_cns, nome, data_nascimento, nome_mae.

- `Segunda regra`: São buscados municípes que possuam os mesmos dados cadastrados em: (cpf_numero ou codigo_cns), nome, data_nascimento, nome_mae.

Além disso, no processamento automático, não há validação dos dados do munícipe selecionado com base na unidade de saúde vinculada. A premissa é que, ao possuir semelhança com outros registros, o munícipe já está apto a ser considerado um registro principal de acordo com a prioridade e a precedência.

Os mesmos cenários e regras de priorização encontrados no processamento manual também se aplicam ao processamento automático, conforme documentado em:
- [Link de cenários durante processamento manual](https://github.com/OM30/saudesimples-servico-consolidacao/blob/main/docs/stories/processamento_manual.md)

## Rotina interna
Uma rotina interna foi desenvolvida para permitir a execução automatizada do processo, eliminando a necessidade de intervenção manual. Para obter mais detalhes sobre essa funcionalidade, é recomendado acessar a página dedicada à API de processamento automático correspondente.

## Referências
- [API] - (https://github.com/OM30/saudesimples-servico-consolidacao/blob/main/docs/api/v1.0.0/processamento_automatico.md)
- [Histórias] - (https://github.com/OM30/saudesimples-servico-consolidacao/blob/main/docs/stories/main.md)
