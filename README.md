# [wselah.net](https://wselah.net) WhatsApp API Laravel

Lightweight PHP library for WhatsApp API to send the whatsappp messages in PHP provided by [wselah.net](https://wselah.net)

# Installation

use Composer:

```
composer require faisalbz/wselah-api
```

# Example usage

```php
<?php

$api_token="tof7lsdJasdloaa57e"; // wselah.net token
$device_id="4575845445"; // wselah.net device id
$client = new Wselah\WselahApi($api_token,$device_id);

$to="put_your_mobile_number_here";
$text="Hello world";
$api=$client->sendWhatsapp($to,$text);
print_r($api);
```

> **NOTE:** you need replace device_id and token with yours in [wselah.net](https://wselah.net) account if you don't have account create one from [here](https://wselah.net)

## Send Message

- **$to** : your number for testing with international format e.g. 966500000000
- **$text** : Message text, UTF-8 or UTF-16 string with emoji .

# Support

Use **Issues** to contact me
