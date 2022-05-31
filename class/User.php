<?php
require_once('../connexion/Database.php');
require_once('../interface/iUser.php');
class User extends Database implements iUser {

	public function user_login($username, $password)
	{
		$sql = "SELECT *
				FROM utilisateur 
				WHERE username = ?
				AND mot_de_passe = ?
		";
		return $this->getRow($sql, [$username, $password]);
	}//end login_user

public function get_user($user_id)
	{
		$sql = "SELECT *
				FROM utilisateur
				WHERE matricule = ?";
		return $this->getRow($sql, [$user_id]);
	}//end get_user

	public function add_user($user_id, $username, $password)
	{
		$sql = "INSERT INTO utilisateur(matricule, username, mot_de_passe)
				VALUES(?, ?, ?)";
		return $this->insertRow($sql, [$user_id, $username, $password]);
	}//end add_user

	public function edit_user($user_id, $username, $password)
	{
		$sql = "UPDATE utilisateur 
				SET matricule = ?, username = ?, mot_de_passe = ?
				WHERE matricule = ?";
		return $this->updateRow($sql, [$user_id, $username, $password]);
	}//end edit_user
}//en class User

$user = new User();

/* End of file User.php */
/* Location: .//D/xampp/htdocs/regis/class/User.php */

