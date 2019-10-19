<?php


namespace controller;

use base\controller;
use model\blog;
use helper\session;
use helper\input;


Class blogcontroller extends controller {

	public function __construct(){
		parent::__construct(new blog);
		// session::set("test","test");
		// echo session::get("test");

	}

	public function index(){
		$sql = "SELECT * FROM blog";
		$blogs = $this->model->getAll($sql);
		$array222 = [1,2,3,4,5,6,7,8,9];
		$params = ['blogs'=>$blogs,'array222'=>$array222];
		return $this->view->make("index",$params);
	}

	public function add(){
		return $this->view->make("add");
	}

	public function view(){
		$idno = input::get('idno');
		$blog = $this->model->getBlog($idno);
		$params = ['blog'=>$blog];
		return $this->view->make("view",$params);
	}

	public function remove($id){
		$this->model->remove($id);
		$this->view->redirect("");
	}

	public function save(){
		$title = input::post("title");
		$body = input::post("body");
		$data = array($title,$body,date("Y-m-d",time()));
		$this->model->save($data);
		$this->view->redirect("");
	}
}