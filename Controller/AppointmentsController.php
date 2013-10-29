<?php
App::uses('AppController', 'Controller');
/**
 * Appointments Controller
 *
 * @property Appointment $Appointment
 * @property PaginatorComponent $Paginator
 */
class AppointmentsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'RequestHandler');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Appointment->recursive = 0;
		$this->set('appointments', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Appointment->exists($id)) {
			throw new NotFoundException(__('Invalid appointment'));
		}
		$options = array('conditions' => array('Appointment.' . $this->Appointment->primaryKey => $id));
		$this->set('appointment', $this->Appointment->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Appointment->create();
			if ($this->Appointment->save($this->request->data)) {
				if($this->request->isAjax()){
					$json_result = array("data" => array("message" => "Agendamento Marcado com Sucesso!"));
                    $this->message_json($json_result);
				}else{
					$this->Session->setFlash(__('The appointment has been saved'), 'flash/success');
					$this->redirect(array('action' => 'index'));
				}
			} else {
				if($this->request->isAjax()){
					$json_result = array("data" => array("message" => "Erro Agendamento"));
                    $this->message_json($json_result);
				}else{
					$this->Session->setFlash(__('The appointment could not be saved. Please, try again.'), 'flash/error');
				}
			}
		}
		$agendas = $this->Appointment->Agenda->find('list');
		$this->set(compact('agendas'));
	}

    public function load() {
        $options = array('conditions' => array('Appointment.date' => $this->request->query['date']));
        $this->message_json($this->Appointment->find('all', $options));
    }

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->Appointment->id = $id;
		if (!$this->Appointment->exists($id)) {
			throw new NotFoundException(__('Invalid appointment'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Appointment->save($this->request->data)) {
				$this->Session->setFlash(__('The appointment has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The appointment could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Appointment.' . $this->Appointment->primaryKey => $id));
			$this->request->data = $this->Appointment->find('first', $options);
		}
		$agendas = $this->Appointment->Agenda->find('list');
		$this->set(compact('agendas'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Appointment->id = $id;
		if (!$this->Appointment->exists()) {
			throw new NotFoundException(__('Invalid appointment'));
		}
		if ($this->Appointment->delete()) {
            if($this->request->isAjax()){
                $json_result = array("data" => array("message" => "Agendamento Removido Sucesso!"));
                $this->message_json($json_result);
            }else{
                $this->Session->setFlash(__('Appointment deleted'), 'flash/success');
                $this->redirect(array('action' => 'index'));
            }
		}
        if($this->request->isAjax()){
            $json_result = array("data" => array("message" => "Agendamento Não Foi Removido Sucesso!"));
            $this->message_json($json_result);
        }else{
            $this->Session->setFlash(__('Appointment was not deleted'), 'flash/error');
            $this->redirect(array('action' => 'index'));
        }

	}}
