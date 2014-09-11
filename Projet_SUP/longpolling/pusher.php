<?php
require_once('dbtools.php');
require_once('MyBDDSessionHandler.php');
$session_handler = new MyBDDSessionHandler();
session_set_save_handler($session_handler);
session_start();

$start = time();
$longPollingCycleTime = 5; // les cycle de long polling dureront X sec
$realTimeLatency = 1; // on ira rechercher des messages en BDD toutes les X secondes

if ($_GET['action'] = 'get_msgs')
{
    //recuperation de l'id de session en BDD
    $session_id = session_id();

    //on ferme la session en écriture pour rendre les thread PHP non bloquant et permettre une approche asynchrone
    session_write_close();

    $response = array();
    $msgs_query = "SELECT * FROM queued_msgs WHERE session_id = '".$session_id."'";

    while (time() < $start + $longPollingCycleTime)
    {
    	$msgs = myFetchAllAssoc($msgs_query);
        if (!empty($msgs))
        {
            $response['msgs'] = $msgs;
            $msgs_unqueue_query = "DELETE FROM queued_msgs WHERE session_id = '".$session_id."'";
            myQuery($msgs_unqueue_query);
            echo json_encode($response);
            exit();
        }
        sleep($realTimeLatency);
    }
    $response['msgs'] = array();
    echo json_encode('COUCOU');
    exit();
}
?>