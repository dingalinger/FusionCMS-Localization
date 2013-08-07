<?php
// here is config
$zpid = 'zp.xxxxx';
$backurl = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'];
$sitename = 'نام سايت شما';

//here is bodey
echo '<html dir="rtl">
	  <head>
	  <title>'.$sitename.'</title>
	  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	  </head>
	  <body>';
if(isset($_GET['au'])){
echo '<div class="fname">
	  بازگشت از عمليات پرداخت، با موفقيت انجام شد.
	  <br />
	  <a href="http://'.$_SERVER['SERVER_NAME'].'">مشاهده سايت '.$sitename.'</a></div>';
	  exit();
}
if(isset($_POST['submit'])){
	$desc = 'نام محصول: '.$_POST['product_name'].'
	کد محصول: '.$_POST['product_id'].'
	سفارش دهنده: '.$_POST['name'].'
	ايميل مشتری: '.$_POST['email'].'
	تلفن مشتری: '.$_POST['tel'].'
	آدرس مشتری: '.$_POST['address'].'
	کد پستی: '.$_POST['postalcode'];
	
	
	echo '<div class="fname"><label for="lname">نام محصول: </label>'.$_POST['product_name'].'</div>'.
	'<div class="fname"><label for="lname">کد محصول: </label>'.$_POST['product_id'].'</div>'.
	'<div class="fname"><label for="lname">قيمت: </label>'.$_POST['price'].' تومان</div>'.
	'<div class="fname"><label for="lname">سفارش دهنده: </label>'.$_POST['name'].'</div>'.
	'<div class="fname"><label for="lname">ايميل مشتری: </label>'.$_POST['email'].'</div>'.
	'<div class="fname"><label for="lname">تلفن مشتری: </label>'.$_POST['tel'].'</div>'.
	'<div class="fname"><label for="lname">آدرس مشتری: </label>'.$_POST['address'].'</div>'.
	'<div class="fname"><label for="lname">کد پستی: </label>'.$_POST['postalcode'].'</div>'.
	'<div class="fname"><label for="lname">تاييد اطلاعات: </label>چنانچه اطلاعات فوق را تاييد ميکنيد، عمليات پرداخت را از طريق دروازه زرين پال، انجام دهيد.</div>'.
	'<form action="https://www.zarinpal.com/webservice/Simplepay" method="post" id="TransactionAddForm">
	<input type="hidden" id="TransactionAccountID" value="'.$zpid.'" name="data[Transaction][account_id]">
	<input type="hidden" id="TransactionAmount" value="'.$_POST['price'].'" name="data[Transaction][amount]">
	<input type="hidden" id="TransactionDesc" value="'.$desc.'" name="data[Transaction][desc]">
	<input type="hidden" id="TransactionRedirectUrl" value="'.$backurl.'" name="data[Transaction][redirect_url]">
	<div class="submit"><input type="image" src="http://www.zarinpal.com/img/merchant/merchant-6.png"></div>
	</form>';
}
else{
	echo '<form method="post"><input type="hidden" name="product_name" value="'.$_GET['product_name'].'"><input type="hidden" name="product_id" value="'.$_GET['product_id'].'"><input type="hidden" name="price" value="'.$_GET['price'].'">'.
	'<div class="fname"><label for="lname">نام محصول: </label>'.$_GET['product_name'].'</div>'.
	'<div class="fname"><label for="lname">کد محصول: </label>'.$_GET['product_id'].'</div>'.
	'<div class="fname"><label for="lname">قيمت: </label>'.$_GET['price'].' تومان</div>'.
	'<div class="fname"><label for="lname">سفارش دهنده: </label><input type="text" name="name"></div>'.
	'<div class="fname"><label for="lname">ايميل مشتری: </label><input type="text" dir="ltr" name="email"></div>'.
	'<div class="fname"><label for="lname">تلفن مشتری: </label><input type="text" dir="ltr" name="tel"></div>'.
	'<div class="fname"><label for="lname">آدرس مشتری: </label><input type="text" name="address"></div>'.
	'<div class="fname"><label for="lname">کد پستی: </label><input type="text" name="postalcode"></div>'.
	'<div class="submit"><input type="submit" name="submit" value="ادامه عمليات خريد"></form></div>';
}

echo '</body>
	  </html>';
?>