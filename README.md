# CakePHP Performance Tests

The package propose statistics on test performances with CakePHP  with various methods.

## Test methods

### CakePHP static fixtures

Static fixtures refer to the legacy CakePHP fixtures.
The native listener refers to the legacy CakePHP listener for phpunit.

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

Results from [here](https://github.com/pabloelcolombiano/cakephp-performance-tests/actions/runs/263752278)
run on mysql, PHP 7.4. The numbers given are in seconds. The ratio is the run time of a scenario with N=50
divided by the "Static, native listener" scenario.

| Number of tests per class (N)             | 10  | 20  | 30  | 40  | 50  | Ratio |
| ----------------------------------------- | --- | --- | --- | --- | --- | ----- |
| Dynamic                                   | 3.7 | 9.0 | 11  | 12  | 18  | 7.1   |
| Dynamic persisted                         | 8.1 | 18  | 21  | 30  | 45  | 2.8   |
| Dynamic persisted dirty                   | 9.3 | 26  | 28  | 38  | 55  | 2.3   |
| Static                                    | 6.2 | 21  | 36  | 58  | 112 | 1.1   |
| Static dirty                              | 6.0 | 20  | 36  | 58  | 111 | 1.1   |
| Static, native listener                   | 8.3 | 28  | 43  | 70  | 127 | 1     |
| Static, native listener, dirty            | 8.0 | 28  | 43  | 68  | 135 | 0.9   |
| Static fixturized                         | 0.6 | 1.6 | 2.0 | 2.4 | 4.3 | 30    |
| Static fixturized, native listener        | 0.8 | 2.0 | 2.7 | 3.2 | 5.7 | 22    |
| Static fixturized, dirty                  | 8.7 | 29  | 46  | 72  | 133 | 1.0   |
| Static fixturized, native listener, dirty | 11  | 36  | 53  | 85  | 150 | 0.8   |

### CakePHP 4

Results from [here](https://github.com/pabloelcolombiano/cakephp-performance-tests/actions/runs/263747014)
run on mysql, PHP 7.4. The numbers given are in seconds.  The ratio is the run time of a scenario with N=50
divided by the "Static, native listener" scenario.

| Number of tests per class (N)             | 10  | 20  | 30  | 40  | 50  | Ratio |
| ----------------------------------------- | --- | --- | --- | --- | --- | ----- |
| Dynamic                                   | 3.1 | 8.9 | 11  | 15  | 19  | 4.8   |
| Dynamic persisted                         | 8.0 | 22  | 28  | 36  | 44  | 2.1   |
| Static                                    | 6.2 | 21  | 35  | 68  | 92  | 1.0   |
| Static, native listener                   | 5.7 | 21  | 36  | 69  | 91  | 1     |

### Fixturize plugin in depth

Results from [here](https://github.com/pabloelcolombiano/cakephp-performance-tests/actions/runs/263747014)
run on mysql, PHP 7.4. The numbers given are in seconds.

| Number of tests per class (N)             | 10  | 20  | 30  | 40  | 50  | Ratio |
| ----------------------------------------- | --- | --- | --- | --- | --- | ----- |
| Dynamic                                   | 3.1 | 8.9 | 11  | 15  | 19  | 4.8   |
| Dynamic persisted                         | 8.0 | 22  | 28  | 36  | 44  | 2.1   |
| Static                                    | 6.2 | 21  | 35  | 68  | 92  | 1.0   |
| Static, native listener                   | 5.7 | 21  | 36  | 69  | 91  | 1     |

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
