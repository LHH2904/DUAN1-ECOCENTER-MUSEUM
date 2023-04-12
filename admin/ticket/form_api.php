<?php
session_start();
require_once('../../utils/utility.php');
require_once('../../Database/dbhelper.php');
$user = getUserToken();
if($user==null){
    die();
}
if(!empty($_POST)){
    $action = getPost('action');
    switch ($action){
        case 'approve':
            approveTicket();
            break;
        case 'cancel':
            cancelTicket();
            break;
    }
    
}
function approveTicket(){
    $id = getPost('id');
    $sql = "update ticket set status=2 where id = $id";
    execute($sql);
    // echo $sql;
};
function cancelTicket(){
    $id = getPost('id');
    $sql = "update ticket set status=3 where id = $id";
    execute($sql);
    // echo $sql;
};
?>