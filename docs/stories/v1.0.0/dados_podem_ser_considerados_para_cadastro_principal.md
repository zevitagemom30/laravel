## v1.0.0 DOC: Dados podem ser considerados para cadastro principal

A tela de validação de dados é usada para verificar se os dados fornecidos podem ou não ser considerados para o cadastro principal. 

Nessa tela, você precisa selecionar o tipo de validação que será utilizado, levando em consideração a configuração da unidade. 

Existem três opções de validação disponíveis:
- `Sem validação`: Nenhuma validação robusta será realizada.
- `Validação CPF ou CNS`: Será feita a validação do CPF (Cadastro de Pessoa Física) ou CNS (Cartão Nacional de Saúde) além dos demais campos.
- `Validação completa do munícipe`: Será realizada uma validação completa dos dados do munícipe.

A fim de obter mais detalhes sobre as regras mencionadas, recomendamos consultar o seguinte link:
https://projetos.om30.cloud/issues/11553

Além disso, é importante destacar que, caso os dados fornecidos se refiram a um munícipe menor de idade, é obrigatório informar o nome do responsável. Caso contrário, a validação não será aprovada.

Você pode preencher os dados na tela de validação e a aplicação irá realizar a verificação com base no tipo de validação selecionado, considerando todos os campos do cadastro do munícipe.

## Referências
- [API] - (https://github.com/OM30/saudesimples-servico-consolidacao/blob/main/docs/api/v1.0.0/dados_podem_ser_considerados_para_cadastro_principal.md)
- [Histórias] - (https://github.com/OM30/saudesimples-servico-consolidacao/blob/main/docs/stories/main.md)
