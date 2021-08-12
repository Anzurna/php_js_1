<?php
namespace Src\Controllers;

use Src\TableGateways\UserGateway;

class UserController {

    private $db;
    private $requestMethod;
    private $requestData;

    private $userGateway;

    public function __construct($db, $requestMethod, $requestData)
    {
        $this->db = $db;
        $this->requestMethod = $requestMethod;
        $this->userEmail = $requestData->email;

        $this->userGateway = new UserGateway($db);
    }

    public function processRequest()
    {
        switch ($this->requestMethod) {
            case 'GET':
                if ($this->userEmail) {
                    $response = $this->getUser($this->userEmail);
                } else {
                    $response = $this->getAllUsers();
                };
                break;
            case 'POST':
                $response = $this->createUserFromRequest();
                break;
            case 'PUT':
                $response = $this->updateUserFromRequest($this->userEmail);
                break;
            case 'DELETE':
                $response = $this->deleteUser($this->userEmail);
                break;
            default:
                $response = $this->notFoundResponse();
                break;
        }
        header($response['status_code_header']);
        if ($response['body']) {
            echo $response['body'];
        }
    }

    private function getAllUsers()
    {
        $result = $this->userGateway->findAll();
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = json_encode($result);
        return $response;
    }

    private function getUser($email)
    {
        $result = $this->userGateway->find($email);
        if (! $result) {
            return $this->notFoundResponse();
        }
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = json_encode($result);
        return $response;
    }

    private function createUserFromRequest($requestData)
    {
        if (! $this->validateuser($requestData)) {
            return $this->unprocessableEntityResponse();
        }
        $this->userGateway->insert($requestData);
        $response['status_code_header'] = 'HTTP/1.1 201 Created';
        $response['body'] = null;
        return $response;
    }

    private function updateUserFromRequest($requestData, $email)
    {
        $result = $this->userGateway->find($email);
        if (! $result) {
            return $this->notFoundResponse();
        }
        if (! $this->validateuser($requestData)) {
            return $this->unprocessableEntityResponse();
        }
        $this->userGateway->update($email, $requestData);
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = null;
        return $response;
    }

    private function deleteUser($email)
    {
        $result = $this->userGateway->find($email);
        if (! $result) {
            return $this->notFoundResponse();
        }
        $this->userGateway->delete($email);
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = null;
        return $response;
    }

    private function validateUser($requestData)
    {
        if (! isset($requestData["login"])) {
            return false;
        }
        if (! isset($requestData["firstName"])) {
            return false;
        }
        if (! isset($requestData["lastName"])) {
            return false;
        }
        if (! isset($requestData["email"])) {
            return false;
        }
        return true;
    }

    private function unprocessableEntityResponse()
    {
        $response['status_code_header'] = 'HTTP/1.1 422 Unprocessable Entity';
        $response['body'] = json_encode([
            'error' => 'Invalid input'
        ]);
        return $response;
    }

    private function notFoundResponse()
    {
        $response['status_code_header'] = 'HTTP/1.1 404 Not Found';
        $response['body'] = null;
        return $response;
    }
}