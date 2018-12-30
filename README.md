#Validator

##Installation

Validator uses Composer to install and update:

    composer require avaslev/validator

##Running Tests

The test suite depends on the Composer autoloader to load and run the Validator files. Please ensure you have downloaded and installed Composer before running the tests

    ./vendor/bin/phpunit --bootstrap vendor/autoload.php tests
