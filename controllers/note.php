<?php

class Note extends Controller {

	public function __construct() {
		parent::__construct();
		Auth::handleLogin();
	}
	
	public function index() 
	{	
		$this->view->noteList = $this->model->noteList();
		$this->view->render('note/index');
	}
	
	public function create() 
	{
		$data = array(
			'title' => $_POST['title'],
			'content' => $_POST['content']
		);
		$this->model->create($data);
		header('location: ' . URL . 'note');
	}
	
	public function edit($id) 
	{
		$this->view->note = $this->model->noteSingleList($id);
	
		if (empty($this->view->note)) {
			die('This is an invalid note!');
		}
		
		$this->view->render('note/edit');
	}
	
	public function editSave($noteid)
	{
		$data = array(
			'noteid' => $noteid,
			'title' => $_POST['title'],
			'content' => $_POST['content']
		);
		
		// @TODO: Do your error checking!
		
		$this->model->editSave($data);
		header('location: ' . URL . 'note');
	}
	
	public function delete($id)
	{
		$this->model->delete($id);
		header('location: ' . URL . 'note');
	}
}