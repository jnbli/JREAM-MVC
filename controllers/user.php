<?php

class User extends Controller {

	public function __construct() {
		parent::__construct();
		Auth::handleLogin();

	}
	
	public function index() 
	{	
		$this->view->title = 'User';
		$this->view->userList = $this->model->userList();
		$this->view->render('user/index');
	}
	
	public function create()
	{
		$data = array();
		$data['login'] = $_POST['login'];
		$data['password'] = $_POST['password'];
		$data['role'] = $_POST['role'];

		$this->model->create($data);
		header('location: ' . URL . 'user');
	}

	public function edit($userid) 
	{
		$this->view->title = 'User: Edit';
		$this->view->user = $this->model->userSingleList($userid);
		$this->view->render('user/edit');
	}

	public function editSave($userid)
	{
		$data = array();
		$data['userid'] = $userid;
		$data['login'] = $_POST['login'];
		$data['password'] = $_POST['password'];
		$data['role'] = $_POST['role'];
		
		// @TODO: Do your error checking!
		
		$this->model->editSave($data);
		header('location: ' . URL . 'user');
	}

	public function delete($userid)
	{
		$this->model->delete($userid);
		header('location: ' . URL . 'user');
	}
}