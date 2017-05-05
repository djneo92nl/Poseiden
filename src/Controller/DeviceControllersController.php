<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Utility\Devices;
use Cake\Core\Configure;


/**
 * DeviceControllers Controller
 *
 * @property \App\Model\Table\DeviceControllersTable $DeviceControllers
 */
class DeviceControllersController extends AppController
{

	public function initialize ()
	{
		parent::initialize();
	}

	/**
	 * Index method
	 *
	 * @return \Cake\Network\Response|null
	 */
	public function index ()
	{
		$deviceControllers = $this->paginate($this->DeviceControllers);

		$this->set(compact('deviceControllers'));
		$this->set('_serialize', ['deviceControllers']);
	}

	/**
	 * View method
	 *
	 * @param string|null $id Device Controller id.
	 * @return \Cake\Network\Response|null
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function view ($id = null)
	{

		$deviceController = $this->DeviceControllers->get($id,
			[
				'contain' => ['Devices']
			]
		);

		$deviceControllerConfiguration = new Devices\DeviceControllerManager(
			$deviceController->device_controller_type,
				json_decode($deviceController->device_controller_data),
			$deviceController->id
		);

		$driverData = $deviceControllerConfiguration->deviceControllerConfiguration;

		$this->set('driverData', $driverData);
		$this->set('deviceController', $deviceController);
		$this->set('_serialize', ['deviceController']);
	}

	/**
	 * Add method
	 *
	 * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
	 */
	public function add ()
	{
		$deviceController = $this->DeviceControllers->newEntity();
		if ($this->request->is('post')) {
			$deviceController = $this->DeviceControllers->patchEntity($deviceController, $this->request->getData());
			if ($this->DeviceControllers->save($deviceController)) {
				$this->Flash->success(__('The device controller has been saved.'));

				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The device controller could not be saved. Please, try again.'));
			}
		}

		$poseidenInstalledDrivers = Configure::read("Poseiden.deviceConnector");
		$poseidenInstalledDrivers = array_keys($poseidenInstalledDrivers);
		$this->set(compact('InstalledDrivers', 'poseidenInstalledDrivers'));
		$this->set(compact('deviceController'));
		$this->set('_serialize', ['deviceController']);
	}

	/**
	 * Edit method
	 *
	 * @param string|null $id Device Controller id.
	 * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
	 * @throws \Cake\Network\Exception\NotFoundException When record not found.
	 */
	public function edit ($id = null)
	{
		$deviceController = $this->DeviceControllers->get($id,
			[
				'contain' => []
			]
		);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$deviceController = $this->DeviceControllers->patchEntity($deviceController, $this->request->getData());
			if ($this->DeviceControllers->save($deviceController)) {
				$this->Flash->success(__('The device controller has been saved.'));

				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error(__('The device controller could not be saved. Please, try again.'));
			}
		}

		$poseidenInstalledDrivers = Configure::read("Poseiden.deviceConnector");
		$poseidenInstalledDrivers = array_keys($poseidenInstalledDrivers);
		$this->set(compact('InstalledDrivers', 'poseidenInstalledDrivers'));
		$this->set(compact('deviceController'));
		$this->set('_serialize', ['deviceController']);
	}

	/**
	 * Delete method
	 *
	 * @param string|null $id Device Controller id.
	 * @return \Cake\Http\Response|null Redirects to index.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function delete ($id = null)
	{
		$this->request->allowMethod(['post', 'delete']);
		$deviceController = $this->DeviceControllers->get($id);
		if ($this->DeviceControllers->delete($deviceController)) {
			$this->Flash->success(__('The device controller has been deleted.'));
		} else {
			$this->Flash->error(__('The device controller could not be deleted. Please, try again.'));
		}

		return $this->redirect(['action' => 'index']);
	}
}
