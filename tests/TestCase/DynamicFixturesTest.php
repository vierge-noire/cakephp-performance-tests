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
        for ($i=0; $i<FixturesMaker::NUMBER_OF_TABLES_PER_TEST; $i++) {
            $entity = Table0Factory::make()->getEntity();
        }
        $this->assertInstanceOf(Entity::class, $entity);
    }
}
