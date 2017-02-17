# goo-gl

## Install
```bash
composer require cyphp/goo-gl
```

## Usage
```php
<?php

require_once __DIR__.'/vendor/autoload.php';

use Cyphp\Goo\Gl\Client;

$client = new Client('TOKEN');

$shortUrl = $client->shorten('http://www.example.com');

```
