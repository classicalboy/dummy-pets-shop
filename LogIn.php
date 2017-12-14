<?php

require_once 'MongoModel.php';
error_reporting(E_ALL);
ini_set('display_errors', 1)
;

class LogIn
{
	private $userName;
	private $pwd;
	private $model;

	function __construct()
	{
		$this->userName = $_REQUEST['userName'];
		$this->password = $_REQUEST['password'];
		$this->model = new MongoModel();
	}

	function logIn(){
		if ($data = $this->model->authenticate($this->userName, $this->password)) {
			echo json_encode(array('status' => 'success','message'=>'You are logged in.','data'=> $data));
		}
		else {
			echo json_encode(array('status' => 'error','message'=>'Please recheck your credentials..','data'=>''));
		}
	}
}

$login = new LogIn();
$login->logIn();

?>