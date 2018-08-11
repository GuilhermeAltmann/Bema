ESTRUTURA DO PROJETO
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources



REQUISITOS
------------

The minimum requirement by this project template that your Web server supports PHP 5.4.0.


INSTALAÇÃO
------------

### 1º Passo

```php
    composer update
```

### 2º Passo

```php
    php yii migrate
```
### 3º Passo
```php
    ./yii init-data-base
```

Como acessar:

~~~
http://localhost/[pasta-app]/web/
~~~


CONFIGURAÇÃO
-------------

### Banco de dados

Editar o arquivo `config/db.php` para conectar com o banco de dados:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```
