# php-unleash-client

A simple client for Unleash

### Installation
```bash
composer require daltcore/php-unleash-client
```

### Usage
```
include('vendor/autoload.php');

try {
    $unleash = new \DALTCORE\Unleash("https://gitlab.com/api/v4/feature_flags/unleash/3", "TokenForUnleash", "ApplicationName");
} catch (MissingParameterException $e) {
    die($e->getMessage());
}

var_dump($unleash->feature('test_feature')->isEnabled());
```

_More documentation is coming later_