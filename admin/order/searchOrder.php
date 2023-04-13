<?php
$title='OrderSearch';
$baseUrl = '../';
    require_once('../layouts/header.php');
    // pending, approved,cancel
    $search =',';
    if(isset($_POST['search'])){
        $search = $_POST['search'];
    }
    $sql = "SELECT * FROM orders WHERE code LIKE '%$search%'";
    $data = executeResult($sql);
      
?>
<div class="row" style="margin-top:20px;">
    <div class="col-md-6">
        <h3 class=" mt-2">Order management</h3>
    </div>
    <div class="col-md-6">
        <form action="searchOrder.php" method="POST"
            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input name="search" type="text" class="form-control bg-light border-1 small"
                    placeholder="Search Order code ..." aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <a href="searchOrder.php"><button class="btn " style="background-color: #2B3467;color:white"
                            type="submit">
                            <i class="fas fa-search fa-sm"></i></a>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <?php
    if($data!=null || $data != ''){
        echo '<table class="table table-bordered table-hover table-responsive">
        <thead>
            <tr>
                <th>STT</th>
                <th>Họ và tên</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Ngày tạo đơn</th>
                <th>Tổng tiền</th>
                <th>Order Code</th>
                <th style="width: 50px;">Trạng thái </th>
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
                <th><a href="detail.php?id='.$item['id'].'">'.(++$index).'</a></th>
                <td> <a href="detail.php?id='.$item['id'].'">'.$item['fullname'].'</a></td>
                <td>'.$item['email'].'</td>
                <td>'.$item['phone_number'].'</td>
                <td>'.$item['address'].'</td>
                <td>'.$item['order_date'].'</td>
                <td>$   '.number_format($item['total_money']).' </td>
                <td>'.$item['code'].'</td>      
                <td style="width: 50px">
                ';
                
                if($item['status']==0){
                    echo '<button onclick="changeStatus('.$item['id'].',1)" class="btn btn-success mb-1">Approve</button>
                    <button onclick="changeStatus('.$item['id'].',2)" class="btn btn-danger">Cancel</button>';
                }if($item['status']==1){
                    echo '<label class="badge badge-success" for="">Approved</label>';
                }if($item['status']==2){
                    echo '<label class="badge badge-danger" for="">Cancel</label>';
                }
                echo ' </td>
                             </tr>';
                        }
           }
            ?>
    </tbody>
    </table>
</div>
<div></div>
<script type="text/javascript">
function changeStatus(id, status) {
    $.post('form_api.php', {
        'id': id,
        'status': status,
        'action': 'update_status'
    }, function(data) {
        location.reload()
    })
}
</script>
<?php
    require_once('../layouts/footer.php')
?>