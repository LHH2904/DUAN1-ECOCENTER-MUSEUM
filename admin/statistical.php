<?php
    require_once('../utils/utility.php');
require_once('../Database/dbhelper.php');
require_once("../Carbon/autoload.php");
use Carbon\Carbon;
use Carbon\CarbonInterval;
 
if(isset($_POST['time'])){
    $time = $_POST['time'];
}else{
    $time = '';
    $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString();
}
if($time=="7day"){
    $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subDays(7)->toDateString();
}
else if($time=="30day"){
    $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subDays(30)->toDateString();
}
else if($time=="90day"){
    $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subDays(90)->toDateString();
}
else if ($time=="365day"){
    $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString();
}
printf("Now : %s",Carbon::now('Asia/Ho_Chi_Minh'));

$subdays = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString();
$now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

$sql = "Select * from statistical";
$data = executeResult($sql);

print_r(json_encode($data));
?>