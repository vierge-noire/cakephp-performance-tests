<?php
declare(strict_types=1);

namespace App\Test\TestCase;

use App\Test\Factory\Table0Factory;
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
        $this->assertInstanceOf(Entity::class, $entities[0]);
    }
}
