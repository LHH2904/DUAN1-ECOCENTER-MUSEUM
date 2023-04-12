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
            deleteCategory();
            break;
    }
    
}
function deleteCategory(){

    $id = getPost('id');
    $sql = "Select count(*) as total from explore where category_explore_id=$id ";
    $data= executeResult($sql,true);
    $total = $data['total'];
    if($total>0){
        echo "Danh mục đang chứa triễn lãm nên không được xóa";
    }
    $sql = "delete from category_explore where id = $id";
    execute($sql);
    header("Refresh:0");
    // echo $sql;
}
?>