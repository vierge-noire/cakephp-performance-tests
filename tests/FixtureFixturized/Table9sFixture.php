<?php
declare(strict_types=1);

namespace App\Test\FixtureFixturized;

use App\Test\FixturesMaker;
use FriendsOfCake\Fixturize\TestSuite\Fixture\ChecksumTestFixture as TestFixture;

/**
 * Table9sFixture
 */
class Table9sFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'autoIncrement' => true, 'precision' => null, 'comment' => null],
        'name' => ['type' => 'string', 'length' => 128, 'null' => false, 'default' => 'Default name for table 9', 'precision' => null, 'comment' => null, 'collate' => null],
        'created' => ['type' => 'timestamp', 'length' => null, 'null' => false, 'default' => 'CURRENT_TIMESTAMP', 'precision' => null, 'comment' => null],
        'modified' => ['type' => 'timestamp', 'length' => null, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
    ];
    // phpcs:enable
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = FixturesMaker::makeRecords();
        parent::init();
    }
}
