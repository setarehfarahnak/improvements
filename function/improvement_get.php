<?php

if (is_ajax()) {
    improvement_get();
}

//Function to check if the request is an AJAX request
function is_ajax()
{
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}

function improvement_get()
{
    // TODO: DB connection/files doesnt work when its outside why it should be inside function??
    require('../includes/setting.php');
    require('../includes/dbcon.php');

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
    $return = json_encode($return);
    echo json_encode($return);
}
