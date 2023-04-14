<?php
$title='OrderSearch';
$baseUrl = '../';
    require_once('../layouts/header.php');
    // pending, approved,cancel
    $search =',';
    if(isset($_POST['search'])){
        $search = $_POST['search'];
    }
    $sql = "SELECT product.* , category.name as category_name FROM product
    JOIN category ON product.category_id = category.id 
    WHERE product.title LIKE '%$search%' AND product.deleted = 0";
    $data = executeResult($sql);  
?>
<div class="row" style="margin-top:20px;">
    <div class="col-md-6">
        <h3 class=" mt-2">Product management</h3>
    </div>
    <div class="col-md-6">
        <form action="searchProduct.php" method="POST"
            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input name="search" type="text" class="form-control bg-light border-1 small"
                    placeholder="Search Product title ..." aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <a href="searchProduct.php"><button class="btn" style="background-color: #2B3467;color:white"
                            type="submit">
                            <i class="fas fa-search fa-sm"></i></a>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
    if($data!=null || $data != ''){
        echo '<table class="table table-bordered table-hover table-responsive">
        <thead>
        <tr>
            <th>STT</th>
            <th>Thumbnail</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Danh mục</th>
            <th style="width: 50px;"></th>
            <th style="width: 50px;"></th>
        </tr>
    </thead>
    <tbody>
        ';
    }
    else{
        echo '
        <div style="height:70px" class="alert alert-danger">
        <strong>Danger!</strong> No any Product
      </div>
      <div style="height:150px"></div> '
      ;
    }
    ?>
<?php
            $index = 0 ;
           if($data>0){
            foreach($data as $item) {
                echo '<tr>
                <th>'.(++$index).'</th>
                <td><img src = "'.fixUrl($item['thumbnail']).'" style="height: 100px;" /></td>
                <td>'.$item['title'].'</td>
                <td>'.number_format($item['discount']).' $'.'</td>
                <td>'.$item['category_name'].'</td>

                <td style="width: 50px">
                    <a href="editor.php?id='.$item['id'].'"><button class="btn btn-warning">Sửa</button></a>
                </td>
                <td style="width: 50px">
                <button onclick="deleteProduct('.$item['id'].')" class="btn btn-danger">Xoá</button>
            </td>
            </tr>';
                           }
           }
            ?>
</tbody>
</table>
</div>
<?php
    require_once('../layouts/footer.php')
?>