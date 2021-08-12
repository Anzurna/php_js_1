<?php

namespace Src\Controllers;

use Src\Controllers\UserController;

class RequestController 
{

    private $requestData = null;

    public function __construct($requestData, $requestMethod)
    {
        $this->requestData = $requestData;
        $this->requestMethod = $requestMethod;
    }

    public function processRequest()
    {
        switch ($this->requestData["actionType"]) {
            case 'crud':
                $userController = new UserController($db, $reques);
                
        }
        header($response['status_code_header']);
        if ($response['body']) {
            echo $response['body'];
        }
    }
}
?>