<?php
declare(strict_types=1);

namespace App\Test\TestCase;

use App\Test\FixturesMaker;
use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\Table0 Test Case
 */
class StaticFixturesTest extends TestCase
{
    public function getFixtures(): array
    {
        for ($i=0; $i<FixturesMaker::NUMBER_OF_TABLES_PER_TEST; $i++) {
            $this->addFixture("app.Table$i"."s");
        }

        return parent::getFixtures();
    }


    public function numberOfIteration()
    {
        return FixturesMaker::numberOfTestsIterator();
    }

    /**
     * @dataProvider numberOfIteration
     */
    public function testStaticFixtures(int $iteration)
    {
        $entity = TableRegistry::getTableLocator()->get("Table0s")->get($iteration+1);
        $this->assertInstanceOf(Entity::class, $entity);
    }
}
