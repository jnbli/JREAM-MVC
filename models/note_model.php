<?php

class Note_Model extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function noteList()
	{
		return $this->db->selectAll('SELECT * FROM note WHERE userid = :userid', 
				array('userid' => $_SESSION['userid']));
	}
	
	public function noteSingleList($noteid)
	{
		return $this->db->selectOne('SELECT * FROM note WHERE userid = :userid AND noteid = :noteid', 
			array('userid' => $_SESSION['userid'], 'noteid' => $noteid));
	}
	
	public function create($data)
	{
		$this->db->insert('note', array(
			'title' => $data['title'],
			'userid' => $_SESSION['userid'],
			'content' => $data['content'],
			'date_added' => date('Y-m-d H:i:s') // use GMT aka UTC 0:00
		));
	}
	
	public function editSave($data)
	{
		$this->db->update('note', $data, 
				"`noteid` = '{$data['noteid']}' AND userid = '{$_SESSION['userid']}'");
	}
	
	public function delete($id)
	{
		$this->db->delete('note', "`noteid` = {$id} AND userid = '{$_SESSION['userid']}'");
	}
}