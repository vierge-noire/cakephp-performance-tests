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
        $entities = Table0Factory::make(FixturesMaker::NUMBER_OF_TABLES_PER_TEST)->getEntities();
        $entities = Table1Factory::make(FixturesMaker::NUMBER_OF_TABLES_PER_TEST)->getEntities();
        $entities = Table2Factory::make(FixturesMaker::NUMBER_OF_TABLES_PER_TEST)->getEntities();
        $entities = Table3Factory::make(FixturesMaker::NUMBER_OF_TABLES_PER_TEST)->getEntities();
        $entities = Table4Factory::make(FixturesMaker::NUMBER_OF_TABLES_PER_TEST)->getEntities();
        $entities = Table5Factory::make(FixturesMaker::NUMBER_OF_TABLES_PER_TEST)->getEntities();
        $entities = Table6Factory::make(FixturesMaker::NUMBER_OF_TABLES_PER_TEST)->getEntities();
        $entities = Table7Factory::make(FixturesMaker::NUMBER_OF_TABLES_PER_TEST)->getEntities();
        $entities = Table8Factory::make(FixturesMaker::NUMBER_OF_TABLES_PER_TEST)->getEntities();
        $entities = Table9Factory::make(FixturesMaker::NUMBER_OF_TABLES_PER_TEST)->getEntities();
        $this->assertSame(FixturesMaker::NUMBER_OF_TABLES_PER_TEST, count($entities));
        $this->assertInstanceOf(Entity::class, $entities[0]);
    }
}
