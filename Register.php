<?php

require_once 'MongoModel.php';

class Register {

    private $_model;
    private $_userData;

    function __construct() {
        $this->_model = new MongoModel();
        $this->_userData = $_REQUEST['formData'];
    }

    function register() {
        $userData = $this->filterData($this->_userData);
        $this->_model->registerUser($userData);
        echo json_encode(array('status' => 'success','message'=>'You are registered.','data'=> ''));
    }

    function filterData($data) {
        if(!empty($data) && is_array($data)) {
            foreach ($data as $key=>$value) {
                /*
                 * filter and validate data to be entered
                 */
            }
        }
    }
}

?>