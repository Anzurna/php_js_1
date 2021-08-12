<?php
    require $_SERVER['DOCUMENT_ROOT']."/vendor/autoload.php";

    use Src\Controllers\UserController;

    $requestMethod = $_SERVER["REQUEST_METHOD"];


    if ($requestMethod == "GET") {
        if (isset($_GET['email'])) {
            $arr = array (
                'login'=> $_GET['email'],
                'first_name'=>"Test Name",
                'last_name'=> "Test Last Name",
                'email'=> "test@email.com"  
            );
            echo json_encode($arr);
        } else {
            echo "404";
        }
    } else {
        $data = json_decode(file_get_contents('php://input'));
        // $sql = "select book_name from book_mast where book_name LIKE '$book_name%'";
        // $result = mysql_query($sql);
    
    
        // $request = (array) $data;
    
        $user = new UserController("12", $requestMethod, "12");
    
        //debug_to_console("123");
        $arr = array (
            'login'=> $data["login"],
            'first_name'=>"Test Name",
            'last_name'=> "Test Last Name",
            'email'=> "test@email.com"  
        );
        echo json_encode($arr);
    }


    //include('../includes/dbopen.php');


//example
//include('../includes/dbopen.php');
// $data = json_decode(file_get_contents('php://input'));
// $sql = "select book_name from book_mast where book_name LIKE '$book_name%'";
// $result = mysql_query($sql);


// $arr = array (
//     'login'=> $data->user,
//     'first_name'=>"Test Name",
//     'last_name'=> "Test Last Name",
//     'email'=> "test@email.com"  
//     );
// echo json_encode($arr);
// echo "test1";
// echo "test2";

