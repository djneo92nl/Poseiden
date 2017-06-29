<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\DeviceController;
use Cake\Core\Configure;
use App\Utility\Devices;


/**
 * Devices Controller
 *
 * @property \App\Model\Table\DevicesTable $Devices
 */
class DevicesController extends AppController
{
	/**
	 *
	 */
	public function initialize()
	{
		parent::initialize();
		$this->loadComponent('RequestHandler');
	}

	/**
	 * Index method
	 *
	 * @return \Cake\Network\Response|null
	 */
	public function index ()
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
	public function view ($id = null)
	{
		$device = $this->Devices->get($id, [
			'contain' => ['DeviceControllers']
		]);

		$data = json_decode($device->device_template);

		$deviceManager = new Devices\DeviceManager(
			$device->id ,
			$data,
			$device['device_controller']
		);

		$allowedDeviceActions = $deviceManager->getDeviceActions($data->DeviceConfig->type);


		$this->set('device', $device);
		$this->set('allowedDeviceActions', $allowedDeviceActions);
		$this->set('_serialize', ['device']);
	}

	/**
	 * Add method
	 *
	 * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
	 */
	public function add ()
	{
		//dd(json_encode(['DeviceConfig' =>  Devices\DeviceManager::getDeviceConfiguration('H801RGBBeta'), 'data' => ['topic' => 'device/003/command']]));
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

		$poseidenTypeDevices = Configure::read("Poseiden.deviceTypes");
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
	 * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
	 * @throws \Cake\Network\Exception\NotFoundException When record not found.
	 */
	public function edit ($id = null)
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
	 * @return \Cake\Http\Response|null Redirects to index.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function delete ($id = null)
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

	public function setDeviceState($id = null)
	{
		//$this->request->allowMethod(['patch', 'post', 'put']);

		$this->response->statusCode(400);
		$this->response->body(json_encode(
			array('status' => 'ERROR', 'message' => 'Bad Request')));
		$this->RequestHandler->renderAs($this, 'json');
		$this->set('errors', 'nww');
		$this->set('_jsonOptions', JSON_FORCE_OBJECT);
		$this->set('_serialize', ['errors']);

	}

	public function getDeviceState($id = null)
	{
		$device = $this->Devices->get($id, [
			'contain' => ['DeviceControllers']
		]);

		$deviceManager = new Devices\DeviceManager(
			$device->id ,json_decode($device->device_template),
			$device['device_controller']
		);

		$data = $deviceManager->runDeviceCommand('getState');

		$this->RequestHandler->renderAs($this, 'json');
		$this->set('data', $data);
		$this->set('_jsonOptions', JSON_FORCE_OBJECT);
		$this->set('_serialize', ['data']);
	}

	public function runDeviceCommand($id = null, $command = null, $data = null)
	{
		$device = $this->Devices->get($id, [
			'contain' => ['DeviceControllers']
		]);

		$deviceData = json_decode($device->device_template);

		$deviceManager = new Devices\DeviceManager(
			$device->id ,
			$deviceData,
			$device['device_controller']
		);

		$allowedDeviceActions = $deviceManager->getDeviceActions($deviceData->DeviceConfig->type);

		if (in_array($command, $allowedDeviceActions)){
			$commandReturn = $deviceManager->runDeviceCommand($command, $data);
			$this->set('data', $commandReturn);
		} else {
			throw new \Cake\Network\Exception\ForbiddenException(__('Command not allowed'));

		}


		$this->RequestHandler->renderAs($this, 'json');
		$this->set('_jsonOptions', JSON_FORCE_OBJECT);
		$this->set('_serialize', ['data']);
	}
}
