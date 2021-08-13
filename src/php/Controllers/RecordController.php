<?php
namespace Src\Controllers;

use Src\TableGateways\RecordGateway;

class RecordController {

    private $db;
    private $requestMethod;
    private $requestData;
    private $recordTitle;

    private $recordGateway;


    public function __construct($db, $requestMethod, $requestData)
    {
        $this->db = $db;
        $this->requestMethod = $requestMethod;
        $this->requestData =  $requestData;
        
        $this->recordGateway = new RecordGateway($db);

        if ($this->requestMethod == "GET") {
            $this->recordTitle = $_GET["title"];
        } else {
            $this->recordTitle = $requestData["title"];
        }
    }

    public function processRequest()
    {
        switch ($this->requestMethod) {
            case 'GET':
                if ($this->recordTitle) {
                    $response = $this->getRecord($this->recordTitle);
                } else {
                    $response = $this->getAllRecords();
                };
                break;
            case 'POST':
                $response = $this->createRecordFromRequest($this->requestData);
                break;
            case 'PUT':
                $response = $this->updateRecordFromRequest($this->requestData, $this->recordTitle);
                break;
            case 'DELETE':
                $response = $this->deleteRecord($this->recordTitle);
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

    private function getAllRecords()
    {
        $result = $this->recordGateway->findAll();
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = json_encode($result);
        return $response;
    }

    private function getRecord($title)
    {
        $result = $this->recordGateway->find($title);
        if (! $result) {
            return $this->notFoundResponse();
        }
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = json_encode($result);
        return $response;
    }

    private function createRecordFromRequest($requestData)
    {
        if (! $this->validateuser($requestData)) {
            return $this->unprocessableEntityResponse();
        }
        $this->recordGateway->insert($requestData);
        $response['status_code_header'] = 'HTTP/1.1 201 Created';
        $response['body'] = null;
        return $response;
    }

    private function updateRecordFromRequest($requestData, $title)
    {
        $result = $this->recordGateway->find($title);
        if (! $result) {
            return $this->notFoundResponse();
        }
        if (! $this->validateuser($requestData)) {
            return $this->unprocessableEntityResponse();
        }
        $this->recordGateway->update($requestData);
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = null;
        return $response;
    }

    private function deleteRecord($title)
    {
        $result = $this->recordGateway->find($title);
        if (! $result) {
            return $this->notFoundResponse();
        }
        $this->recordGateway->delete($title);
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = null;
        return $response;
    }

    private function validateUser($requestData)
    {
        if (! isset($requestData["title"])) {
            return false;
        }
        if (! isset($requestData["content"])) {
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