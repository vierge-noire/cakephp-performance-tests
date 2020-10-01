# CakePHP Performance Tests

The package propose statistics on test performances with CakePHP  with various methods.

## Test methods

### CakePHP static fixtures

Static fixtures refer to the legacy CakePHP fixtures.
The legacy listener refers to the legacy CakePHP listener for phpunit.

### CakePHP fixture factories

Dynamic refers to the creation of entities without persisting them in the
database. In many cases, tests require an entity without having it
necessarily saved in the DB. The factories enable to produce non-persisted
entities, This leads to faster tests and DB independent tests (real unit tests).


### Friends of Cake fixturize

A powerful tool to speed-up the creation of static fixtures. 
https://github.com/FriendsOfCake/fixturize 

It turns out however to be slower than the legacy fixtures if the DB's tables
are modified during the tests. 

## Test set
- 10 Tables, all used in each test
- one test class per table
- N tests per test class

Number of tests run in total N * 10.

Optional: dirty
- all tables get modified during the test

## Test results

### CakePHP 3

Results from [here](https://github.com/pabloelcolombiano/cakephp-performance-tests/actions/runs/275716897)
run on mysql, PHP 7.4. The numbers given are in seconds.

| Number of tests per class (N)             | 10  | 20  | 30  | 40  | 50  | 60   | Ratio |
| ----------------------------------------- | --- | --- | --- | --- | --- | ---  | ----- |
| Dynamic                                   | 0.6 | 1.0 | 1.6 | 2.0 | 2.2 | 2.6  | 60    |
| Dynamic persisted                         | 5.4 | 9.1 | 23  | 28  | 23  | 24   | 6.5   |
| Static                                    | 7.7 | 16  | 45  | 77  | 100 | 135  | 1.1   |
| Static, legacy listener                   | 9.0 | 21  | 58  | 92  | 109 | 155  | 1     |

### CakePHP 4

Results from [here](https://github.com/pabloelcolombiano/cakephp-performance-tests/actions/runs/275717326)
run on mysql, PHP 7.4. The numbers given are in seconds.

| Number of tests per class (N)             | 10  | 20  | 30  | 40  | 50  | 60   | Ratio |
| ----------------------------------------- | --- | --- | --- | --- | --- | ---  | ----- |
| Dynamic                                   | 0.6 | 1.1 | 1.6 | 1.9 | 2.7 | 2.7  | 53    |
| Dynamic persisted                         | 7.2 | 10  | 15  | 24  | 26  | 36   | 4.0   |
| Static                                    | 7.8 | 19  | 37  | 64  | 102 | 139  | 1.0   |
| Static, legacy listener                   | 7.7 | 19  | 38  | 64  | 100 | 143  | 1     |

### Fixturize plugin

Results from [here](https://github.com/pabloelcolombiano/cakephp-performance-tests/actions/runs/275715544)
run on mysql, PHP 7.4, CakePHP 3.9, with N = 40 tests per class. The numbers given are in seconds. 

| Number of dirty tables per tests          |  0  |  2  |  5  | 10  |
| ----------------------------------------- | --- | --- | --- | --- | 
| Dynamic                                   | 1.7 | 1.7 | 1.7 | 1.7 |
| Dynamic persisted                         | 15  | 15  | 16  | 19  | 
| Static fixturized                         | 3.2 | 17  | 37  | 74  | 
| Static fixturized, legacy listener        | 4.2 | 21  | 44  | 82  | 
| Static                                    | 64  | 64  | 64  | 64  | 
| Static, legacy listener                   | 76  | 76  | 76  | 76  | 

## Conclusion

The fixture factories significantly speed up the tests, regardless of the fact that the tables get modified or not.

The fixturize plugin (available for CakePHP 3 only for the moment) speeds up the DB population drastically. It however shows
limitations when data get modified by the tests. 

## License

The CakePHPFixtureFactories plugin is offered under an [MIT license](https://opensource.org/licenses/mit-license.php).

Copyright 2020 Nicolas Masson and Juan Pablo Ramirez

Licensed under The MIT License Redistributions of files must retain the above copyright notice.

## Authors
* Nicolas Masson
* Juan Pablo Ramirez 
