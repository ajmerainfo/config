# PHP Config
-------------
`.config`: config file reader and user anywhere in environment. 

## Requirements

* PHP 5.3+

## Installation

_[Using [Composer](http://getcomposer.org/)]_

Run `composer require ajmerainfo/config`

Or add the plugin to your project's `composer.json` - something like this:

```composer
  {
    "require": {
      "ajmerainfo/config": "dev-master"
    }
  }
```

## Usage

Create a new loader from begining request:

```php
<?php
// Don't forget to load autoload file.
// require __DIR__ . '/vendor/autoload.php'; 

new Ajmerainfo\Config(__DIR__);

// Optional you can pass file name by second parameters
// new Ajmerainfo\Config(__DIR__, '.myconfig');
```

After load file you can call direct config parameter like follwing code

```text
// .config file on root

# Database Information
-----------------------
DB_NAME=test_database
DB_USERNAME=root
DB_PASSWORD=

# Payment Information
API_KEY=sdfds6549sdf7SDFD@#$55
```

You can call variable like below in PHP code

```php
<?php

// [File Name]_[Variable Name]

echo CONFIG_DB_NAME;
// output: test_database

```

You can use comment by hash`#` or dash`-` sign.

-----

Let me know if any issue or any feature require.
