<?php
declare(strict_types=1);

namespace App\Test\TestCase;

use App\Test\FixturesMaker;

/**
 * App\Model\Table\Table0 Test Case
 */
class StaticFixturesFixturizedDirtyTest extends StaticFixturesFixturizedTest
{
    /**
     * @dataProvider numberOfIteration
     */
    public function testStaticFixturizedFixtures(int $iteration)
    {
        parent::testStaticFixturizedFixtures($iteration);
        FixturesMaker::dirtAllTables();
    }
}
