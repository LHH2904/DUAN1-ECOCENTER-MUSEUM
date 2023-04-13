<?php
$title='Tickets';
$baseUrl = '../';
    require_once('../layouts/header.php');
    $sql = "select ticket.* from ticket";
	$data = executeResult($sql);
?>
<div class="row" style="margin-top:20px;">
    <div class="col-md-12">
        <h3 class=" mt-2">Ticket management</h3>
    </div>
    <table class="table table-bordered table-hover table-responsive">
        <thead>
            <tr>
                <th>STT</th>
                <th>Trạng thái</th>
                <th>Số lượng trẻ em</th>
                <th>Số lượng người lớn</th>
                <th>Tổng giá vé</th>
                <th>Tên khách hàng</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Mã vé</th>
                <th style="width: 50px;"></th>
                <th style="width: 50px;"></th>
            </tr>
        </thead>
        <tbody>
            <?php
        $index = 0;
        $status = '';
        $type = '';      
        foreach ($data as $item) {
            if($item['status']==1){
                $status = '<span class="badge badge-secondary">Pendding</span>';
            }elseif($item['status']==2){
                $status = '<span class="badge badge-success">Approve</span>';
            }else{
                $status = '<span class="badge badge-danger">Cancel</span>';
            }
            echo '<tr>
                <th>' . (++$index) . '</th>
                <td>' . $status . '</td>
                <td>' . $item['qty_childs']. '</td>
                <td>' . $item['qty_adults']. '</td>
                <td>' . number_format($item['price_total']) . ' $' . '</td>
                <td>' . $item['name'] . '</td>
                <td>' . $item['email'] . '</td>
                <td>' . $item['telephone'] . '</td>
                <td>' . $item['code'] . '</td> ' ;
                if($item['status']==1){
                    echo'<td style="width: 50px">
                    <button onclick="approveTicket('.$item['id'].')" class="btn btn-success">Approve</button>
                             </td>
                <td style="width: 50px">
                    <button onclick="cancelTicket('.$item['id'].')" class="btn btn-danger">Cancel</button>
                </td>';
                }
                echo '
            </tr>';
        }
        ?>
        </tbody>
    </table>

</div>
<script type="text/javascript">
function approveTicket(id) {
    $.post('form_api.php', {
        'id': id,
        'action': 'approve'
    }, function(data) {
        location.reload()
    })
}

function cancelTicket(id) {
    $.post('form_api.php', {
        'id': id,
        'action': 'cancel'
    }, function(data) {
        location.reload()
    })
}
</script>
<?php
    require_once('../layouts/footer.php')
?>