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

echo "Static fixtures, native listener"
vendor/bin/phpunit --testsuite s --configuration phpunit_cake.xml --repeat $REPEAT

echo "Static fixtures"
vendor/bin/phpunit --testsuite s --repeat $REPEAT

echo "Dynamic fixtures"
vendor/bin/phpunit --testsuite d --repeat $REPEAT

for i in 0 2 5 10
do
  export NUMBER_OF_DIRTY_TABLES=$i

  echo "Dynamic persisted fixtures, $i dirty tables"
  vendor/bin/phpunit --testsuite dpd --repeat $REPEAT

  echo "Static fixtures fixturized, $i dirty tables"
  vendor/bin/phpunit --testsuite sfd --repeat $REPEAT
done

for i in 0 2 5 10
do
  export NUMBER_OF_DIRTY_TABLES=$i

  echo "Static fixtures fixturized, Cake native listener, $i dirty tables"
  vendor/bin/phpunit --testsuite sfd --configuration phpunit_cake.xml --repeat $REPEAT
done
