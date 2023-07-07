## v1.0.0 DOC: Busca por CNS

A tela de busca por CNS permite pesquisar um munícipe pelo CNS (Cartão Nacional de Saúde). 

Se o sistema identificar que o cadastro encontrado corresponde a um cadastro secundário, ele tentará buscar o cadastro principal associado para exibi-lo ao solicitante.
Caso não encontre um cadastro principal, o dado apresentado como resposta será referente ao cadastro secundário.

A fim de obter mais detalhes sobre as regras mencionadas, recomendamos consultar o seguinte link:
https://projetos.om30.cloud/issues/11557

É importante ressaltar que, em alguns casos, pode não haver nenhum retorno após a solicitação. Isso ocorre quando o sistema não consegue encontrar nem o cadastro secundário nem o cadastro principal correspondentes ao CNS pesquisado.

## Referências
- [API] - (https://github.com/OM30/saudesimples-servico-consolidacao/blob/main/docs/api/v1.0.0/busca_cns.md)
- [Histórias] - (https://github.com/OM30/saudesimples-servico-consolidacao/blob/main/docs/stories/main.md)
