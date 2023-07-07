## Documentação
- [Negócio] - (https://github.com/OM30/<link>/blob/main/docs/stories/main.md)
- [Técnica] - (https://github.com/OM30/<link>/blob/main/docs/api/main.md)

## Instalação
Todos os comandos devem ser executados na raiz do projeto, dentro do servidor PHP, após o `clone` do repositório.

```bash
composer install
composer run post-root-package-install
composer run post-create-project-cmd
npm install
````

## Configurando o banco de dados
> Não se esqueça de configurar corretamente o arquivo .env na raiz do projeto para que a conexão com o banco de dados seja bem-sucedida.

Você precisará criar as tabelas no banco de dados (caso esteja usando localmente) para que o projeto funcione conforme o esperado. Execute o seguinte comando:

```bash
php artisan migrate
```

```bash
INFO  Preparando o banco de dados.  
Criando tabela de migração ................................... 137ms CONCLUÍDO

INFO  Executando as migrações.  
  2023_05_05_125403_<migration> ................................. 139ms CONCLUÍDO
```

## Tecnologias e Bibliotecas
- [PHP] - https://www.php.net
- [Gerenciador de Dependências] - https://getcomposer.org
- [Laravel] - https://laravel.com/docs/9.x

## Analisadores estáticos
Execute o seguinte comando dentro do servidor PHP:
```shell
vendor/bin/phpstan analyse app
```

```
 303/303 [▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓] 100%
 [OK] Sem erros                                                          
```

## Testes Unitários
Execute o seguinte comando dentro do servidor PHP:
```
php artisan test
```
```
PASS  Tests\Unit\ExampleTest
✓ que true é verdadeiro                                         0.03s  

  PASS  Tests\Feature\ExampleTest
✓ a aplicação retorna uma resposta de sucesso                  0.33s  

Testes:    2 aprovados (2 verificações)
Duração: 0.64s
```
