#!/bin/bash

DB_DRIVER=$1

NUMBER_OF_TESTS_PER_CLASS=$2

REPEAT=$3;

NUMBER_OF_RECORDS_PER_FIXTURE=$4;

REPEAT=${REPEAT:=10}
NUMBER_OF_RECORDS_PER_FIXTURE=${NUMBER_OF_RECORDS_PER_FIXTURE:=$((NUMBER_OF_TESTS_PER_CLASS * REPEAT))}

echo "With driver: $DB_DRIVER"
echo "With repeat: $REPEAT"
echo "With number of records per fixtures: $NUMBER_OF_RECORDS_PER_FIXTURE"

export NUMBER_OF_TESTS_PER_CLASS=$NUMBER_OF_TESTS_PER_CLASS
export DB_DRIVER=$DB_DRIVER
export NUMBER_OF_RECORDS_PER_FIXTURE=$NUMBER_OF_RECORDS_PER_FIXTURE
export NUMBER_OF_TESTS_PER_CLASS=$NUMBER_OF_TESTS_PER_CLASS

echo "Starting PHPUNIT tests"

echo "Dynamic fixtures"
vendor/bin/phpunit --testsuite d --repeat $REPEAT

echo "Dynamic persisted fixtures"
vendor/bin/phpunit --testsuite dp --repeat $REPEAT

# This
#echo "Dynamic persisted fixtures"
#vendor/bin/phpunit --testsuite dpm --repeat $REPEAT

echo "Static fixtures"
vendor/bin/phpunit --testsuite s --repeat $REPEAT

echo "Static fixtures with Cake native listener"
vendor/bin/phpunit --testsuite s --configuration phpunit_cake.xml --repeat $REPEAT