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
                $userController = new UserController($this->dbConnection, $this->requestMethod, $this->requestData);
                $userController->processRequest();
                break;
            case 'records':
                $recordController = new RecordController($this->dbConnection, $this->requestMethod, $this->requestData);
                $recordController->processRequest();  
                break;           
        }

    }
}
?>