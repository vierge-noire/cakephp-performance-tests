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
use Cake\ORM\Entity;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\Table0 Test Case
 */
class DynamicFixturesTest extends TestCase
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
        Table0Factory::make()->getEntity();
        Table1Factory::make()->getEntity();
        Table2Factory::make()->getEntity();
        Table3Factory::make()->getEntity();
        Table4Factory::make()->getEntity();
        Table5Factory::make()->getEntity();
        Table6Factory::make()->getEntity();
        Table7Factory::make()->getEntity();
        Table8Factory::make()->getEntity();
        $entity = Table9Factory::make()->getEntity();
        $this->assertInstanceOf(Entity::class, $entity);
    }
}
