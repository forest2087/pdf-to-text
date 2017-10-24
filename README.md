# Extract text from a pdf


This package provides a class to extract text from a pdf.

```php
 \forest\PdfToText\Pdf::getText('book.pdf'); //returns the text from the pdf
```

## Requirements

Behind the scenes this package leverages [pdftotext](https://en.wikipedia.org/wiki/Pdftotext). You can verify if the binary installed on your system by issueing this command:
```
which pdftotext
```

If it is installed it will return the path to the binary.

To install the binary you can use this command on Ubuntu or Debian:

```php
apt-get install poppler-utils
```

If you're on RedHat or CentOS use this:

```bash
yum install poppler-utils
```

## Installation

You can install the package via composer:
```bash
$ composer require forest/pdf-to-text
```

## Usage

Extracting text from a pdf is easy.

```php
$text = (new Pdf())
    ->setPdf('book.pdf')
    ->text();
```

Or easier:

```php
 \forest\PdfToText\Pdf::getText('book.pdf')
```

By default the package will assume that the `pdftotext` is located at `/usr/bin/pdftotext`.
If you're using the a different location pass the path to the binary in constructor
```php
$text = (new Pdf('/custom/path/to/pdftotext'))
    ->setPdf('book.pdf')
    ->text();
```

or as the second parameter to the `getText`-function:
```php
 \forest\PdfToText\Pdf::getText('book.pdf', '/custom/path/to/pdftotext')
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.


## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
