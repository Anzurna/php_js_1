<?php
    require $_SERVER['DOCUMENT_ROOT']."/vendor/autoload.php";
    //include('../includes/dbopen.php');
    $data = json_decode(file_get_contents('php://input'));
    // $sql = "select book_name from book_mast where book_name LIKE '$book_name%'";
    // $result = mysql_query($sql);


    $request = array($data);
    use Src\Controllers\UserController;
	$user = new UserController("12", "POST", "12");

    //debug_to_console("123");
    $arr = array (
        'login'=> $user->requestMethod,
        'first_name'=>"Test Name",
        'last_name'=> "Test Last Name",
        'email'=> "test@email.com"  
    );
	echo json_encode($arr);

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

function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}