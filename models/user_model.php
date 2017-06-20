<?php

class User_Model extends Model {

	public function __construct() {
		parent::__construct();
	}

	public function userList()
	{
		return $this->db->selectAll('SELECT userid, login, role FROM user');

		/*$sth = $this->db->prepare('SELECT userid, login, role FROM user');
		$sth->execute();
		return $sth->fetchAll();*/
	}

	public function userSingleList($userid)
	{
		return $this->db->selectOne('SELECT userid, login, role FROM user WHERE userid = :userid', array(':userid' => $userid));

		/*$sth = $this->db->prepare('SELECT userid, login, role FROM user WHERE userid = :userid');
		$sth->execute(array(':userid' => $userid));
		$sth->fetch();*/
	}

	public function create($data)
	{
		$this->db->insert('user', array(
			'login' => $data['login'],
			'password' => Hash::create('sha256', $data['password'], HASH_PASSWORD_KEY),
			'role' => $data['role']
		));
	}

	public function editSave($data)
	{
		$postData = array(
			'login' => $data['login'],
			'password' => Hash::create('sha256', $data['password'], HASH_PASSWORD_KEY),
			'role' => $data['role']
		);
		
		$this->db->update('user', $postData, "`userid` = {$data['userid']}");
	}
	
	public function delete($userid)
	{
		$sth = $this->db->prepare('SELECT role FROM user WHERE userid = :userid');
		$sth->execute(array(':userid' => $userid));
		$data = $sth->fetch();
		if ($data['role'] == 'owner')
		{
			return false;
		}


		$this->db->delete('user', "userid = $userid");

		/*$sth = $this->db->prepare('DELETE FROM user WHERE userid = :userid');
		$sth->execute(array(
			':userid' => $userid
		));*/
	}
}