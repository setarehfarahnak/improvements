<?php
echo 'hej';
$localhost = "localhost";
$dbname = "improvements";
$user = "root";
$pass = "root";

$pdo = new PDO("mysql:charset=utf8; host=$localhost; dbname=$dbname", $user, $pass);


if (is_ajax()) {
    if (isset($_POST["improvment"]) && !empty($_POST["improvment"]) && isset($_POST["team"]) && !empty($_POST["team"])) { //Checks if action value exists
        improvement_create();
    }
}

//Function to check if the request is an AJAX request
function is_ajax() {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}

function improvement_create(){

//    $sql = "INSERT INTO $dbname ('improv_content','improv_team')
//            VALUES (\"".$_POST['improvment']."\",
//                     \"".$_POST['team']."\",
//                     )";
//
//
//    $stmt = $pdo->query($sql);

    $return = $_POST;
    $return["json"] = json_encode($return);
    echo json_encode($return);
}
