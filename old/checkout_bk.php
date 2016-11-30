<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Checkout</title>
</head>
<body>	
<?php
	include_once 'BaoKimPayment.php';
	/*
	 * Lưu thông tin giỏ hàng vào database.
	 * Sau khi lưu xong sẽ có mã đơn hàng. Chương trình demo này không thực hiện việc lưu 
	 * vào database mà chỉ tạo ra 1 mã đơn hàng ngẫu nhiên.
	 */
	 
	$total_amount = $_POST['total_amount'];
	$order_id = time();
	$business = "thanglongmedia2010@gmail.com";
	$description = "Thanh toán".$order_id;
	$order_description = "Thanh toán";
	$shipping_fee = 0; //Nếu tính thêm phí vận chuyển thì thiết lập tại đây
	$tax_fee = 0; //Nếu tính thêm phí thuế thì thiết lập tại đây
	$url_success = 'http://visichat-thanhtoan.com';//URL callback khi thanh toán thành công để update thông tin 
	$url_cancel = 'http://visichat-thanhtoan.com'; //Url khi click link "Tôi không muốn thanh toán đơn hàng này" trên cổng thanh toán Bảo Kim
	$url_detail = ''; //Url chứa thông tin chi tiết đơn hàng
	
	$baokim = new BaoKimPayment();
	$request_url = $baokim->createRequestUrl($order_id, $business, $total_amount, $shipping_fee, $tax_fee, $order_description, $url_success, $url_cancel, $url_detail);
	echo "<meta http-equiv='refresh' content='0;url=$request_url' />";
?>
</body>
</html>