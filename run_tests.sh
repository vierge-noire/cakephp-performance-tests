#!/bin/bash

echo "Starting PHPUNIT tests"

bin/cake migrations migrate

echo "Dynamic fixtures"
vendor/bin/phpunit --testsuite d --repeat 100

echo "Dynamic persisted fixtures"
vendor/bin/phpunit --testsuite dp --repeat 100

echo "Static fixtures"
vendor/bin/phpunit --testsuite s --repeat 100

echo "Static fixtures with Cake native listener"
vendor/bin/phpunit --testsuite s --configuration phpunit_cake.xml --repeat 100
