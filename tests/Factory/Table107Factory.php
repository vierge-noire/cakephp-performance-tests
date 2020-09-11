<?php
declare(strict_types=1);

namespace App\Test\Factory;

use Faker\Generator;
use CakephpFixtureFactories\Factory\BaseFactory as CakephpBaseFactory;

/**
 * Table107Factory
 */
class Table107Factory extends CakephpBaseFactory
{
    /**
     * Defines the Table Registry used to generate entities with
     * @return string
     */
    protected function getRootTableRegistryName(): string
    {
        return 'Table107s';
    }

    /**
     * Defines the default values of you factory. Useful for
     * not nullable fields. You may use methods of the factory here too.
     * @return void
     */
    protected function setDefaultTemplate(): void
    {
        $this->setDefaultData(function(Generator $faker) {
            return [
                // set the model's default values
                // For example:
                // 'name' => $faker->lastName
            ];
        });
    }

}