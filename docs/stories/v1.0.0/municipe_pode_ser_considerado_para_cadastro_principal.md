## v1.0.0 DOC: Munícipe pode ser considerado para cadastro principal

A tela de validação de dados tem como objetivo verificar se o munícipe informado pode ou não ser considerado para o cadastro principal. 

Nessa tela, não é necessário selecionar o tipo de validação, pois o cadastro do munícipe já está vinculado à unidade e a unidade possui sua própria configuração de validação.

Existem três opções de validação disponíveis:
- `Sem validação`: Nenhuma validação robusta será realizada.
- `Validação CPF ou CNS`: Será feita a validação do CPF (Cadastro de Pessoa Física) ou CNS (Cartão Nacional de Saúde) além dos demais campos.
- `Validação completa do munícipe`: Será realizada uma validação completa dos dados do munícipe.

A fim de obter mais detalhes sobre as regras mencionadas, recomendamos consultar o seguinte link:
https://projetos.om30.cloud/issues/11553

É importante ressaltar que, caso o munícipe informado seja menor de idade, é obrigatório ter o nome do responsável registrado em seu cadastro. Caso contrário, a validação não será aprovada.

## Referências
- [API] - (https://github.com/OM30/saudesimples-servico-consolidacao/blob/main/docs/api/v1.0.0/municipe_pode_ser_considerado_para_cadastro_principal.md)
- [Histórias] - (https://github.com/OM30/saudesimples-servico-consolidacao/blob/main/docs/stories/main.md)
