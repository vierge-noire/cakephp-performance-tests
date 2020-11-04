<?php
declare(strict_types=1);

namespace App\Test\TestCase;

use App\Test\Factory\Table0Factory;
use App\Test\Factory\Table1Factory;
use App\Test\Factory\Table2Factory;
use App\Test\Factory\Table3Factory;
use App\Test\Factory\Table4Factory;
use App\Test\Factory\Table5Factory;
use App\Test\Factory\Table6Factory;
use App\Test\Factory\Table7Factory;
use App\Test\Factory\Table8Factory;
use App\Test\Factory\Table9Factory;
use App\Test\FixturesMaker;
use Cake\Database\Connection;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\Table0 Test Case
 */
class DynamicFixturesPersistedMassiveTest extends TestCase
{

    public function numberOfIteration()
    {
        return FixturesMaker::numberOfTestsIterator();
    }

    /**
     * @dataProvider numberOfIteration
     */
    public function testDynamicFixtures(int $iteration)
    {
        $numberOfRecordsPerFixture = (int) getenv('NUMBER_OF_RECORDS_PER_FIXTURE');

        $factory = Table0Factory::make();
        for ($i=1;$i<FixturesMaker::NUMBER_OF_TABLES;$i++) {
            $factory->with('Table'.$i.'s', $numberOfRecordsPerFixture);
        }
        $factory->persist();

        $this->assertSame(
            $numberOfRecordsPerFixture,
            TableRegistry::getTableLocator()->get('Table9s')->find()->count()
        );
    }
}
