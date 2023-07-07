## Documentation
- [Business] - (https://github.com/OM30/<link>/blob/main/docs/stories/main.md)
- [Technical] - (https://github.com/OM30/<link>/blob/main/docs/api/main.md)

## Installation
All commands should be executed at the root of the project, inside the PHP server, after cloning the repository.

```bash
composer install
composer run post-root-package-install
composer run post-create-project-cmd
npm install
```

## Setting up the database
> Don't forget to properly configure your .env file at the root of the project for successful database connection, for example.

You will need to create the tables in the database (if you are using it locally) for the project to work as expected. Execute the following command:

```bash
php artisan migrate
```

```bash
INFO  Preparing database.  
Creating migration table ................................... 137ms DONE

INFO  Running migrations.  
  2023_05_05_125403_<migration> ................................. 139ms DONE
```

## Technologies and Libraries
- [PHP] - https://www.php.net
- [Dependency Manager] - https://getcomposer.org
- [Laravel] - https://laravel.com/docs/9.x

## Static Analyzers
Run the following command inside the PHP server:
```shell
vendor/bin/phpstan analyse app
```

```
 303/303 [▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓] 100%
 [OK] No errors                                                          
```

## Unit Tests
Run the following command inside the PHP server:
```
php artisan test
```
```
PASS  Tests\Unit\ExampleTest
✓ that true is true                                         0.03s  

  PASS  Tests\Feature\ExampleTest
✓ the application returns a successful response             0.33s  

Tests:    2 passed (2 assertions)
Duration: 0.64s
```
