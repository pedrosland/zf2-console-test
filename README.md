# Work Angel PHP

This is a command line application to process a table (CSV file) and print selected transactions.

Transaction values should be converted into GBP.

I've tried to do this the ZF2 way as much as possible. Not really knowing the framework, I'm sure that I'm violating
some best practices. One thing that I notice is that my namespace for the tests doesn't reflect their directory - thanks
ZF docs.

Note that the app doesn't actually do anything. There are tests though.

## Usage

    php public/index.php transactions list <merchantID>

## Run Tests

    cd modules/Transactions/test
    phpunit
