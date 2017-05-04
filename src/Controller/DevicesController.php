<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;

/**
 * Devices Controller
 *
 * @property \App\Model\Table\DevicesTable $Devices
 */
class DevicesController extends AppController
{

	/**
	 * Index method
	 *
	 * @return \Cake\Network\Response|null
	 */
	public function index()
	{
		$this->paginate = [
			'contain' => ['DeviceControllers']
		];
		$devices = $this->paginate($this->Devices);

		$this->set(compact('devices'));
		$this->set('_serialize', ['devices']);
	}

	/**
	 * View method
	 *
	 * @param string|null $id Device id.
	 * @return \Cake\Network\Response|null
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function view($id = null)
	{
		$device = $this->Devices->get($id, [
			'contain' => ['DeviceControllers']
		]);

		$this->set('device', $device);
		$this->set('_serialize', ['device']);
	}

	/**
	 * Add method
	 *
	 * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
	 */
	public function add()
	{
		$device = $this->Devices->newEntity();
		if ($this->request->is('post')) {
			$device = $this->Devices->patchEntity($device, $this->request->data);
			if ($this->Devices->save($device)) {
				$this->Flash->success(__('The device has been saved.'));

				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The device could not be saved. Please, try again.'));
			}
		}
        $poseidenTypeDevices = Configure::read("Poseiden.devices");

		$deviceTypes = [];

        foreach ($poseidenTypeDevices as $key => $poseidenTypeDevice) {
            $deviceTypes[$key] = $poseidenTypeDevice['name'];
        }

        $this->set(compact('deviceTypes', 'deviceTypes'));

		$deviceControllers = $this->Devices->DeviceControllers->find('list', ['limit' => 200]);
		$this->set(compact('device', 'deviceControllers'));
		$this->set('_serialize', ['device']);
	}

	/**
	 * Edit method
	 *
	 * @param string|null $id Device id.
	 * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
	 * @throws \Cake\Network\Exception\NotFoundException When record not found.
	 */
	public function edit($id = null)
	{
		$device = $this->Devices->get($id, [
			'contain' => []
		]);

		if ($this->request->is(['patch', 'post', 'put'])) {
			$device = $this->Devices->patchEntity($device, $this->request->data);
			if ($this->Devices->save($device)) {
				$this->Flash->success(__('The device has been saved.'));

				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The device could not be saved. Please, try again.'));
			}
		}

		$deviceControllers = $this->Devices->DeviceControllers->find('list', ['limit' => 200]);
		$this->set(compact('device', 'deviceControllers'));
		$this->set('_serialize', ['device']);
	}

	/**
	 * Delete method
	 *
	 * @param string|null $id Device id.
	 * @return \Cake\Network\Response|null Redirects to index.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function delete($id = null)
	{
		$this->request->allowMethod(['post', 'delete']);
		$device = $this->Devices->get($id);
		if ($this->Devices->delete($device)) {
			$this->Flash->success(__('The device has been deleted.'));
		} else {
			$this->Flash->error(__('The device could not be deleted. Please, try again.'));
		}

		return $this->redirect(['action' => 'index']);
	}
}
