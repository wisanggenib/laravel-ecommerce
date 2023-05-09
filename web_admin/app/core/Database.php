<?php 

class Database{

	private $host 		= DB_HOST;
	private $user 		= DB_USER;
	private $pass 		= DB_PASS;
	private $db_name 	= DB_NAME;

	private $dbh;

	public function __construct(){
		$this->dbh = new mysqli($this->host,$this->user,$this->pass,$this->db_name);
	}

	public function query($stmt){
		$result = $this->dbh->query($stmt);
		return $result;
	}

	public function begin_transaction(){
		$result = $this->dbh->begin_transaction();
		return $result;
	}

	public function commit(){
		$result = $this->dbh->commit();
		return $result;
	}

	public function rollback(){
		$result = $this->dbh->rollback();
		return $result;
	}

	public function get_all_data($stmt){
		$result = $this->dbh->query($stmt)->fetch_all(MYSQLI_ASSOC);
		return $result;
	}

	public function get_data($stmt){
		$result = $this->dbh->query($stmt)->fetch_assoc();
		return $result;
	}

	public function get_uuid(){
		$result = $this->dbh->query("SELECT UUID() as id")->fetch_assoc()['id'];
		return $result;
	}

	public function get_first_or_fail($stmt){
		$result = $this->dbh->query($stmt)->fetch_assoc();
		if (empty($result)) {
	        require_once 'app/pages/404.php';
			exit(); die();
		}else{
			return $result;
		}
	}

	public function get_or_fail($stmt){
		$result = $this->dbh->query($stmt)->fetch_all(MYSQLI_ASSOC);
		if (empty($result)) {
	        require_once 'app/pages/404.php';
			exit(); die();
		}else{
			return $result;
		}
	}

}