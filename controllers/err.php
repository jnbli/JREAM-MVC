<?php

class Err extends Controller {

	function __construct() {
		parent::__construct();
	}
	
	function index() {
		$this->view->title = '404 Error';
		$this->view->render('err/inc/header', true);
		$this->view->msg = 'This page doesnt exist';
		$this->view->render('err/index', true);
		$this->view->render('err/inc/footer', true);
	}

}