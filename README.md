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

| Number of tests per class (N)             | 10  | 20  | 30  | 40  | 50  | Ratio |
| ----------------------------------------- | --- | --- | --- | --- | --- | ----- |
| Dynamic                                   | 3.1 | 6.5 | 9.9 | 12  | 16  | 7.4   |
| Dynamic persisted                         | 8.4 | 17  | 24  | 29  | 42  | 2.8   |
| Static                                    | 7.0 | 20  | 36  | 67  | 100 | 1.2   |
| Static, legacy listener                   | 11  | 26  | 45  | 79  | 119 | 1     |

### CakePHP 4

Results from [here](https://github.com/pabloelcolombiano/cakephp-performance-tests/actions/runs/275717326)
run on mysql, PHP 7.4. The numbers given are in seconds.

| Number of tests per class (N)             | 10  | 20  | 30  | 40  | 50  | Ratio |
| ----------------------------------------- | --- | --- | --- | --- | --- | ----- |
| Dynamic                                   | 2.8 | 6.5 | 9.4 | 14  | 14  | 7.1   |
| Dynamic persisted                         | 6.5 | 15  | 24  | 33  | 33  | 3.0   |
| Static                                    | 5.9 | 18  | 36  | 69  | 99  | 1.0   |
| Static, legacy listener                   | 6.2 | 18  | 37  | 75  | 100 | 1     |

### Fixturize plugin

Results from [here](https://github.com/pabloelcolombiano/cakephp-performance-tests/actions/runs/275715544)
run on mysql, PHP 7.4, CakePHP 3.9, with N = 30 tests per class. The numbers given are in seconds. 

| Number of dirty tables per tests          |  0  |  2  |  5  | 10  |
| ----------------------------------------- | --- | --- | --- | --- | 
| Dynamic persisted                         | 22  | 22  | 22  | 23  | 
| Dynamic                                   | 9.7 | 9.7 | 9.7 | 9.7 |
| Static fixturized                         | 2.5 | 11  | 23  | 44  | 
| Static fixturized, legacy listener        | 3.4 | 14  | 29  | 52  | 
| Static                                    | 38  | 38  | 38  | 38  | 
| Static, legacy listener                   | 50  | 50  | 50  | 50  | 

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
