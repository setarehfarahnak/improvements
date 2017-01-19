<?php

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

    // TODO: DB connection/files doesnt work when its outside why it should be inside function??
    require ('../includes/setting.php');
    require ('../includes/dbcon.php');


    $improvement = $_POST['improvment'];
    $team = $_POST['team'];

    $sql = "insert into content(improv_content,improv_team) VALUES ('$improvement','$team')";
    $stmt = $pdo->query($sql);
    improvement_collect();
}

function improvement_collect(){
    // TODO: DB connection/files doesnt work when its outside why it should be inside function??
    require ('../includes/setting.php');
    require ('../includes/dbcon.php');

    $sql = "select * from content";
    $stmt = $pdo->query($sql);
    $return = [];
    foreach($stmt as $row){
        $return[] = $row;
    }
    $return["json"] = json_encode($return);
    echo json_encode($return);
}

