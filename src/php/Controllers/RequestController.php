<?php

namespace Src\Controllers;

use Src\Controllers\UserController;
use Src\Controllers\RecordController;
use Src\System\DatabaseConnector;

class RequestController 
{

    public $requestData = null;
    private $requestMethod = null;
    private $entityType = null;
    private $dbConnection = null;

    public function __construct($requestData, $requestMethod, $entityType)
    {
        $this->requestData = $requestData;
        $this->requestMethod = $requestMethod;
        $this->entityType = $entityType;

        $this->dbConnection = (new DatabaseConnector())->getConnection();
    }

    public function processRequest()
    {
        switch ($this->entityType) {
            case 'users':          

                // $arr = array (
                //     'login'=>"test",
                //     'first_name'=>"Test Name",
                //     'last_name'=> "Test Last Name",
                //     'email'=> "test@email.com"  );
        
                // echo json_encode($arr);
                $userController = new UserController($this->dbConnection, $this->requestMethod, $this->requestData);
                $userController->processRequest();
            case 'records':
                $recordController = new RecordController($this->dbConnection, $this->requestMethod, $this->requestData);
                $recordController->processRequest();             
        }
        // header($response['status_code_header']);
        // if ($response['body']) {
        //     echo $response['body'];
        // }
    }
}
?>