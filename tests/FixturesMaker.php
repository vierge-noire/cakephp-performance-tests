<?php
declare(strict_types=1);

/**
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) 2020 Juan Pablo Ramirez and Nicolas Masson
 * @link          https://webrider.de/
 * @since         1.0.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Test;


class FixturesMaker
{
    const NUMBER_OF_TABLES = 100;
    const NUMBER_OF_TABLES_PER_TEST = 10;
    const NUMBER_OF_TESTS = 30;

    public static function numberOfTestsIterator()
    {
        $result = [];
        for ($i=0; $i<self::NUMBER_OF_TESTS; $i++) {
            $result[] = [$i];
        }
        return $result;
    }
}