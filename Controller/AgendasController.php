<?php
App::uses('AppController', 'Controller');
/**
 * Agendas Controller
 *
 * @property Agenda $Agenda
 * @property PaginatorComponent $Paginator
 */
class AgendasController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	protected $hours = array("00", "01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", 
			"15", "16", "17", "18", "19", "20", "21", "22", "23");
	protected $minutes = array("00", "15", "30", "45");

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Agenda->recursive = 0;
		$this->set('agendas', $this->paginate());
	}

/**
 * index method
 *
 * @return void
 */
	public function day() {
		$this->layout = "agenda";
		$this->set('lines', 96);
		$this->set('hours', $this->hours);
		$this->set('minutes', $this->minutes);
	}


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Agenda->exists($id)) {
			throw new NotFoundException(__('Invalid agenda'));
		}
		$options = array('conditions' => array('Agenda.' . $this->Agenda->primaryKey => $id));
		$this->set('agenda', $this->Agenda->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Agenda->create();
			if ($this->Agenda->save($this->request->data)) {
				$this->Session->setFlash(__('The agenda has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The agenda could not be saved. Please, try again.'), 'flash/error');
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->Agenda->id = $id;
		if (!$this->Agenda->exists($id)) {
			throw new NotFoundException(__('Invalid agenda'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Agenda->save($this->request->data)) {
				$this->Session->setFlash(__('The agenda has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The agenda could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Agenda.' . $this->Agenda->primaryKey => $id));
			$this->request->data = $this->Agenda->find('first', $options);
		}
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
		$this->Agenda->id = $id;
		if (!$this->Agenda->exists()) {
			throw new NotFoundException(__('Invalid agenda'));
		}
		if ($this->Agenda->delete()) {
			$this->Session->setFlash(__('Agenda deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Agenda was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}}
