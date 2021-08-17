<?php 
     require $_SERVER['DOCUMENT_ROOT']."/vendor/autoload.php";

     use Src\Controllers\SignInController;

    $requestDataArray = json_decode(file_get_contents('php://input'), true);

    $requestMethod = $_SERVER["REQUEST_METHOD"];

    if ($requestMethod == "POST") {
        $signInController = new SignInController($requestDataArray);
        $signInController->processRequest();

    } else {
        $response['status_code_header'] = 'HTTP/1.1 404 Not Found';
        $response['body'] = null;
        header($response['status_code_header']);
    }
