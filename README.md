# Value Object

## Installation
Install the latest version with:
```
$ composer require yakiv-khorunzhyi/value-object
```

## Examples
```
$address = new Core\ScalarType('Country,city,street', Core\Types::STRING);

$address->setFormatRule(function ($val) {
    return explode(',', $val);
});

var_dump($address->getFormattedValue());
var_dump($address->getValue());
var_dump($address->getType());

/*
1) array(3) {
  [0]=>
  string(7) "Country"
  [1]=>
  string(4) "city"
  [2]=>
  string(6) "street"
}

2) string(19) "Country,city,street"

3) string(6) "string"
*/
```

## License
MIT license.