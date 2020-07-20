
<?php
ini_set("display_errors",1);
//if( $_SERVER['SERVER_NAME']== "localhost"){
//
//}else {
//    header('Access-Control-Allow-Origin: *');
//}
//
//
//$method = $_SERVER['REQUEST_METHOD'];
//if ($method == "OPTIONS") {
////    header('Access-Control-Allow-Origin: *');
//    header("Access-Control-Allow-Methods: HEAD, GET, POST, PUT, PATCH, DELETE, OPTIONS");
//    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method,Access-Control-Request-Headers, Authorization");
//    header("HTTP/1.1 200 OK");
//    header('Content-Type: application/json');
//    die();
//}else{
////    header('Access-Control-Allow-Origin: *');
//    header("Access-Control-Allow-Methods: HEAD, GET, POST, PUT, PATCH, DELETE, OPTIONS");
//    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method,Access-Control-Request-Headers, Authorization");
//
//    header('Content-Type: application/json');
//}

include ("db/DBHandler.php");

$db = new DBHandler();
$temp = htmlspecialchars($_GET["temp"]);
if(isset($temp) && $temp != null){

    $res =$db-> addTemp($temp);
    if($res > 0){
        http_response_code(200);

        // display message: unable to create user
        echo json_encode(array("message" => "Added"));
    }else{
        http_response_code(400);

        // display message: unable to create user
        echo json_encode(array("message" => "Error"));
    }


}else {
    // set response code
    http_response_code(400);

    // display message: unable to create user
    echo json_encode(array("message" => "provide temperature"));
}