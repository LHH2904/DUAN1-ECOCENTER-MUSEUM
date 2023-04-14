<?php
$title='OrderSearch';
$baseUrl = '../';
    require_once('../layouts/header.php');
    // pending, approved,cancel
    $search =',';
    if(isset($_POST['search'])){
        $search = $_POST['search'];
    }
    $sql = "SELECT * FROM explore WHERE title LIKE '%$search%'";
    $data = executeResult($sql);  
?>
<div class="row" style="margin-top:20px;">
    <div class="col-md-6">
        <h3 class=" mt-2">Explore management</h3>
    </div>
    <div class="col-md-6">
        <form action="searchExplore.php" method="POST"
            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input name="search" type="text" class="form-control bg-light border-1 small"
                    placeholder="Search Explore title ..." aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <a href="searchExplore.php"><button class="btn " style="background-color: #2B3467;color:white"
                            type="submit">
                            <i class="fas fa-search fa-sm"></i></a>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <?php
    if($data!=null || $data != ''){
        echo ' <table class="table table-bordered table-hover table-responsive">
        <thead>
            <tr>
                <th>STT</th>
                <th>Thumbnail</th>
                <th>Description</th>
                <th>Category</th>
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
        <strong>Danger!</strong> No any orders
      </div>
      <div style="height:150px"> </div>'
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
                            <td>'.$item['description'].'</td>
                            <td>'.($item['title']).'</td>
                            <td style="width: 50px">
                                <a href="editor.php?id='.$item['id'].'"><button class="btn btn-warning">Sửa</button></a>
                            </td>
                            <td style="width: 50px">
                            <button onclick="deleteProduct('.$item['id'].')" class="btn btn-danger">Xoá</button>
                        </td>
                        </tr>';
            }}
            ?>
    </tbody>

    </table>
</div>
<?php
    require_once('../layouts/footer.php')
?>