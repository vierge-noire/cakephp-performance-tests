<?php
declare(strict_types=1);

namespace App\Test\TestCase;


use App\Test\Fixture\Table0sFixture;
use App\Test\FixturesMaker;
use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\Table0 Test Case
 */
class UniqueStaticFixturesTest extends TestCase
{

    protected $fixtures = [
      Table0sFixture::class
    ];

    public function testUniqueStaticFixtures()
    {
        $entity = TableRegistry::getTableLocator()->get("Table0s")->get(1);
        $this->assertInstanceOf(Entity::class, $entity);
        FixturesMaker::dirtTables();
    }
}
