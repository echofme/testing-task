<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct() {    
        parent::__construct();
        $this->load->model('db_handler');
    }

	public function index() {
		
		$data['playlist'] = $this->db_handler->getPlayList();
		$this->load->view('main', $data);
	}

	public function edit($id = null) {
		if (isset($id)) { 
			$data['video'] = $this->db_handler->getVideo($id);
		} else {
			$data['video'] = ['id' => 0,
							  'title' => '',
							  'url' => ''
							 ];
		}

		$this->load->helper('url');
		$this->load->view('edit', $data);
	}

	public function play($id) {
		$data['video'] = $this->db_handler->getVideo($id);
		$data['vid'] = $this->db_handler->checkUrl($data['video']['url']);
		$this->load->view('play', $data);
	}

	public function ajax($act) {
		switch ($act) {
			case 'save': {
				$this->db_handler->setVideo($_GET['id'], $_GET['name'], $_GET['url']);
				break;
			}
			case 'del': {
				$this->db_handler->delVideo($_GET['id']);
				break;
			}
		}
			
	} 
}
