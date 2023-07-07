## v1.0.0 DOC: Busca de munícipes duplicados

A tela de busca de municípes duplicados foi desenvolvida para identificar os municípes que seriam impactados caso uma consolidação manual fosse realizada.

Nesta tela, é necessário fornecer o municípe de referência, com base em seus valores, a fim de encontrar outros municípes que possuam alguma similaridade ou semelhança.

### Critérios de similaridade/semelhança
As comparações para determinar a similaridade/semelhança são baseadas nas seguintes regras:

- `Primeira regra`: São buscados municípes que possuam os mesmos dados cadastrados em: cpf_numero, codigo_cns, nome, data_nascimento, nome_mae.

- `Segunda regra`: São buscados municípes que possuam os mesmos dados cadastrados em: (cpf_numero ou codigo_cns), nome, data_nascimento, nome_mae.

- `Terceira regra`: São buscados municípes que possuam os mesmos dados cadastrados em: nome, data_nascimento, nome_mae.

Essas regras auxiliam na identificação de municípes duplicados ou que apresentem similaridades significativas nos dados cadastrados.

> "Ao executar a primeira regra e encontrar municípes que atendam aos critérios estabelecidos, as demais regras não serão aplicadas. Isso garante que a busca priorize a correspondência mais precisa."

A fim de obter mais detalhes sobre as regras mencionadas, recomendamos consultar o seguinte link:
https://projetos.om30.cloud/issues/11550

## Referências
- [API] - (https://github.com/OM30/saudesimples-servico-consolidacao/blob/main/docs/api/v1.0.0/busca_municipes_duplicados.md)
- [Histórias] - (https://github.com/OM30/saudesimples-servico-consolidacao/blob/main/docs/stories/main.md)
