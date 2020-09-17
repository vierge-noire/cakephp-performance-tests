<?php
declare(strict_types=1);

namespace App\Test\TestCase;

use App\Test\Factory\Table0Factory;
use App\Test\FixtureFixturized\Table0sFixture;
use App\Test\FixtureFixturized\Table1sFixture;
use App\Test\FixtureFixturized\Table2sFixture;
use App\Test\FixtureFixturized\Table3sFixture;
use App\Test\FixtureFixturized\Table4sFixture;
use App\Test\FixtureFixturized\Table5sFixture;
use App\Test\FixtureFixturized\Table6sFixture;
use App\Test\FixtureFixturized\Table7sFixture;
use App\Test\FixtureFixturized\Table8sFixture;
use App\Test\FixtureFixturized\Table9sFixture;
use App\Test\FixturesMaker;
use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use CakephpFixtureFactories\TestSuite\SkipTablesTruncation;

/**
 * App\Model\Table\Table0 Test Case
 */
class StaticFixturesFixturizedTest extends TestCase
{
    use SkipTablesTruncation;

    public $fixtures = [
        Table0sFixture::class,
        Table1sFixture::class,
        Table2sFixture::class,
        Table3sFixture::class,
        Table4sFixture::class,
        Table5sFixture::class,
        Table6sFixture::class,
        Table7sFixture::class,
        Table8sFixture::class,
        Table9sFixture::class,
    ];

    public function numberOfIteration()
    {
        return FixturesMaker::numberOfTestsIterator();
    }

    /**
     * @dataProvider numberOfIteration
     */
    public function testStaticFixturizedFixtures(int $iteration)
    {
        $this->assertSame(
            (int) getenv('NUMBER_OF_RECORDS_PER_FIXTURE'),
            TableRegistry::getTableLocator()->get('Table0s')->find()->count()
        );
        FixturesMaker::dirtAllTables();
    }
}
