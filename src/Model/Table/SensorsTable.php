<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sensors Model
 *
 * @method \App\Model\Entity\Sensor get($primaryKey, $options = [])
 * @method \App\Model\Entity\Sensor newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Sensor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Sensor|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sensor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Sensor[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Sensor findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SensorsTable extends Table
{

	/**
	 * Initialize method
	 *
	 * @param array $config The configuration for the Table.
	 * @return void
	 */
	public function initialize (array $config)
	{
		parent::initialize($config);

		$this->table('sensors');
		$this->displayField('name');
		$this->primaryKey('id');

		$this->addBehavior('Timestamp');
	}

	/**
	 * Default validation rules.
	 *
	 * @param \Cake\Validation\Validator $validator Validator instance.
	 * @return \Cake\Validation\Validator
	 */
	public function validationDefault (Validator $validator)
	{
		$validator
			->integer('id')
			->allowEmpty('id', 'create');

		$validator
			->requirePresence('name', 'create')
			->notEmpty('name');

		$validator
			->requirePresence('description', 'create')
			->notEmpty('description');

		$validator
			->requirePresence('type', 'create')
			->notEmpty('type');

		return $validator;
	}
}
