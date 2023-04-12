<?php
session_start();
require_once('../utils/utility.php');
require_once('../Database/dbhelper.php');
require_once("../mail/sendmail.php");
$action = getPost('action');
switch ($action){
    case 'cart':
        addToCart();
        break;
    case 'update':
        updateCart();
        break;
	case 'checkout':
		completeCheckout();
		break;
	case 'checkout-ticket':
		completeCheckoutTicket();
		break;
}
function completeCheckout(){
	if(!isset($_SESSION['cart']) || count($_SESSION)==0){
		return false ;
	}
	$codeOrder ="ECO".strval(time());
	$fullname = getPost('fullname');
	$email  = getPost('email');
	$phone_number = getPost('phone_number');
	$address = getPost('address');
	$note = getPost('note');
	$user = getUserToken();	
	$userId = 0;
	if($user != null){
		$userId = $user['id'];
	}
	$orderDate = date('Y-m-d H:i:s');
	$totalMoney = 0;
	foreach($_SESSION['cart'] as $item){
	$totalMoney += ($item['discount'] * $item['num']);
	}
	$sql = "INSERT INTO `orders`(`fullname`, `user_id`, `email`, `phone_number`, `address`, `order_date`, `status`, `total_money`,`note`,`code`) VALUES ('$fullname','$userId','$email','$phone_number','$address','$orderDate',0,'$totalMoney','$note','$codeOrder')";
	execute($sql);
	$sql = "SELECT * from orders where order_date = '$orderDate'";
	$orderItem = executeResult($sql,true);
	$orderId = $orderItem['id'];
	foreach($_SESSION['cart'] as $item){
    $product_id = $item['id'];
    $price = $item['discount'];
    $num = $item['num'];
    $total_money = ($price * $num);
    $sql = "INSERT INTO `order_details`(`order_id`, `product_id`, `price`, `num`, `total_money`) VALUES ('$orderId','$product_id','$price','$num','$total_money')"; 
    execute($sql);
	$mail = new Mailer();
	$titleMail = "Confirm Order from ECO CENTER";               
	$addressMail = $email;
    $descMail= '<tr>
	<td>
	  <table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tbody>
		  <tr>
			<td
			  align="center"
			  height="100%"
			  style="background-color: #003580"
			  valign="top"
			  width="100%">
			  <table
				align="center"
				border="0"
				cellpadding="0"
				cellspacing="0"
				style="max-width: 700px"
				width="100%">
				<tbody>
				  <tr>
					<td
					  align="center"
					  style="padding: 0px 8px; font-size: 0"
					  valign="middle">
					  <table
						align="left"
						border="0"
						cellpadding="0"
						cellspacing="0"
						class="m_-2215166014366785374m-fw m_-2215166014366785374m-no-max-width"
						style="max-width: 144px">
						<tbody>
						  <tr>
							<td
							  align="center"
							  style="padding: 22px 0 0 0"
							  valign="middle">
							  <table
								align="center"
								border="0"
								cellpadding="0"
								cellspacing="0">
								<tbody>
								  <tr>
									<td>
									  <img
										
										border="0"
										class="m_-2215166014366785374logo_mob CToWUd"							
										src="https://i.ibb.co/s1nX1zF/logowhite.png"
										style="display: block"
										width="50%";
										data-image-whitelisted=""
										data-bit="iit" />
									</td>
								  </tr>
								</tbody>
							  </table>
							</td>
						  </tr>
						  <tr>
							<td height="22">
							  <img
								border="0"
								height="22"
								src="https://mail.google.com/mail/u/0?ui=2&amp;ik=7d72d78c74&amp;attid=0.1.2&amp;permmsgid=msg-f:1762792680656466773&amp;th=1876b29a772ff355&amp;view=fimg&amp;fur=ip&amp;sz=s0-l75-ft&amp;attbid=ANGjdJ85BFtmtKHXF3S-JNP5aaGP48nROZ0bS8PPZaByAbeMHy671J_njINnjBSSXuMQZXrPde5cFX75XCdeCSeoaXeUr4Z5_wgZr2lPbH8WYBK-mlbQFjah_U05wvY&amp;disp=emb"
								width="1"
								data-image-whitelisted=""
								class="CToWUd"
								data-bit="iit" />
							</td>
						  </tr>
						</tbody>
					  </table>
					  <table
						align="right"
						border="0"
						cellpadding="0"
						cellspacing="0"
						class="m_-2215166014366785374m-fw m_-2215166014366785374m-no-max-width m_-2215166014366785374mobile-hide"
						style="max-width: 480px">
						<tbody>
						  <tr>
							<td
							  align="right"
							  style="padding: 30px"
							  valign="middle">
							  <table
								border="0"
								cellpadding="0"
								cellspacing="0">
								<tbody>
								  <tr>
									<td
									  style="padding-right: 8px"
									  valign="middle">
									  <table
										border="0"
										cellpadding="0"
										cellspacing="0"
										width="100%">
										<tbody>
										  <tr>
											<td height="40" width="40">
											  <img
												height="40"
												src="https://i.ibb.co/rGsV179/personemail.png"
												style="display: block"
												width="40"
												data-image-whitelisted=""
												class="CToWUd"
												data-bit="iit" />
											</td>
										  </tr>
										</tbody>
									  </table>
									</td>
									<td
									  style="
										font-size: 14px;
										line-height: 20px;
										font-weight: normal;
										font-family: Poppins;
										color: #ffffff;
									  "
									  valign="middle">
									  '.$fullname.'
									</td>
								  </tr>
								</tbody>
							  </table>
							</td>
						  </tr>
						</tbody>
					  </table>
					</td>
				  </tr>
				</tbody>
			  </table>
			</td>
		  </tr>
		</tbody>
	  </table>
	  <table
		align="center"
		bgcolor="#FFFFFF"
		border="0"
		cellpadding="0"
		cellspacing="0"
		style="padding: 0; margin: 0; background-color: #ffffff"
		width="100%">
		<tbody>
		  <tr>
			<td
			  align="center"
			  height="16"
			  style="
				height: 16px;
				font-size: 1px;
				line-height: 1px;
				padding: 0;
			  "></td>
		  </tr>
		</tbody>
	  </table>
	  <table
		align="center"
		border="0"
		cellpadding="0"
		cellspacing="0"
		style="background-color: #ffffff"
		width="100%">
		<tbody>
		  <tr>
			<td align="center" height="100%" valign="top" width="100%">
			  <table
				align="center"
				border="0"
				cellpadding="0"
				cellspacing="0"
				style="max-width: 700px"
				width="100%">
				<tbody>
				  <tr>
					<td
					  align="center"
					  class="m_-2215166014366785374mobile-padding-16"
					  valign="middle"
					  width="100%">
					  <img
						alt=""
						border="0"
						class="m_-2215166014366785374mobile-main-hero CToWUd a6T"
						height="440"
						src="https://scontent.fsgn2-5.fna.fbcdn.net/v/t39.30808-6/341075786_967364607759405_1801021798307137956_n.jpg?_nc_cat=104&ccb=1-7&_nc_sid=730e14&_nc_ohc=FnQqP6JbYvgAX-GYUDs&_nc_ht=scontent.fsgn2-5.fna&oh=00_AfB6WRzs9cEAI4RPekYh0EGVpLGQjcBdbr0wqiFFFtTHWA&oe=643A89A5"
						style="
						  display: block;
						  line-height: 0;
						  margin: 0;
						  max-width: 700px;
						"
						width="700"
						data-image-whitelisted=""
						data-bit="iit"
						tabindex="0" />
					  <div
						class="a6S"
						dir="ltr"
						style="opacity: 0.01; left: 573px; top: 485px">
						<div
						  id=":1da"
						  class="T-I J-J5-Ji aQv T-I-ax7 L3 a5q"
						  role="button"
						  tabindex="0"
						  aria-label="Download attachment noname"
						  jslog="91252; u014N:cOuCgd,Kr2w4b,xr6bB; 4:WyIjbXNnLWY6MTc2Mjc5MjY4MDY1NjQ2Njc3MyIsbnVsbCxbXV0."
						  data-tooltip-class="a1V"
						  data-tooltip="Download">
						  <div class="akn">
							<div class="aSK J-J5-Ji aYr"></div>
						  </div>
						</div>
						<div
						  id=":1db"
						  class="T-I J-J5-Ji aQv T-I-ax7 L3 a5q"
						  role="button"
						  tabindex="0"
						  aria-label="Add attachment to Drive noname"
						  jslog="54185; u014N:cOuCgd,xr6bB; 1:WyIjdGhyZWFkLWY6MTc2Mjc5MjY4MDY1NjQ2Njc3MyIsbnVsbCxudWxsLG51bGwsbnVsbCxudWxsLG51bGwsbnVsbCxudWxsLG51bGwsbnVsbCxudWxsLG51bGwsW11d; 4:WyIjbXNnLWY6MTc2Mjc5MjY4MDY1NjQ2Njc3MyIsbnVsbCxbXV0.; 43:WyJpbWFnZS9wbmciLDUxOTk0OV0."
						  data-tooltip-class="a1V"
						  data-tooltip="Add to Drive">
						  <div class="akn">
							<div class="wtScjd J-J5-Ji aYr XG">
							  <div class="T-aT4" style="display: none">
								<div></div>
								<div class="T-aT4-JX"></div>
							  </div>
							</div>
						  </div>
						</div>
						<div
						  id=":1dd"
						  class="T-I J-J5-Ji aQv T-I-ax7 L3 a5q"
						  role="button"
						  tabindex="0"
						  aria-label="Save to Photos"
						  jslog="54186; u014N:cOuCgd,xr6bB; 1:WyIjdGhyZWFkLWY6MTc2Mjc5MjY4MDY1NjQ2Njc3MyIsbnVsbCxudWxsLG51bGwsbnVsbCxudWxsLG51bGwsbnVsbCxudWxsLG51bGwsbnVsbCxudWxsLG51bGwsW11d; 4:WyIjbXNnLWY6MTc2Mjc5MjY4MDY1NjQ2Njc3MyIsbnVsbCxbXV0.; 43:WyJpbWFnZS9wbmciLDUxOTk0OV0."
						  data-tooltip-class="a1V"
						  data-tooltip="Save to Photos">
						  <div class="akn">
							<div class="J-J5-Ji aYr akS">
							  <div class="T-aT4" style="display: none">
								<div></div>
								<div class="T-aT4-JX"></div>
							  </div>
							</div>
						  </div>
						</div>
					  </div>
					</td>
				  </tr>
				</tbody>
			  </table>
			</td>
		  </tr>
		</tbody>
	  </table>
	  <table
		align="center"
		border="0"
		cellpadding="0"
		cellspacing="0"
		style="background-color: #ffffff"
		width="100%">
		<tbody>
		  <tr>
			<td align="center" height="100%" valign="top" width="100%">
			  <table
				align="center"
				border="0"
				cellpadding="0"
				cellspacing="0"
				style="max-width: 700px"
				width="100%">
				<tbody>
				  <tr>
					<td
					  align="left"
					  class="m_-2215166014366785374mobile-lr-padding-16"
					  style="
						padding-left: 8px;
						padding-right: 8px;
						padding-top: 16px;
						padding-bottom: 4px;
					  "
					  valign="middle"
					  width="100%">
					  <p
						style="
						  color: #262626;
						  font-family: BlinkMacSystemFont, -apple-system,
							Segoe UI, Roboto, Helvetica, Arial, sans-serif;
						  font-size: 32px;
						  font-weight: bold;
						  line-height: 40px;
						  margin: 0;
						">
						Your order is on your way
					  </p>
					</td>
				  </tr>
				</tbody>
			  </table>
			</td>
		  </tr>
		</tbody>
	  </table>
	  <table
		align="center"
		border="0"
		cellpadding="0"
		cellspacing="0"
		style="background-color: #ffffff"
		width="100%">
		<tbody>
		  <tr>
			<td align="center" height="100%" valign="top" width="100%">
			  <table
				align="center"
				border="0"
				cellpadding="0"
				cellspacing="0"
				style="max-width: 700px"
				width="100%">
				<tbody>
				  <tr>
					<td
					  align="left"
					  class="m_-2215166014366785374mobile-lr-padding-16"
					  style="
						padding-left: 8px;
						padding-right: 8px;
						padding-top: 4px;
						padding-bottom: 16px;
					  "
					  valign="middle"
					  width="100%">
					  <p
						style="
						  color: #6b6b6b;
						  font-family: BlinkMacSystemFont, -apple-system,
							Segoe UI, Roboto, Helvetica, Arial, sans-serif;
						  font-size: 24px;
						  font-weight: normal;
						  line-height: 32px;
						  margin: 0;
						">
						Thank you! We are preparing your order.
					  </p>
					</td>
				  </tr>
				</tbody>
			  </table>
			</td>
		  </tr>
		</tbody>
	  </table>
	  <table
		align="center"
		border="0"
		cellpadding="0"
		cellspacing="0"
		style="background-color: #ffffff"
		width="100%">
		<tbody>
		  <tr>
			<td align="center" height="100%" valign="top" width="100%">
			  <table
				align="center"
				border="0"
				cellpadding="0"
				cellspacing="0"
				style="max-width: 700px"
				width="100%">
				<tbody>
				  <tr>
					<td
					  align="left"
					  class="m_-2215166014366785374mobile-lr-padding-16"
					  style="
						padding-left: 8px;
						padding-right: 8px;
						padding-top: 16px;
						padding-bottom: 16px;
					  "
					  valign="middle"
					  width="100%">
					  <p
						style="
						  color: #333333;
						  font-family: BlinkMacSystemFont, -apple-system,
							Segoe UI, Roboto, Helvetica, Arial, sans-serif;
						  font-size: 16px;
						  font-weight: normal;
						  line-height: 24px;
						  margin: 0;
						">
						Hi '.$fullname.',
					  </p>
					  <table
						align="center"
						bgcolor="#FFFFFF"
						border="0"
						cellpadding="0"
						cellspacing="0"
						style="
						  padding: 0;
						  margin: 0;
						  background-color: #ffffff;
						"
						width="100%">
						<tbody>
						  <tr>
							<td
							  align="center"
							  height="16"
							  style="
								height: 16px;
								font-size: 1px;
								line-height: 1px;
								padding: 0;
							  "></td>
						  </tr>
						</tbody>
					  </table>
					  <p
						style="
						  color: #333333;
						  font-family: BlinkMacSystemFont, -apple-system,
							Segoe UI, Roboto, Helvetica, Arial, sans-serif;
						  font-size: 16px;
						  font-weight: normal;
						  line-height: 24px;
						  margin: 0;
						">
						We wanted to take a moment to express our sincere gratitude for your recent order on our museum website. We truly appreciate your patronage and are thrilled to have the opportunity to share our products with you.
					  </p>
					  <table
						align="center"
						bgcolor="#FFFFFF"
						border="0"
						cellpadding="0"
						cellspacing="0"
						style="
						  padding: 0;
						  margin: 0;
						  background-color: #ffffff;
						"
						width="100%">
						<tbody>
						  <tr>
							<td
							  align="center"
							  height="16"
							  style="
								height: 16px;
								font-size: 1px;
								line-height: 1px;
								padding: 0;
							  "></td>
						  </tr>
						</tbody>
					  </table>
					  <p
						style="
						  color: #333333;
						  font-family: BlinkMacSystemFont, -apple-system,
							Segoe UI, Roboto, Helvetica, Arial, sans-serif;
						  font-size: 16px;
						  font-weight: normal;
						  line-height: 24px;
						  margin: 0;
						">
						<em
						  class="Highlight"
						  match="chú"
						  loopnumber="53328485"
						  style="
							padding: 1px;
					  
							
							color: rgb(0, 0, 0);
							font-style: inherit;
						  "
						  >Best regards,
					  </p>
					  <p></p>
					  <p></p>
					</td>
				  </tr>
				</tbody>
			  </table>
			</td>
		  </tr>
		</tbody>
	  </table>
	  <table
		align="center"
		bgcolor="#FFFFFF"
		border="0"
		cellpadding="0"
		cellspacing="0"
		style="padding: 0; margin: 0; background-color: #ffffff"
		width="100%">
		<tbody>
		  <tr>
			<td
			  align="center"
			  height="16"
			  style="
				height: 16px;
				font-size: 1px;
				line-height: 1px;
				padding: 0;
			  "></td>
		  </tr>
		</tbody>
	  </table>
	  <table style="margin:40px auto; margin-top:-40px;">
		  <tbody>
					
		  <tr>
			  <td style="background-color:#f9fafc;padding:6px 12px;border:1px solid #003580;font-size:14px;color:#32455a;font-family:Tahoma,Arial,sans-serif;text-align:left">Total</td>
			  <td style="background-color:#f9fafc;padding:6px 12px;border:1px solid #003580;font-size:14px;color:#32455a;font-weight:bold;font-family:Tahoma,Arial,sans-serif;text-align:center">$'.number_format($total_money).'</td>
		  </tr>
		  <tr>
		  <td style="background-color:#ffffff;padding:6px 12px;border:1px solid #003580;font-size:14px;color:#32455a;font-family:Tahoma,Arial,sans-serif;text-align:left">Order Code</td>
		  <td style="background-color:#ffffff;padding:6px 12px;border:1px solid #003580;font-size:14px;color:#32455a;font-weight:bold;font-family:Tahoma,Arial,sans-serif;text-align:center">'.$codeOrder.'</td>
	  </tr>
		  <tr>
			  <td style="background-color:#ffffff;padding:6px 12px;border:1px solid #003580;font-size:14px;color:#32455a;font-family:Tahoma,Arial,sans-serif;text-align:left">Full name</td>
			  <td style="background-color:#ffffff;padding:6px 12px;border:1px solid #003580;font-size:14px;color:#32455a;font-weight:bold;font-family:Tahoma,Arial,sans-serif;text-align:center">'.$fullname.'</td>
		  </tr>
		  
		  <tr>
			  <td style="background-color:#ffffff;padding:6px 12px;border:1px solid #003580;font-size:14px;color:#32455a;font-family:Tahoma,Arial,sans-serif;text-align:left">Address</td>
			  <td style="background-color:#ffffff;padding:6px 12px;border:1px solid #003580;font-size:14px;color:#32455a;font-weight:bold;font-family:Tahoma,Arial,sans-serif;text-align:center">'.$address.'</td>
		  </tr>
		  
		  <tr>
			  <td style="background-color:#ffffff;padding:6px 12px;border:1px solid #003580;font-size:14px;color:#32455a;font-family:Tahoma,Arial,sans-serif;text-align:left">Phone Number</td>
			  <td style="background-color:#ffffff;padding:6px 12px;border:1px solid #003580;font-size:14px;color:#32455a;font-weight:bold;font-family:Tahoma,Arial,sans-serif;text-align:center">'.$phone_number.'</td>
		  </tr>
		  <tr>
		  <td style="background-color:#ffffff;padding:6px 12px;border:1px solid #003580;font-size:14px;color:#32455a;font-family:Tahoma,Arial,sans-serif;text-align:left">Note</td>
		  <td style="background-color:#ffffff;padding:6px 12px;border:1px solid #003580;font-size:14px;color:#32455a;font-weight:bold;font-family:Tahoma,Arial,sans-serif;text-align:center">'.$note.'</td>
	  </tr>
	  </tbody></table>
	  <table
		align="center"
		border="0"
		cellpadding="0"
		cellspacing="0"
		style="background-color: #ffffff"
		width="100%">
		<tbody>
		  <tr>
			<td align="center" height="100%" valign="top" width="100%">
			  <table
				align="center"
				border="0"
				cellpadding="0"
				cellspacing="0"
				style="max-width: 700px"
				width="100%">
				<tbody>
				  <tr>
					<td
					  align="center"
					  class="m_-2215166014366785374mobile-padding-16"
					  style="
						text-align: center;
						background-color: #003580;
						padding-left: 24px;
						padding-right: 24px;
						padding-top: 16px;
						padding-bottom: 16px;
					  "
					  valign="middle"
					  width="100%">
					  <p
						style="
						  color: white;
						  font-family: BlinkMacSystemFont, -apple-system,
							Segoe UI, Roboto, Helvetica, Arial, sans-serif;
						  font-size: 16px;
						  font-weight: normal;
						  line-height: 24px;
						  margin: 0;
						">
						Your gift code is
					  </p>
					  <table
						bgcolor="#F5F5F5"
						border="0"
						cellpadding="0"
						cellspacing="0"
						class="m_-2215166014366785374m-full-width"
						style="
						  background: #001e48;
						  border-radius: 2px;
						  border-collapse: separate;
						  margin-top:10px;
						  margin: 0 auto;
						">
						<tbody>
						  <tr>
							<td
							  align="center"
							  style="
								padding-left: 16px;
								padding-right: 16px;
								padding-top: 8px;
								padding-bottom: 8px;
							  ">
							  <p
								style="
								  color: white;
								  font-family: BlinkMacSystemFont,
									-apple-system, Segoe UI, Roboto, Helvetica,
									Arial, sans-serif;
								  font-size: 24px;
								  font-weight: normal;
								  line-height: 32px;
								  margin: 0;
								  letter-spacing: 3px;
								  font-weight: normal;
								">
								WWMM9W8DAF
							  </p>
							</td>
						  </tr>
						</tbody>
					  </table>
					  
					  <p
						style="
						  color: #757575;
						  font-family: BlinkMacSystemFont, -apple-system,
							Segoe UI, Roboto, Helvetica, Arial, sans-serif;
						  font-size: 14px;
						  font-weight: normal;
						  line-height: 20px;
						  margin: 0;
						"></p>
					  <p></p>
					  <p></p>
					</td>
				  </tr>
				</tbody>
			  </table>
			</td>
		  </tr>
		</tbody>
	  </table>
	  <table
		align="center"
		bgcolor="#FFFFFF"
		border="0"
		cellpadding="0"
		cellspacing="0"
		style="padding: 0; margin: 0; background-color: #ffffff"
		width="100%">
		<tbody>
		  <tr>
			<td
			  align="center"
			  height="16"
			  style="
				height: 16px;
				font-size: 1px;
				line-height: 1px;
				padding: 0;
			  "></td>
		  </tr>
		</tbody>
	  </table>
	  <table
		align="center"
		border="0"
		cellpadding="0"
		cellspacing="0"
		style="background-color: #ffffff"
		width="100%">
		<tbody>
		  <tr>
			<td align="center" height="100%" valign="top" width="100%">
			  <table
				align="center"
				border="0"
				cellpadding="0"
				cellspacing="0"
				style="max-width: 700px"
				width="100%">
				<tbody>
				  <tr>
					<td
					  align="center"
					  class="m_-2215166014366785374mobile-padding-16"
					  style="
						padding-left: 8px;
						padding-right: 8px;
						padding-top: 16px;
						padding-bottom: 16px;
						background-color: #ffffff;
					  "
					  valign="middle"
					  width="100%">
					  <table
						align="center"
						border="0"
						cellpadding="0"
						cellspacing="0"
						width="100%">
						<tbody>
						  <tr>
							<td>
							  
							</td>
						  </tr>
						</tbody>
					  </table>
					</td>
				  </tr>
				</tbody>
			  </table>
			</td>
		  </tr>
		</tbody>
	  </table>
	  
	  <table
		align="center"
		bgcolor="#FFFFFF"
		border="0"
		cellpadding="0"
		cellspacing="0"
		style="padding: 0; margin: 0; background-color: #ffffff"
		width="100%">
		<tbody>
		  <tr>
			<td
			  align="center"
			  height="32"
			  style="
				height: 32px;
				font-size: 1px;
				line-height: 1px;
				padding: 0;
			  "></td>
		  </tr>
		</tbody>
	  </table>
	  <table
		align="center"
		border="0"
		cellpadding="0"
		cellspacing="0"
		style="background-color: #ffffff"
		width="100%">
		<tbody>
		  <tr>
			<td align="center" height="100%" valign="top" width="100%">
			  <table
				align="center"
				border="0"
				cellpadding="0"
				cellspacing="0"
				class="m_-2215166014366785374mobile-container"
				style="max-width: 700px"
				width="700">
				<tbody>
				  <tr>
					<td
					  align="center"
					  style="
						border-top: 1px solid #e6e6e6;
						padding-top: 32px;
						padding-bottom: 32px;
					  ">
					  <table
						align="center"
						border="0"
						cellpadding="0"
						cellspacing="0"
						width="100%">
						<tbody>
						  <tr>
							<th
							  align="left"
							  class="m_-2215166014366785374mobile-lr-padding-16"
							  style="padding-right: 8px"
							  valign="top"
							  width="24">
							  
							</th>
							<th
							  align="left"
							  class="m_-2215166014366785374mobile-padding-right-16"
							  style="padding-left: 8px; padding-right: 8px"
							  width="100%">
							  <table
								align="center"
								border="0"
								cellpadding="0"
								cellspacing="0"
								style="background-color: #ffffff"
								width="100%">
								<tbody>
								  <tr>
									<td
									  align="center"
									  height="100%"
									  valign="top"
									  width="100%">
									  <table
										align="center"
										border="0"
										cellpadding="0"
										cellspacing="0"
										style="max-width: 700px"
										width="100%">
										<tbody>
										  <tr>
											<td
											  align="left"
											  style="
												padding-left: 0px;
												padding-right: 0px;
												padding-top: 0px;
												padding-bottom: 0px;
											  "
											  valign="middle"
											  width="100%">
											  <p
												style="
												  color: #262626;
												  font-family: BlinkMacSystemFont,
													-apple-system, Segoe UI,
													Roboto, Helvetica, Arial,
													sans-serif;
												  font-size: 14px;
												  font-weight: normal;
												  line-height: 20px;
												  margin: 0;
												">
												<strong
												  style="font-weight: bold"
												  >Special Announcement:</strong
												>
												 Please note that due to the spread of the coronavirus (COVID-19), some destinations may have travel restrictions in place. We advise you to follow all travel advisories from your local government and health organizations, or consider booking with one of our accommodations that offer free cancellation options.
												
											  </p>
											</td>
										  </tr>
										</tbody>
									  </table>
									</td>
								  </tr>
								</tbody>
							  </table>
							</th>
						  </tr>
						</tbody>
					  </table>
					</td>
				  </tr>
				</tbody>
			  </table>
			</td>
		  </tr>
		</tbody>
	  </table>
	  <table
		align="center"
		bgcolor="#FFFFFF"
		border="0"
		cellpadding="0"
		cellspacing="0"
		style="padding: 0; margin: 0; background-color: #ffffff"
		width="100%">
		<tbody>
		  <tr>
			<td
			  align="center"
			  height="16"
			  style="
				height: 16px;
				font-size: 1px;
				line-height: 1px;
				padding: 0;
			  "></td>
		  </tr>
		</tbody>
	  </table>
	  <table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tbody>
		  <tr>
			<td
			  align="center"
			  height="100%"
			  style="background-color: #f5f5f5; border-top: solid 1px #e6e6e6"
			  valign="top"
			  width="100%">
			  <table
				align="center"
				border="0"
				cellpadding="0"
				cellspacing="0"
				style="max-width: 700px"
				width="100%">
				<tbody>
				  <tr>
					<td
					  align="center"
					  style="padding: 0px 8px"
					  valign="middle">
					  <table
						align="center"
						border="0"
						cellpadding="0"
						cellspacing="0"
						style="max-width: 700px"
						width="100%">
						<tbody>
						  <tr>
							<td>
							  <table
								align="center"
								border="0"
								cellpadding="0"
								cellspacing="0"
								class="m_-2215166014366785374deviceWidth"
								width="100%">
								<tbody>
								  <tr>
									<td style="padding: 48px 0px">
									  <table
										align="center"
										border="0"
										cellpadding="0"
										cellspacing="0"
										class="m_-2215166014366785374deviceWidth"
										style="margin: 0 auto"
										width="100%">
										<tbody>
										  <tr>
											<td
											  align="left"
											  class="m_-2215166014366785374appleLinksBlack"
											  style="
												font-size: 20px;
												line-height: 28px;
												font-weight: bold;
												font-family: BlinkMacSystemFont,
												  -apple-system, Segoe UI,
												  Roboto, Helvetica, Arial,
												  sans-serif;
												text-align: left;
												color: #000000;
											  ">
											  <span class="il">Ecocenter</span
											  >.com
											</td>
										  </tr>
										  <tr>
											<td
											  align="left"
											  class="m_-2215166014366785374appleLinksBlack"
											  style="
												font-size: 14px;
												line-height: 20px;
												font-weight: normal;
												font-family: BlinkMacSystemFont,
												  -apple-system, Segoe UI,
												  Roboto, Helvetica, Arial,
												  sans-serif;
												text-align: left;
												padding: 12px 0;
												color: #000000;
											  ">
											  599 Le Duan, District 1, Ho Chi Minh City
											</td>
										  </tr>
										  <tr>
											<td>
											  <table
												align="left"
												border="0"
												cellpadding="0"
												cellspacing="0"
												class="m_-2215166014366785374deviceWidth"
												style="margin: 0 auto"
												width="100%">
												<tbody>
												  <tr>
													<td align="left">
													  <table
														align="left"
														border="0"
														cellpadding="0"
														cellspacing="0"
														class="m_-2215166014366785374m-stack"
														style="
														  margin: 0 auto;
														">
														<tbody>
														  <tr>
															<td
															  align="left"
															  class="m_-2215166014366785374footer_link_padding"
															  style="
																text-align: left;
																padding: 8px 0
																  0;
																font-size: 14px;
																line-height: 20px;
																font-weight: normal;
																font-family: BlinkMacSystemFont,
																  -apple-system,
																  Segoe UI,
																  Roboto,
																  Helvetica,
																  Arial,
																  sans-serif;
																color: #000000;
																white-space: nowrap;
															  ">
															  <a
																href="https://s.sg.booking.com/ss/c/mAR-wjb629EennCqTv6fP--WT8LI0RTmLZcGVxrlGvRl0WiOlSXIP-WycTGGDVQTauWv8o9AiqRv7tB4DJ0m1I5AMjfnYWhSiMf8_emKQ0nAVUfjO_E2-L_1m5kCZ_zbawRsGgpRJXMEwCUKx_2czwz4VVtBzN9GqTC6iX9zYSmKb0wivarGg4PH9SEKE6hqL705GeHyHIYkuyIy921iyQ/3v8/DbQ9rQTUQkKdQMU0o14dgw/h3/gtYGxeZvt19GvgsnsNR7k5fgv8OKnN9t4bFZaHZ58r4"
																style="
																  color: #000000;
																  text-decoration: underline;
																"
																target="_blank"
																data-saferedirecturl="https://www.google.com/url?q=https://s.sg.booking.com/ss/c/mAR-wjb629EennCqTv6fP--WT8LI0RTmLZcGVxrlGvRl0WiOlSXIP-WycTGGDVQTauWv8o9AiqRv7tB4DJ0m1I5AMjfnYWhSiMf8_emKQ0nAVUfjO_E2-L_1m5kCZ_zbawRsGgpRJXMEwCUKx_2czwz4VVtBzN9GqTC6iX9zYSmKb0wivarGg4PH9SEKE6hqL705GeHyHIYkuyIy921iyQ/3v8/DbQ9rQTUQkKdQMU0o14dgw/h3/gtYGxeZvt19GvgsnsNR7k5fgv8OKnN9t4bFZaHZ58r4&amp;source=gmail&amp;ust=1681301335349000&amp;usg=AOvVaw1UvGF8_tiw5qzhQb-SW7fN"
																>Subsribe</a
															  >&nbsp;&nbsp;
															</td>
														  </tr>
														</tbody>
													  </table>
													  <table
														align="left"
														border="0"
														cellpadding="0"
														cellspacing="0"
														class="m_-2215166014366785374m-stack"
														style="
														  margin: 0 auto;
														">
														<tbody>
														  <tr>
															<td
															  align="left"
															  class="m_-2215166014366785374footer_link_padding"
															  style="
																text-align: left;
																padding: 8px 0
																  0;
																font-size: 14px;
																line-height: 20px;
																font-weight: normal;
																font-family: BlinkMacSystemFont,
																  -apple-system,
																  Segoe UI,
																  Roboto,
																  Helvetica,
																  Arial,
																  sans-serif;
																color: #000000;
																white-space: nowrap;
															  ">
															  <a
																href="https://s.sg.booking.com/ss/c/mAR-wjb629EennCqTv6fP--WT8LI0RTmLZcGVxrlGvRl0WiOlSXIP-WycTGGDVQTauWv8o9AiqRv7tB4DJ0m1I5AMjfnYWhSiMf8_emKQ0nAVUfjO_E2-L_1m5kCZ_zbawRsGgpRJXMEwCUKx_2czwz4VVtBzN9GqTC6iX9zYSk9Es6qSBXaiwPmkqdpeOeulIGJSBjaZV_EVdIDV5hnhQ/3v8/DbQ9rQTUQkKdQMU0o14dgw/h4/Ur4wbI2SL39wOGMpSvgTzhRY844925hs2tamiO6no8U"
																style="
																  color: #000000;
																  text-decoration: underline;
																"
																target="_blank"
																data-saferedirecturl="https://www.google.com/url?q=https://s.sg.booking.com/ss/c/mAR-wjb629EennCqTv6fP--WT8LI0RTmLZcGVxrlGvRl0WiOlSXIP-WycTGGDVQTauWv8o9AiqRv7tB4DJ0m1I5AMjfnYWhSiMf8_emKQ0nAVUfjO_E2-L_1m5kCZ_zbawRsGgpRJXMEwCUKx_2czwz4VVtBzN9GqTC6iX9zYSk9Es6qSBXaiwPmkqdpeOeulIGJSBjaZV_EVdIDV5hnhQ/3v8/DbQ9rQTUQkKdQMU0o14dgw/h4/Ur4wbI2SL39wOGMpSvgTzhRY844925hs2tamiO6no8U&amp;source=gmail&amp;ust=1681301335349000&amp;usg=AOvVaw3_mjGPBm5gtZgRAFdGbMgZ"
																>Update preferences</a
															  >&nbsp;&nbsp;
															</td>
														  </tr>
														</tbody>
													  </table>
													  <table
														align="left"
														border="0"
														cellpadding="0"
														cellspacing="0"
														class="m_-2215166014366785374m-stack"
														style="
														  margin: 0 auto;
														">
														<tbody>
														  <tr>
															<td
															  align="left"
															  class="m_-2215166014366785374footer_link_padding"
															  style="
																text-align: left;
																padding: 8px 0
																  0;
																font-size: 14px;
																line-height: 20px;
																font-weight: normal;
																font-family: BlinkMacSystemFont,
																  -apple-system,
																  Segoe UI,
																  Roboto,
																  Helvetica,
																  Arial,
																  sans-serif;
																color: #000000;
																white-space: nowrap;
															  ">
															  <a
																href="https://s.sg.booking.com/ss/c/mAR-wjb629EennCqTv6fPzgT3mHoyE_YgPV1X-67LE84W7ct3vbtNW3xIZq3imkm/3v8/DbQ9rQTUQkKdQMU0o14dgw/h5/o9CnGUwjvu_Y2sbcmVQlXlYRxrmOBM9JwAeJB0kfV-s"
																style="
																  color: #000000;
																  text-decoration: underline;
																"
																target="_blank"
																data-saferedirecturl="https://www.google.com/url?q=https://s.sg.booking.com/ss/c/mAR-wjb629EennCqTv6fPzgT3mHoyE_YgPV1X-67LE84W7ct3vbtNW3xIZq3imkm/3v8/DbQ9rQTUQkKdQMU0o14dgw/h5/o9CnGUwjvu_Y2sbcmVQlXlYRxrmOBM9JwAeJB0kfV-s&amp;source=gmail&amp;ust=1681301335349000&amp;usg=AOvVaw1EQi8BKTY-nVUi8mAJ_Tpe"
																>Customer Service</a
															  >&nbsp;&nbsp;
															</td>
														  </tr>
														</tbody>
													  </table>
													  <table
														align="left"
														border="0"
														cellpadding="0"
														cellspacing="0"
														class="m_-2215166014366785374m-stack"
														style="
														  margin: 0 auto;
														">
														<tbody>
														  <tr>
															<td
															  align="left"
															  class="m_-2215166014366785374footer_link_padding"
															  style="
																text-align: left;
																padding: 8px 0
																  0;
																font-size: 14px;
																line-height: 20px;
																font-weight: normal;
																font-family: BlinkMacSystemFont,
																  -apple-system,
																  Segoe UI,
																  Roboto,
																  Helvetica,
																  Arial,
																  sans-serif;
																color: #000000;
																white-space: nowrap;
															  ">
															  <a
																href="https://s.sg.booking.com/ss/c/mAR-wjb629EennCqTv6fP8dDX-Pn4Wf9XdQbOTxf_SavmI8r4EmQ51lhbCZJXdKG6RcucKUI2uwrRyrGZ6S5AJs5s1wCiKiq4sBKIFTHoxw/3v8/DbQ9rQTUQkKdQMU0o14dgw/h6/LCZDVZFgxeE0zPBQEdsgbKXFBL1-oBc7TF4Pjp15vEc"
																style="
																  color: #000000;
																  text-decoration: underline;
																"
																target="_blank"
																data-saferedirecturl="https://www.google.com/url?q=https://s.sg.booking.com/ss/c/mAR-wjb629EennCqTv6fP8dDX-Pn4Wf9XdQbOTxf_SavmI8r4EmQ51lhbCZJXdKG6RcucKUI2uwrRyrGZ6S5AJs5s1wCiKiq4sBKIFTHoxw/3v8/DbQ9rQTUQkKdQMU0o14dgw/h6/LCZDVZFgxeE0zPBQEdsgbKXFBL1-oBc7TF4Pjp15vEc&amp;source=gmail&amp;ust=1681301335349000&amp;usg=AOvVaw12dUuFbLhonp6TMMtNMODM"
																>Privacy policy</a
															  >&nbsp;&nbsp;
															</td>
														  </tr>
														</tbody>
													  </table>
													</td>
												  </tr>
												</tbody>
											  </table>
											</td>
										  </tr>
										  <tr>
											<td
											  align="left"
											  style="
												padding-top: 24px;
												padding-bottom: 24px;
											  ">
											  <table
												align="left"
												border="0"
												cellpadding="0"
												cellspacing="0"
												class="m_-2215166014366785374deviceWidth"
												style="margin: 0 auto"
												width="100%">
												<tbody>
												  <tr>
													<td
													  style="
														font-size: 14px;
														line-height: 20px;
														font-weight: normal;
														font-family: BlinkMacSystemFont,
														  -apple-system,
														  Segoe UI, Roboto,
														  Helvetica, Arial,
														  sans-serif;
														color: #000000;
														text-decoration: none;
													  ">
													  Help you explore history
													</td>
												  </tr>
												</tbody>
											  </table>
											</td>
										  </tr>
										  <tr>
											<td
											  align="left"
											  style="
												padding-top: 24px;
												border-top: 1px solid #e6e6e6;
											  ">
											  <table
												align="left"
												border="0"
												cellpadding="0"
												cellspacing="0"
												class="m_-2215166014366785374deviceWidth"
												style="margin: 0 auto"
												width="100%">
												<tbody>
												  <tr>
													<td
													  style="
														font-size: 14px;
														line-height: 20px;
														font-weight: normal;
														font-family: BlinkMacSystemFont,
														  -apple-system,
														  Segoe UI, Roboto,
														  Helvetica, Arial,
														  sans-serif;
														color: #000000;
														text-decoration: none;
													  ">
													  Lets provide your gift code
													  <em
														class="Highlight"
														match="chú"
														loopnumber="53328485"
														style="
														  padding: 1px;
														  
														  font-style: inherit;
														"
														>We use our cookies
													  <a
														href="#"
														style="color: #0071c2"
														target="_blank"
														data-saferedirecturl="#"
														>Cookie Policy</a
													  >
												  
													</td>
												  </tr>
												</tbody>
											  </table>
											</td>
										  </tr>
										</tbody>
									  </table>
									</td>
								  </tr>
								</tbody>
							  </table>
							</td>
						  </tr>
						</tbody>
					  </table>
					</td>
				  </tr>
				</tbody>
			  </table>
			</td>
		  </tr>
		</tbody>
	  </table>
	</td>
  </tr>';
	$mail->sendMail($titleMail,$descMail,$addressMail,$fullname);
	unset($_SESSION['cart']);
}
}
function updateCart() {
	$id = getPost('id');
	$num = getPost('num');

	if(!isset($_SESSION['cart'])) {
		$_SESSION['cart'] = [];
	}

	for($i=0;$i<count($_SESSION['cart']);$i++) {
		if($_SESSION['cart'][$i]['id'] == $id) {
			$_SESSION['cart'][$i]['num'] = $num;
			if($num <= 0) {
				array_splice($_SESSION['cart'], $i, 1);
			}
			break;
		}
	}
}
function addToCart() {
    $id = getPost('id');
    $num = getPost('num');

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    $isFind = false;

    // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
    foreach ($_SESSION['cart'] as $i => $item) {
        if ($item['id'] == $id) {
            $_SESSION['cart'][$i]['num'] += $num;
            $isFind = true;
            break;
        }
    }
    // Nếu sản phẩm chưa tồn tại trong giỏ hàng, thêm sản phẩm đó vào giỏ hàng
    if (!$isFind) {
        $sql = "SELECT product.*, category.name AS category_name FROM product LEFT JOIN category ON product.category_id = category.id WHERE product.id = $id";
        $product = executeResult($sql, true);
        $product['num'] = $num;
        $_SESSION['cart'][] = $product;
    }
}
function completeCheckoutTicket(){
	$codeTicket = generateRandomCode(3).strval(time());
	$fullname = getPost('name_ticket');
	$email = getPost('email_ticket');
	$phone_number = getPost('phone_number_ticket');
	$num_adults = getPost('num_adult');
	$num_childs = getPost('num_child');
	$ticketDate = date('Y-m-d H:i:s');
	$priceTotal = $num_adults*20.95 + $num_childs*10.95;
	$sql = "INSERT INTO ticket(status, qty_childs, qty_adults, price_total, name, email, telephone, code, created_at) VALUES ('1','$num_childs','$num_adults','$priceTotal','$fullname','$email','$phone_number','$codeTicket','$ticketDate')";
	execute($sql);
	$mail = new Mailer();
	$titleMail = "Confirm Ticket from ECO CENTER";
	$addressMail = $email;
	$descMail = '
    <div
      style="
        margin: 0 auto;
        border: 2px solid #ecf3fb;
        width: 700px;
        padding: 10px;
      ">
      <table style="width: 100%">
        <tbody>
          <tr>
            <td>
              <table style="width: 100%">
                <tbody>
                  <tr>
                    <td colspan="2">
                      <h2><span class="il">ECO</span> CENTER</h2>
                      <p>
                        <span class="il">Eco Center</span> Sai Gon<br />599 Le Duan, District 1, Ho Chi Minh City
                      <br />(+84) 93515 3639
                      </p>
                      <p style="color: #121F6A; font-size: 16px">
                        YOUR TICKET ORDER IS COMPLETED
                      </p>
                      <p style="font-size: 20px; font-weight: bold">
                        TICKET CODE: '.$codeTicket.'
                      </p>
                    </td>
                  </tr>
                  <tr>
                    <td style="padding: 4px">EXHIBITION</td>
                    <td style="padding: 4px; width: 75%">
                      : EXPLORE ALL CENTER
                    </td>
                  </tr>
                  <tr>
                    <td style="padding: 4px">TIME</td>
                    <td style="padding: 4px">: '.$ticketDate.'</td>
                  </tr>
                  <tr>
                    <td style="padding: 4px">FULL NAME</td>
                    <td style="padding: 4px">: '.$fullname.'</td>
                  </tr>
                  <tr>
                    <td style="padding: 4px">PHONE</td>
                    <td style="padding: 4px">
                      : <span class="il">'.$phone_number.'
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
            <td style="width: 200px; text-align: center; vertical-align: top">
              <img
                src="https://i.ibb.co/yFQGzCh/logoblue.png"
                style="width: 100%"
                title="Cinestar"
                class="CToWUd a6T"
                data-bit="iit"
                tabindex="0" />
              <div
                class="a6S"
                dir="ltr"
                style="opacity: 0.01; left: 661px; top: 75.2px">
                <div
                  id=":1qo"
                  class="T-I J-J5-Ji aQv T-I-ax7 L3 a5q"
                  role="button"
                  tabindex="0"
                  aria-label="Tải xuống tệp đính kèm "
                  jslog="91252; u014N:cOuCgd,Kr2w4b,xr6bB; 4:WyIjbXNnLWY6MTY5NTI2Mzc2OTQwNzA4MTQ0MyIsbnVsbCxbXV0."
                  data-tooltip-class="a1V"
                  data-tooltip="Tải xuống">
                  <div class="akn"><div class="aSK J-J5-Ji aYr"></div></div>
                </div>
              </div>
              <br />
              <img
                src="https://ci4.googleusercontent.com/proxy/G1I1CEnlEE0iLh3yDTiNPOK16PWCaMq5kFZ7C8PxNvWotRgdDEfmWh-P5hWqzDdcB0HMkR0ybICGCZU5oDnPjuj6j_aQN3zoAlbB7iRHXuOk-7SB5DlILhg2YuGjNzB2QQ=s0-d-e1-ft#https://chart.googleapis.com/chart?chs=150x150&amp;cht=qr&amp;chl=148740483&amp;choe=UTF-8"
                title="barcode"
                class="CToWUd"
                data-bit="iit" />
            </td>
          </tr>
        </tbody>
      </table>
      <br />
      <table style="width: 100%; border-collapse: collapse">
        <tbody>
          <tr style="padding: 8px; background-color: #121F6A">
            <td
              style="
                text-align: center;
                color: #fff;
                padding: 8px;
                border: 1px solid #ccc;
              ">
              STT
            </td>
            <td
              style="
                text-align: center;
                color: #fff;
                padding: 8px;
                border: 1px solid #ccc;
              ">
              TICKET
            </td>
            <td
              style="
                text-align: center;
                color: #fff;
                padding: 8px;
                border: 1px solid #ccc;
              ">
              QUALITY
            </td>
            <td
              style="
                text-align: center;
                color: #fff;
                padding: 8px;
                border: 1px solid #ccc;
              ">
              PRICE
            </td>
            <td
              style="
                text-align: right;
                color: #fff;
                padding: 8px;
                border: 1px solid #ccc;
              ">
              TOTAL ($)
            </td>
          </tr>
          <tr>
            <td
              style="text-align: center; padding: 8px; border: 1px solid #ccc">
              1
            </td>
            <td style="text-align: center; padding: 8px; border: 1px solid #ccc">
              ALDULT
            </td>
            <td style="text-align: center; padding: 8px; border: 1px solid #ccc">
              '.$num_adults.'
            </td>
            <td style="text-align: center; padding: 8px; border: 1px solid #ccc">
              $20.95
            </td>
            <td style="text-align: right; padding: 8px; border: 1px solid #ccc">
              $'.number_format($num_adults*20.95).'
            </td>
          </tr>
          <tr>
            <td
              style="text-align: center; padding: 8px; border: 1px solid #ccc">
              1
            </td>
            <td style="text-align: center; padding: 8px; border: 1px solid #ccc">
              CHILDREN
            </td>
            <td style="text-align: center; padding: 8px; border: 1px solid #ccc">
             '.$num_childs.'
            </td>
            <td style="text-align: center; padding: 8px; border: 1px solid #ccc">
			$10.95
            </td>
            <td style="text-align: right; padding: 8px; border: 1px solid #ccc">
			$'.number_format($num_childs*10.95).'
            </td>
          </tr>
          <tr style="background-color: #121F6A">
            <td
              colspan="4"
              style="
                text-align: left;
                padding: 8px;
                color: #fff;
                border: 1px solid #ccc;
              ">
              TOTAL PRICE
            </td>
            <td
              style="
                text-align: right;
                color: #fff;
                padding: 8px;
                border: 1px solid #ccc;
              ">
              $'.$priceTotal.'
            </td>
          </tr>
        </tbody>
      </table>
      <p style="margin-top:10px;">
        Thank you for choosing us at <span class="il">Eco Center</span>. Have fun at our museum
      </p>
      <div class="yj6qo"></div>
      <div class="adL"></div>
    </div>
';
	$mail->sendMail($titleMail,$descMail,$addressMail,$fullname);
}
?>