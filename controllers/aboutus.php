<?php

class AboutUs extends Controller {

	function __construct() {
		parent::__construct();
	}

	function index() {
		$this->view->title = 'About Us';
		$this->view->render('aboutus/index');	
	}

}