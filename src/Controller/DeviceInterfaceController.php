<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DeviceInterface Controller
 *
 * @property \App\Model\Table\DeviceInterfaceTable $DeviceInterfaces
 */
class DeviceInterfaceController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
	    $DeviceInterfaces = $this->paginate($this->DeviceInterfaces);

        $this->set(compact('deviceInterfaces'));
        $this->set('_serialize', ['deviceInterfaces']);
    }

    /**
     * View method
     *
     * @param string|null $id Device Interface id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $deviceInterface= $this->DeviceInterface->get($id, [
            'contain' => ['Devices']
        ]);

        $this->set('deviceInterface', $deviceInterface);
        $this->set('_serialize', ['deviceInterfaces']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $deviceInterface = $this->DeviceInterfaces->newEntity();
        if ($this->request->is('post')) {
            $deviceInterface = $this->DeviceInterfaces->patchEntity($deviceInterface, $this->request->data);
            if ($this->DeviceInterfaces->save($deviceInterface)) {
                $this->Flash->success(__('The device Interface has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The device Interface could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('deviceInterface'));
        $this->set('_serialize', ['deviceInterface']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Device Interface id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $deviceInterface = $this->DeviceInterfaces->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $deviceInterface = $this->DeviceInterfaces->patchEntity($deviceInterface, $this->request->data);
            if ($this->DeviceInterfaces->save($deviceInterface)) {
                $this->Flash->success(__('The device Interface has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The device Interface could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('deviceInterface'));
        $this->set('_serialize', ['deviceInterface']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Device Interface id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $deviceInterface = $this->DeviceInterfaces->get($id);
        if ($this->DeviceInterfaces->delete($deviceInterface)) {
            $this->Flash->success(__('The device Interface has been deleted.'));
        } else {
            $this->Flash->error(__('The device Interface could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
