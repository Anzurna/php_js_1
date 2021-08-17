<?php
namespace Src\Controllers;

use Src\TableGateways\UserGateway;
use Src\System\DatabaseConnector;

class SignInController {

    private $dbConnection;
    private $requestData;


    public function __construct($requestData)
    {
        $this->dbConnection = (new DatabaseConnector())->getConnection();
        $this->requestData =  $requestData;
        
        $this->userGateway = new UserGateway($this->dbConnection);      
    }



    public function processRequest()
    {
        error_log(print_r($this->requestData, TRUE)); 
        $data = $this->userGateway->find($this->requestData["email"]);
        
        if ($data and areCredentialsSet($requestData)) {
            if (($this->requestData["email"] === $data->email) && 
                ($this->requestData["password"] === $data->pass)) {
                header("HTTP/1.1 200 OK");
            }  else {
                header("HTTP/1.1 401 Unauthorized");
            }
        }
        else {
            header("HTTP/1.1 401 Unauthorized");
        }
    }

    private function areCredentialsSet($credentials){
        if (($credentials["email"] != null) && 
            ($credentials["password"] != null)){
                return TRUE;
        } else {
            return FALSE;
        }
    }

}

    