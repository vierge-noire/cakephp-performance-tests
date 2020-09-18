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
        Table0Factory::make()->persist();
        Table1Factory::make()->persist();
        Table2Factory::make()->persist();
        Table3Factory::make()->persist();
        Table4Factory::make()->persist();
        Table5Factory::make()->persist();
        Table6Factory::make()->persist();
        Table7Factory::make()->persist();
        Table8Factory::make()->persist();
        Table9Factory::make()->persist();
        $this->assertSame(
            1,
            TableRegistry::getTableLocator()->get('Table0s')->find()->count()
        );
        FixturesMaker::dirtAllTables();
    }
}
