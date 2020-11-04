#!/bin/bash

DB_DRIVER=$1

echo "With driver: $DB_DRIVER"
export DB_DRIVER=$DB_DRIVER

NUMBER_OF_TESTS_PER_CLASS=40
echo "With: $NUMBER_OF_TESTS_PER_CLASS tests per class"
export NUMBER_OF_TESTS_PER_CLASS=$NUMBER_OF_TESTS_PER_CLASS

REPEAT=10
echo "Repeated: $REPEAT times"
export REPEAT=$NUMBER_OF_TESTS_PER_CLASS

NUMBER_OF_RECORDS_PER_FIXTURE=$((NUMBER_OF_TESTS_PER_CLASS * REPEAT))
echo "Number of records per fixtures: $NUMBER_OF_RECORDS_PER_FIXTURE"
export NUMBER_OF_RECORDS_PER_FIXTURE=$NUMBER_OF_RECORDS_PER_FIXTURE


echo "Starting PHPUNIT tests"

echo "Dynamic fixtures"
vendor/bin/phpunit --testsuite d --repeat $REPEAT

echo "Dynamic persisted fixtures"
vendor/bin/phpunit --testsuite dp --repeat $REPEAT

# This test is way too long. Skip it
#echo "Dynamic persisted fixtures massive"
#vendor/bin/phpunit --testsuite dpm --repeat $REPEAT

echo "Static fixtures"
vendor/bin/phpunit --testsuite s --repeat $REPEAT

echo "Static fixtures with Cake native listener"
vendor/bin/phpunit --testsuite s --configuration phpunit_cake.xml --repeat $REPEAT