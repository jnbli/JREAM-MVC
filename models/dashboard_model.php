<?php

class Dashboard_Model extends Model {

	public function __construct() {
		parent::__construct();
	}
	
	public function xhrInsert() 
	{
		$text = $_POST['text'];
		
		$this->db->insert('data', array('text' => $text));
		
		$data = array('text' => $text, 'id' => $this->db->lastInsertId());
		echo json_encode($data);
	}
	
	public function xhrGetListings()
	{
		$result = $this->db->selectAll("SELECT * FROM data");
		echo json_encode($result);
	}
	
	public function xhrDeleteListing()
	{
		$id = (int) $_POST['id'];
		$this->db->delete('data', "id = '$id'");
	}
}