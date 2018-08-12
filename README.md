ESTRUTURA DO PROJETO
-------------------

      assets/             
      commands/           
      config/             
      controllers/        
      mail/               
      models/             
      runtime/            
      tests/              
      vendor/             
      views/              
      web/                



REQUISITOS
------------

O minimo para se rodar esse projeto é PHP 7 e Composer. Mais informações https://getcomposer.org/.
Testes realizados no MariaDB 10 e PHP 7.1.

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



