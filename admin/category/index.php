<?php
$title='Catogory';
$baseUrl = '../';
    require_once('../layouts/header.php');
    require_once('form_save.php');
 
  $id = $name = '';
  if(isset($_GET['id'])){
    $id = getGet('id');
    $sql = "Select * from category where id = $id";
    $data= executeResult($sql,true);
    if($data!=null){
        $name = $data['name'];
    }
  }
  $sql = "select * from category";
  $data = executeResult($sql);
?>
<div class="row" style="margin-top:20px;">
    <div class="col-md-12">
        <h2> Category management</h2>
    </div>
    <div class="col-md-6">
        <form method="post" action="index.php" onsubmit="return validateForm();">
            <div class="form-group">
                <label for="usr" style="font-weight: bold;">Tên Danh Mục:</label>
                <input required="true" type="text" class="form-control" id="usr" name="name" value="<?=$name?>">
                <input type="text" name="id" value="<?=$id?>" hidden="true">
            </div>
            <button class="btn btn-success">Lưu</button>
        </form>
    </div>
    <div class="col-md-6">
        <table class="table table-bordered table-hover table-responsive">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên danh mục</th>
                    <th style="width: 50px;"></th>
                    <th style="width: 50px;"></th>
                </tr>
            </thead>
            <tbody>
                <?php
	$index = 0;
    foreach($data as $item) {
		echo '<tr>
					<th>'.(++$index).'</th>
					<td>'.$item['name'].'</td>
					<td style="width: 50px">
						<a href="?id='.$item['id'].'"><button class="btn btn-warning">Sửa</button></a>
					</td>
					<td style="width: 50px">
						<button onclick="deleteCategory('.$item['id'].')" class="btn btn-danger">Xoá</button>
					</td>
				</tr>';
	}
?>
            </tbody>

        </table>
    </div>
</div>
<script type="text/javascript">
function deleteCategory(id) {
    option = confirm('Bạn có chắc chắn muốn xóa danh mục sản phẩm này không?')
    if (!option) return;

    $.post('form_api.php', {
        'id': id,
        'action': 'delete'
    }, function(data) {
        if (data != null && data != '')
            alert(data);
        return
        location.reload()
    })
}
</script>
<?php
    require_once('../layouts/footer.php')
?>