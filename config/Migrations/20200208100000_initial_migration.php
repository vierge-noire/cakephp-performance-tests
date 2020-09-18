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
use Migrations\AbstractMigration;

class InitialMigration extends AbstractMigration
{
    public function getTableName(int $i): string
    {
        return "table".$i."s";
    }
    public function up()
    {
        for ($i=0; $i<\App\Test\FixturesMaker::NUMBER_OF_TABLES; $i++) {
            $this->table($this->getTableName($i))
                ->addPrimaryKey(['id'])
                ->addColumn('name', 'string', [
                    'limit' => 128,
                    'null' => false,
                    'default' => "Default name for table $i",
                ])
                ->addColumn('parent_id', 'integer', [
                    'default' => null,
                    'limit' => 11,
                    'null' => true,
                ])
                ->addTimestamps('created', 'modified')
                ->create();
        }
    }

    public function down()
    {
        for ($i=0; $i<\App\Test\FixturesMaker::NUMBER_OF_TABLES; $i++) {
            $this->table($this->getTableName())->drop();
        }
    }
}
