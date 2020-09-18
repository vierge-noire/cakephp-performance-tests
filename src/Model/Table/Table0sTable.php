<?php
declare(strict_types=1);

namespace App\Model\Table;

use App\Test\FixturesMaker;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Table0s Model
 *
 * @method \App\Model\Entity\Table0 newEmptyEntity()
 * @method \App\Model\Entity\Table0 newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Table0[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Table0 get($primaryKey, $options = [])
 * @method \App\Model\Entity\Table0 findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Table0 patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Table0[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Table0|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Table0 saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Table0[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Table0[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Table0[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Table0[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class Table0sTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('table0s');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');


        for ($i=1;$i<FixturesMaker::NUMBER_OF_TABLES;$i++) {
            $this->hasOne('Table'.$i.'s')
                ->setForeignKey('parent_id');
        }
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 128)
            ->notEmptyString('name');

        return $validator;
    }
}
