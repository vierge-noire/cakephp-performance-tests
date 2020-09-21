<?php
declare(strict_types=1);

namespace App\Test\TestCase;

use App\Test\FixturesMaker;

/**
 * App\Model\Table\Table0 Test Case
 */
class StaticFixturesDirtyTest extends StaticFixturesTest
{
    /**
     * @dataProvider numberOfIteration
     */
    public function testStaticFixtures(int $iteration)
    {
        parent::testStaticFixtures($iteration);
        FixturesMaker::dirtTables();
    }
}
