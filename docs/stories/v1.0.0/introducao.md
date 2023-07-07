## v1.0.0 DOC: Introdução

### O que é a consolidação?
O projeto de consolidação tem como objetivo principal disponibilizar um serviço que nos permite ter acesso a todos os munícipes cadastrados no banco de dados, sejam eles duplicados ou não. A partir disso, podemos tomar a decisão de unificar os dados daquele munícipe para garantir a integridade, validação das informações apresentadas na tela e centralização das informações no histórico correto.

### Quais tipos de consolidação possuímos?
Atualmente, temos dois tipos de consolidação: manual e automática.

No caso da **consolidação manual**, existe um fluxo que pode ser seguido para que o funcionamento atenda às suas expectativas. Esse fluxo inclui:

- Buscar os munícipes que você gostaria de visualizar ou filtrar: [link](https://github.com/OM30/saudesimples-servico-consolidacao/blob/main/docs/stories/v1.0.0/busca_municipes.md)
- Após identificar o munícipe desejado, buscar os registros duplicados daquela referência: [link](https://github.com/OM30/saudesimples-servico-consolidacao/blob/main/docs/stories/v1.0.0/busca_municipes_duplicados.md)
- Caso existam registros duplicados ou semelhantes, validar se o munícipe de referência pode ser considerado como o "cadastro principal": [link](https://github.com/OM30/saudesimples-servico-consolidacao/blob/main/docs/stories/v1.0.0/municipe_pode_ser_considerado_para_cadastro_principal.md)
- Por fim, se o munícipe for válido e houver dados a serem consolidados/unificados, executar o processamento manual: [link](https://github.com/OM30/saudesimples-servico-consolidacao/blob/main/docs/stories/v1.0.0/processamento_manual.md)

No caso do processamento **automático**, o fluxo acima pode ser totalmente ignorado, bastando apenas executar o processo diretamente e permitir que o serviço identifique quais registros podem ou não ser considerados como "principais": [link](https://github.com/OM30/saudesimples-servico-consolidacao/blob/main/docs/stories/v1.0.0/processamento_automatico.md)

### Quem são os envolvidos na consolidação?
Basicamente, temos algumas entidades/recursos principais e outros secundários durante o processamento. São eles:

- Principais: [`municipe`, `unidade_saude`]
- Secundários: [`todas as outras tabelas que possuem algum tipo de relacionamento com o municipe`]

### O que será consolidado?
Uma vez que o processo de consolidação/unificação ocorre, basicamente levamos em conta:

- Todos os dados do munícipe
- Todos os históricos dos demais registros semelhantes/duplicados que passarão a fazer parte do "novo registro principal"

## Referências
- [Histórias](https://github.com/OM30/saudesimples-servico-consolidacao/blob/main/docs/stories/main.md)