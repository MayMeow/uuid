# UUID generator

[![Build Status](https://travis-ci.org/MayMeow/uuid.svg?branch=master)](https://travis-ci.org/MayMeow/uuid)

Simple library to generating RFC 4122 version 3,4 and 5 UUID (Universaly Unique Identifier).

From [Wikipedia](https://en.wikipedia.org/wiki/Universally_unique_identifier):A universally unique identifier (UUID) is a 128-bit number used to identify information in computer systems. Microsoft uses the term globally unique identifier (GUID), either as a synonym for UUID or to refer to a particular UUID variant.

## Requirements

* PHP 5.5 and up
* Composer

## Installation

```bash
composer require maymeow/uuid
```

## Usage

### Generating UUID v3

To generate UUID version 3 from namespace and name:

```php
// Version 3 uuid for DNS
$uuidv3 = UUID::v3(UUID::NAMESPACE_DNS, 'test.maymeow.click');
```

### Generating UUID v4

To generate UUID version 3 - random UUID

```php
// Version 3 uuid for DNS
$uuidv4 = UUID::v4();
```

### Generating UUID v5

To generate UUID version 5 from namespace and name:

```php
// Version 3 uuid for DNS
$uuidv3 = UUID::v5(UUID::NAMESPACE_DNS, 'test.maymeow.click');
```

### Checking if uuid is valid

```php
// Version 3 uuid for DNS
$response = UUID::is_valid('454eb932-adf4-52a5-9285-31ccebc92e96');
```

## Contributing

1. Fork it!
2. Create your feature branch: `git checkout -b my-new-feature`
3. Commit your changes: `git commit -am 'Add some feature'`
4. Push to the branch: `git push origin my-new-feature`
5. Submit a pull request.

## Credits

[Charlotta Jung - MayMeow](https://github.com/MayMeow)

## License

MIT [LICENSE][]