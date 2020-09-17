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
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\Table0 Test Case
 */
class DynamicFixturesPersistedTest extends TestCase
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
        $entities = Table0Factory::make(FixturesMaker::NUMBER_OF_TABLES_PER_TEST)->persist();
        $entities = Table1Factory::make(FixturesMaker::NUMBER_OF_TABLES_PER_TEST)->persist();
        $entities = Table2Factory::make(FixturesMaker::NUMBER_OF_TABLES_PER_TEST)->persist();
        $entities = Table3Factory::make(FixturesMaker::NUMBER_OF_TABLES_PER_TEST)->persist();
        $entities = Table4Factory::make(FixturesMaker::NUMBER_OF_TABLES_PER_TEST)->persist();
        $entities = Table5Factory::make(FixturesMaker::NUMBER_OF_TABLES_PER_TEST)->persist();
        $entities = Table6Factory::make(FixturesMaker::NUMBER_OF_TABLES_PER_TEST)->persist();
        $entities = Table7Factory::make(FixturesMaker::NUMBER_OF_TABLES_PER_TEST)->persist();
        $entities = Table8Factory::make(FixturesMaker::NUMBER_OF_TABLES_PER_TEST)->persist();
        $entities = Table9Factory::make(FixturesMaker::NUMBER_OF_TABLES_PER_TEST)->persist();
        $this->assertSame(
            FixturesMaker::NUMBER_OF_TABLES_PER_TEST,
            TableRegistry::getTableLocator()->get('Table0s')->find()->count()
        );
        FixturesMaker::dirtAllTables();
    }
}
