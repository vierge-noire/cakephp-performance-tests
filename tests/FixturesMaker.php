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


use Cake\ORM\TableRegistry;
use phpDocumentor\Reflection\Types\Self_;

class FixturesMaker
{
    const NUMBER_OF_TABLES = 10;
    const NUMBER_OF_TABLES_PER_TEST = 10;

    public static function numberOfTestsIterator()
    {
        $numberOfTests = getenv('NUMBER_OF_TESTS_PER_CLASS');
        $result = [];
        for ($i=0; $i<$numberOfTests; $i++) {
            $result[] = [$i];
        }
        return $result;
    }

    public static function makeRecords()
    {
        $numberOfRecordsPerFixtures = getenv('NUMBER_OF_RECORDS_PER_FIXTURE');
        $result = [];
        for ($i=0; $i<$numberOfRecordsPerFixtures; $i++) {
            $result[$i] = [
                'name' => 'Lorem ipsum dolor sit amet',
                'created' => 1599835366,
                'modified' => 1599835366,
            ];
        }
        return $result;
    }

    public static function dirtAllTables()
    {
        for ($i=0; $i<self::NUMBER_OF_TABLES; $i++) {
            $Table        = TableRegistry::getTableLocator()->get("Table$i" . "s");
            $entity       = $Table->get(1);
            $entity->name = $entity->name . '_mofified';
            $Table->saveOrFail($entity);
        }
    }
}