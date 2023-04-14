<?php
$title='OrderSearch';
$baseUrl = '../';
    require_once('../layouts/header.php');
    // pending, approved,cancel
    $search =',';
    if(isset($_POST['search'])){
        $search = $_POST['search'];
    }
    $sql = "SELECT * FROM feedback WHERE lastname LIKE '%$search%'";
    $data = executeResult($sql);  
?>
<div class="row" style="margin-top:20px;">
    <div class="col-md-6">
        <h3 class=" mt-2">Feedback management</h3>
    </div>
    <div class="col-md-6">
        <form action="searchFeedback.php" method="POST"
            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input name="search" type="text" class="form-control bg-light border-1 small"
                    placeholder="Search Feedbacker name..." aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <a href="searchFeedback.php"><button class="btn" style="background-color: #2B3467;color:white"
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
        echo ' <table class="table table-bordered table-hover table-responsive">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên</th>
                <th>Họ</th>
                <th>Sdt</th>
                <th>Email</th>
                <th>Chủ đề</th>
                <th>Nội dung</th>
                <th>Ngày tạo</th>
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
                            <td>'.$item['firstname'].'</td>
                            <td>'.$item['lastname'].'</td>
                            <td>'.$item['phone_number'].'</td>
                            <td>'.$item['email'].'</td>
                            <td>'.$item['subject_name'].'</td>
                            <td>'.$item['note'].'</td>
                            <td>'.$item['created_at'].'</td>           
                            <td style="width: 50px"> ';
                            if($item['status']==0){
                                echo '<button onclick="markRead('.$item['id'].')" class="btn btn-danger">Đã đọc</button>';
                            }
                            echo '
                            
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