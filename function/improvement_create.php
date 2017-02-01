<?php

if (is_ajax()) {
    if (isset($_POST["improvment"]) && !empty($_POST["improvment"]) && isset($_POST["team"]) && !empty($_POST["team"])) { //Checks if action value exists
        improvement_create();
    }
}

//Function to check if the request is an AJAX request
function is_ajax()
{
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}

function improvement_create()
{
    // TODO: DB connection/files doesnt work when its outside why it should be inside function??
    require('../includes/setting.php');
    require('../includes/dbcon.php');


    $improvement = $_POST['improvment'];
    $team = $_POST['team'];

    $sql = "insert into content(improv_content,improv_team) VALUES ('$improvement','$team')";
    $stmt = $pdo->query($sql);

    $sql = "select * from content";
    $stmt = $pdo->query($sql);
    $return = [];
    if ($stmt) {
        $return = $stmt->fetchAll();
        $results = [];
        for ($i = 0; $i < count($return); $i++) {
            $result = $return[$i];
            $team = $return[$i]['improv_team'];
            $results[$team][] = $result;
        }
    }
    $return = array('json' => $return, 'team' =>$results);
    $return_response = json_encode($return);
    echo json_encode($return_response);
}
