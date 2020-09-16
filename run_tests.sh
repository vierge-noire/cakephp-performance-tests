#!/bin/bash

NUMBER_OF_TESTS_PER_CLASS=$1

DB_HOST=$2

REPEAT=$3;

NUMBER_OF_RECORDS_PER_FIXTURE=$4;

DB_HOST=${DB_HOST:=mysql}
REPEAT=${REPEAT:=10}
NUMBER_OF_RECORDS_PER_FIXTURE=${NUMBER_OF_RECORDS_PER_FIXTURE:=$((NUMBER_OF_TESTS_PER_CLASS * REPEAT))}

echo "With host: $HOST"
echo "With repeat: $REPEAT"
echo "With number of records per fixtures: $NUMBER_OF_RECORDS_PER_FIXTURE"

export NUMBER_OF_TESTS_PER_CLASS=$NUMBER_OF_TESTS_PER_CLASS
export DB_HOST=$DB_HOST
export NUMBER_OF_RECORDS_PER_FIXTURE=$NUMBER_OF_RECORDS_PER_FIXTURE
export NUMBER_OF_TESTS_PER_CLASS=$NUMBER_OF_TESTS_PER_CLASS

echo "Starting PHPUNIT tests"

echo "Dynamic fixtures"
vendor/bin/phpunit --testsuite d --repeat $REPEAT

echo "Dynamic persisted fixtures"
vendor/bin/phpunit --testsuite dp --repeat $REPEAT

echo "Static fixtures"
vendor/bin/phpunit --testsuite s --repeat $REPEAT

echo "Static fixtures with Cake native listener"
vendor/bin/phpunit --testsuite s --configuration phpunit_cake.xml --repeat $REPEAT

echo "Static fixtures fixturized"
vendor/bin/phpunit --testsuite sf --repeat $REPEAT

echo "Static fixtures fixturized with Cake native listener"
vendor/bin/phpunit --testsuite sf --configuration phpunit_cake.xml --repeat $REPEAT
