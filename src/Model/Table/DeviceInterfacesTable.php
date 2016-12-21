<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DeviceInterfaces Model
 *
 * @property \Cake\ORM\Association\HasMany $Devices
 *
 * @method \App\Model\Entity\DeviceInterface get($primaryKey, $options = [])
 * @method \App\Model\Entity\DeviceInterface newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DeviceInterface[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DeviceInterface|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DeviceInterface patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DeviceInterface[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DeviceInterface findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DeviceInterfacesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('device_interfaces');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Devices', [
            'foreignKey' => 'device_interface_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('interface_device_type', 'create')
            ->notEmpty('interface_device_type');

        $validator
            ->requirePresence('interface_data', 'create')
            ->notEmpty('interface_data');

        return $validator;
    }
}
