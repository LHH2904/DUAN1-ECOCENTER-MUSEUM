<?php

$title='Dashboard page';
$baseUrl = '';
require_once('layouts/header.php')
   
?>
<div class="form-group">
    <label for="exampleFormControlSelect1">Thong ke</label>
    <select class="form-control select-date" id="exampleFormControlSelect1">
        <option value="7day">7 day </option>
        <option value="30day">30 day</option>
        <option value="90day">90 day</option>
        <option value="365day">365 day</option>

    </select>
</div>
<h5>Thống kê đơn hàng : </h5>
<div id="chart" style="height: 250px;"></div>
<?php
    require_once('layouts/footer.php')
?>