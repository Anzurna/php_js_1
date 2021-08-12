<?php

namespace Src\Controllers;

use Src\Controllers\UserController;

class RequestController 
{

    public $requestData = null;
    private $requestMethod = null;
    private $entityType = null;

    public function __construct($requestData, $requestMethod, $entityType)
    {
        $this->requestData = $requestData;
        $this->requestMethod = $requestMethod;
        $this->$entityType = $entityType;
    }

    public function processRequest()
    {
        switch ($this->entity) {
            case 'users':
                $userController = new UserController($db, $requestMethod, $requestData);
                $userController->processRequest();
            //case: 'records':
                // $recordController = new RecordController($db, $requestMethod, $requestData);
                //$recordController.processRequest();             
        }
        // header($response['status_code_header']);
        // if ($response['body']) {
        //     echo $response['body'];
        // }
    }
}
?>