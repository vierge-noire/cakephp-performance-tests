<?php
declare(strict_types=1);

namespace App\Test\TestCase;

use App\Test\Factory\Table0Factory;
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
        $factory = Table0Factory::make();
        for ($i=1;$i<FixturesMaker::NUMBER_OF_TABLES;$i++) {
            $factory->with('Table'.$i.'s');
        }
        $factory->persist();

        $this->assertSame(
            1,
            TableRegistry::getTableLocator()->get('Table9s')->find()->count()
        );
    }
}
