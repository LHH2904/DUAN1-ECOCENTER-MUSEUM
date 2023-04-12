<?php
if(!empty($_POST)){
    $id = getGet('id');
    $title = getPost('title');
    $thumbnail =  moveFile('thumbnail');
    $description = getPost('description');
    $category_explore_id = getPost('category_explore_id');
    $created_at = $updated_at = date('Y-m-d H:s:i');
    $files_name = array();
    if(isset($_FILES['files'])){
        $files = $_FILES['files'];
        foreach($files['name'] as $key =>$value){
            $files_name[] ='asset/photo/'.$value;
            move_uploaded_file($files['tmp_name'][$key],'../../asset/photo/'.$value);
        }
    }

    if($id>0){
        // update
        if($thumbnail != ''){
            $sql = "update explore set title='$title',thumbnail='$thumbnail',description='$description',category_explore_id='$category_explore_id' where id =$id";
        }else{
            $sql = "update explore set title='$title',description='$description',category_explore_id='$category_explore_id' where id =$id";

        }
        execute($sql);
        die();
        header("Location:index.php");
    }else{
        // insert
        $sql = "insert into explore (title,thumbnail,description,category_explore_id) values ('$title','$thumbnail','$description','$category_explore_id')";
        $conn = mysqli_connect('localhost', 'root', '', 'eco_museum');
        if (mysqli_query($conn, $sql)) {
            $last_id = mysqli_insert_id($conn);
            foreach($files_name as $value){
                mysqli_query($conn,"INSERT INTO `explore_thumbnails`( `explore_id`, `thumbnail`) VALUES ('$last_id','$value')");
            }   
        };
        die();
        header("Location:index.php");
    }
}
?>