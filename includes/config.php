<?php
	
	error_reporting(-1);
	ini_set('display_errors', 'On');

	header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
	

	switch ($_SERVER["SCRIPT_NAME"]) {
		case "/p/administration.php":
			$CURRENT_PAGE = "administration"; 
			$PAGE_TITLE = "Administration";
			break;
		case "/p/records.php":
			$CURRENT_PAGE = "records"; 
			$PAGE_TITLE = "Records";
			break;
        case "/p/user.php":
            $CURRENT_PAGE = "user"; 
            $PAGE_TITLE = "User";
            break;
		default:
			$CURRENT_PAGE = "Index";
			$PAGE_TITLE = "SmolCRM";
	}



?>