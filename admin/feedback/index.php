<?php
$title='Feedback';
$baseUrl = '../';
    require_once('../layouts/header.php');
   $sql = "Select * from feedback order by status asc,updated_at desc" ;
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
                    placeholder="Search Feedbacker name ..." aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <a href="searchFeedback.php"><button class="btn" style="background-color: #2B3467;color:white"
                            type="submit">
                            <i class="fas fa-search fa-sm"></i></a>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <table class="table table-bordered table-hover table-responsive">
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
            <?php
            $index = 0 ;
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
            ?>
        </tbody>

    </table>
</div>
<script type="text/javascript">
function markRead(id) {
    $.post('form_api.php', {
        'id': id,
        'action': 'mark'
    }, function(data) {
        location.reload()
    })
}
</script>
<?php
    require_once('../layouts/footer.php')
?>