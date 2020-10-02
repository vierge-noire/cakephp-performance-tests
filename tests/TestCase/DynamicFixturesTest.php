<?php
declare(strict_types=1);

namespace App\Test\TestCase;

use App\Test\Factory\Table0Factory;
use App\Test\FixturesMaker;
use Cake\ORM\Entity;
use Cake\TestSuite\TestCase;
use CakephpFixtureFactories\TestSuite\SkipTablesTruncation;

/**
 * App\Model\Table\Table0 Test Case
 */
class DynamicFixturesTest extends TestCase
{
    use SkipTablesTruncation;

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
        $entity = $factory->getEntity();
        $this->assertInstanceOf(Entity::class, $entity);
    }
}
