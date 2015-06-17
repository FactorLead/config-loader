# Config Loader

Load config from php files at a known location.

[![Code Status](https://img.shields.io/scrutinizer/g/FactorLead/config-loader.svg)](https://scrutinizer-ci.com/g/FactorLead/config-loader/build-status/master)
[![Latest Version](https://img.shields.io/packagist/v/fl/config-loader.svg)](https://packagist.org/packages/fl/config-loader)
[![License](https://img.shields.io/packagist/l/fl/config-loader.svg)](https://packagist.org/packages/fl/config-loader)

## Installation

```bash
composer install fl/config-loader
```

## Usage

```php
$configLoader = new FL\Config\ConfigLoader($_ENV);
$config = $configLoader->load();
```
