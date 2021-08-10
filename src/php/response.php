<?php
    //include('../includes/dbopen.php');
    $data = json_decode(file_get_contents('php://input'));
    // $sql = "select book_name from book_mast where book_name LIKE '$book_name%'";
    // $result = mysql_query($sql);


    $request = array($data);
    // $request = array (
    //     'login'=> $data->login,
    //     'first_name'=>"Test Name",
    //     'last_name'=> "Test Last Name",
    //     'email'=> "test@email.com"  
    //     );
    // echo json_encode($arr);
    // echo "test1";
    // echo "test2";

?>