# PHP Config
-------------
`.config`: config file reader and use anywhere in environment. Very simple user configuration settings 
anywhere in project.

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
// Don't forget to load autoload composer file.
// require __DIR__ . '/vendor/autoload.php'; 

// Optional you can pass file name by second parameters
Config::init(__DIR__, '.myconfig');
// no need to init function call if file name is .config and located on root of project
```

After load file you can call direct config parameter like following code

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

echo Config::get('DB_NAME');
// output: test_database

echo Config::get('API_KEY');
// output: sdfds6549sdf7SDFD@#$55

// With under any namespace
echo \Config::get('API_KEY');

// call other way from anywhere
getConfig('API_KEY');
getConfig('API_KEY', 'DEFAULT VALUE IF NOT FOUND');

echo Config::get('DUMMY', 'Default Value');
// output: Default Value
// Get default value if key not found in config file

```

You can use comment by start with hash`#` or dash`-` sign.

-----

Let me know if any issue or any feature require.

------