<?php
if(!empty($_POST)) {
	$id = getPost("id");
	$name = getPost("name");

	if($id > 0) {
		//update
		$sql = "update category_explore set name = '$name' where id = $id";
		execute($sql);
	} else {
		//insert
		$sql = "insert into category_explore(name) values ('$name')";
		execute($sql);
	}
}