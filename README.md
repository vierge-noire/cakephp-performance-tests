# CakePHP Performance Tests

The package propose statistics on the duration of tests with various methods.

## Test methods

### CakePHP static fixtures

### CakePHP fixture factories

### Friends of Cake fixturize

https://github.com/FriendsOfCake/fixturize 


## Test set
- 10 Tables, all used in each test
- one test class per table
- N tests per test class

Optional: dirty
- all tables get modified during the test

## Test results

| Number of tests per class                 | 10  | 20  | 30  | 40  | 50  |
| ----------------------------------------- | --- | --- | --- | --- | --- |
| Dynamic                                   | 3.6 | 7.2 | 11  | 16  | 19  |
| Dynamic persisted                         | 8.6 | 19  | 26  | 39  | 41  |
| Dynamic persisted dirty                   | 11  | 22  | 33  | 50  | 54  |
| Static                                    | 9.6 | 28  | 44  | 85  | 117 |
| Static dirty                              | 9.0 | 28  | 45  | 87  | 116 |   
| Static, native listener                   | 9.0 | 28  | 44  | 86  | 120 |
| Static, native listener, dirty            | 9.0 | 28  | 44  | 86  | 120 |  
| Static fixturized                         | 0.7 | 1.2 | 2.7 | 3.5 | 4.6 | 
| Static fixturized, native listener        | 0.9 | 1.7 | 3.5 | 4.7 | 6.3 | 
| Static fixturized, dirty                  | 8.1 | 27  | 48  | 86  | 124 | 
| Static fixturized, native listener, dirty | 11  | 35  | 57  | 101 | 138 | 

## License

The CakePHPFixtureFactories plugin is offered under an [MIT license](https://opensource.org/licenses/mit-license.php).

Copyright 2020 Nicolas Masson and Juan Pablo Ramirez

Licensed under The MIT License Redistributions of files must retain the above copyright notice.

## Authors
* Nicolas Masson
* Juan Pablo Ramirez 
