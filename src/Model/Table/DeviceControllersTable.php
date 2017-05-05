<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DeviceControllers Model
 *
 * @property \Cake\ORM\Association\HasMany $Devices
 *
 * @method \App\Model\Entity\DeviceController get($primaryKey, $options = [])
 * @method \App\Model\Entity\DeviceController newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DeviceController[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DeviceController|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DeviceController patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DeviceController[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DeviceController findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DeviceControllersTable extends Table
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

		$this->table('device_controllers');
		$this->displayField('name');
		$this->primaryKey('id');

		$this->addBehavior('Timestamp');

		$this->hasMany('Devices', [
			'foreignKey' => 'device_controller_id'
		]);
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
			->requirePresence('device_controller_type', 'create')
			->notEmpty('device_controller_type');

		$validator
			->requirePresence('device_controller_data', 'create')
			->notEmpty('device_controller_data');

		return $validator;
	}
}
