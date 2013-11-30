Sucre/Assertion
===============

Sucre/Assertion is simple loosely-coupled assertion PHP library.

Requirement
--------------------

* PHP 5.4 or later

Installation
--------------------

Download the [`composer.phar`](http://getcomposer.org/composer.phar).

``` sh
$ curl -s http://getcomposer.org/installer | php
```

Run Composer: `php composer.phar require "t-cyrill/sucre-assertion"`

Usage
--------------------
```php
<?php
reqire __DIR__.'/composer/autoload.php';

use Sucre\Assertion;

// Assertion::disable(); // if you disable Sucre\Assertion (ie. production)
Assertion::mustString($string);

```

License
--------------------
The MIT License

