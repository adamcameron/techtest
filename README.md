# Tech Test
A repo to hold environment, config and code for a PHP tech test.

This is a dev/test environment comprising an Nginx website (exposed as http://localhost), PHP 8, and MariaDB 10.

The baseline contains:
* a unit test to test basic PHPUnit and PHP functionality:
  * test/unit/MyClassTest.php;
* functional tests to test Nginx is serving HTML and PHP (http://localhost/hellowWorld.html and helloWorld.php respectively);
  * test/functional/public/WebServerTest.php
  * test/functional/public/PhpTest.php
* an integration test that data can be fetched from the test DB:
  * test/integration/DatabaseTest.php

Installation / test:
```shell
cd docker
docker-compose up --build --detach
docker exec --interactive --tty techtest_php-fpm_1 /bin/bash

composer test
composer phpmd # note that this is currently erroring due to a bug in pdepend (see https://github.com/phpmd/phpmd/issues/853)
composer phpcs # this does not output anything (which is correct: there are no problems ;-)
```
Expected output from PHPUnit run:
```shell
root@faff3c99eaaf:/usr/share/techTest# composer test
> phpunit
PHPUnit 9.5.1 by Sebastian Bergmann and contributors.

....                                                                4 / 4 (100%)

Time: 00:00.116, Memory: 12.00 MB

OK (4 tests, 9 assertions)

Generating code coverage report in HTML format ... done [00:00.288]
root@faff3c99eaaf:/usr/share/techTest#
```

Also see code coverage reporting at http://localhost/test-coverage-report/MyClass.php.html
