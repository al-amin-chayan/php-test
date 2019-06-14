## PHP TEST

### Prerequisite
This project utilizes <a href="https://git-scm.com/book/en/v2/Getting-Started-Installing-Git">Git</a> as version control system and
<a href="https://getcomposer.org/">Composer</a> to manage its dependencies. So, before using this project, make sure you have those installed on your machine. [PHP >= 7.1.3].

### How to Install

Run the following commands in terminal: 

```bash
$ git clone git@github.com:alamin-chayan/php-test.git
$ cd php-test
$ composer install
```

To See the output

```bash
$ php index.php
```

For Test:

```bash
$ ./vendor/bin/phpunit --bootstrap vendor/autoload.php tests
```