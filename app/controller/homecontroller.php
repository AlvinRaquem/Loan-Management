<?php


namespace controller;

use base\controller;
use model\home;
use helper\session;
use helper\input;

class homecontroller extends controller {

		public function __construct(){
			parent::__construct(new home);
		}

		public function index(){

			$this->view->make('cpanel');
		}

		public function getpreviousdata(){

			$data = $this->model->getpreviousdata();

			echo json_encode($data);
		}


	

		public function __destruct(){

		}

}