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
        case 'delete':
            deleteExplore();
            break;
    }   
}
function deleteExplore(){
    $id = getPost('id');
    $sql = "delete from explore where id = $id";
    execute($sql);
    // echo $sql;
}
?>