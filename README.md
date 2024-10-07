# This is my package dbrepositories

[![Latest Version on Packagist](https://img.shields.io/packagist/v/tyasa81/dbrepositories.svg?style=flat-square)](https://packagist.org/packages/tyasa81/dbrepositories)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/tyasa81/dbrepositories/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/tyasa81/dbrepositories/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/tyasa81/dbrepositories/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/tyasa81/dbrepositories/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/tyasa81/dbrepositories.svg?style=flat-square)](https://packagist.org/packages/tyasa81/dbrepositories)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require tyasa81/dbrepositories
```

## Usage

create your repository file, then implement RepositoryInterface and use EloquentTrait as below. Or you can extend your own implementation

```php
use tyasa81\DbRepositories\EloquentTrait;
use tyasa81\DbRepositories\RepositoryInterface;
use App\Models\User;

final class UserRepository implements RepositoryInterface
{
    use EloquentTrait;

    private $model;

    public function __construct(?string $connector = null)
    {
        $this->model = new User;
        if ($connector) {
            $this->model = $this->model->on($connector);
        }
    }
}
```

## Testing

```bash
vendor/bin/testbench package:create-sqlite-db
vendor/bin/testbench migrate
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Tony Yasa](https://github.com/tyasa81)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
