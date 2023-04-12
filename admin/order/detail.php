<?php
$title='Chi tiết đơn hàng';
$baseUrl = '../';
    require_once('../layouts/header.php');
    $orderId = getGet('id');
    $sql = "select order_details.*,product.title,product.thumbnail from order_details left join product on product.id=order_details.product_id where order_details.order_id = $orderId" ;
    $data = executeResult($sql);
    $sql = "Select * from orders where id = $orderId";
    $orderItem=executeResult($sql,true);
?>
<div class="row" style="margin-top:20px;">
    <div class="col-md-12">
        <h3 class="text-warning mt-2">Chi tiết đơn hàng</h3>
    </div>
</div>
<div class="row">
    <div class="col-md-7">
        <table class="table table-bordered table-hover table-responsive">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Thumbnail</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tổng giá</th>
                </tr>
            </thead>
            <tbody>
                <?php
            $index = 0 ;
            foreach($data as $item) {
                echo '<tr>
                            <th>'.(++$index).'</th>
                            <td><img style ="height:120px" src="'.fixUrl($item['thumbnail']).'" alt=""></td>
                            <td>'.$item['title'].'</td>
                            <td>$'.number_format($item['price']).'</td>
                            <td>'.$item['num'].'</td>
                            <td>$'.number_format($item['total_money']).'</td>      
                            <td style="width: 50px"></td>                    
                        </tr>';
            }
            ?>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>Tổng tiền</th>
                    <th> $<?=number_format($orderItem['total_money'])?> </th>
                </tr>
            </tbody>

        </table>
    </div>
    <div class="col-md-5">
        <table class="table table-bordered">
            <tr>
                <th>Họ và tên</th>
                <td><?=$orderItem['fullname']?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?=$orderItem['email']?></td>
            </tr>
            <tr>
                <th>Số điện thoại</th>
                <td><?=$orderItem['phone_number']?></td>
            </tr>
            <tr>
                <th>Địa chỉ</th>
                <td><?=$orderItem['address']?></td>
            </tr>
            <tr>
                <th>Ghi chú</th>
                <td><?=$orderItem['note']?></td>
            </tr>
            <tr>
                <th><a href="printOrder.php?id=<?=$orderItem['id']?>">In đơn hàng</a></th>
            </tr>
        </table>
    </div>
</div>

<?php
    require_once('../layouts/footer.php')
?>