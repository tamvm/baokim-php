<?php
require_once('constants.php');
require_once('baokim_payment_pro.php');
require_once('baokim_payment.php');

$baokim = new BaoKimPaymentPro();
$banks = $baokim->get_seller_info();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Payment</title>
	<meta content="index, follow" name="robots"/>
	<meta content="" name="description"/>
	<meta content="" name="keywords"/>
	<meta name="ROBOTS" content="index, follow"/>

	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
	<link type="text/css" rel="stylesheet" href="css/bootstrap-responsive.css"/>
	<link type="text/css" rel="stylesheet" href="css/main.css"/>
	<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.number.js"></script>

</head>

<body>
<div id="wrapper">
	<!-- nav -->
	<div class="nav">
		<div class="nav_title">Phương thức thanh toán</div>
	</div>
	<!--/ end nav -->

	<!-- payment -->
	<div class="payment_list">
		<div id="select_payment">
			<form method="post" action="" id="form-action">
				<div class="row-fluid customer_info ">
					<div class="info">
						<span class="title">Thông tin người thanh toán<!--<img src="images/safe.png" border="0" style="vertical-align: bottom; margin-left: 5px;" />--></span>
						<dl class="dl-horizontal">
							<dt>Họ tên:</dt>
							<dd><input type="text" name="payer_name"></dd>
							<dt>Số điện thoại:</dt>
							<dd><input type="text" name="payer_phone_no"></dd>
							<dt>Email:</dt>
							<dd><input type="text" name="payer_email"></dd>
							<dt>Địa chỉ:</dt>
							<dd><input type="text" name="address"></dd>
							<dt>Số tiền thanh toán:</dt>
							<dd><input id="total_amount" type="text" name="total_amount"></dd>
						</dl>
					</div>
				</div>
				<div class="method row-fluid" id="2">
					<div class="icon"><img src="images/creditcard.png" border="0"/></div>
					<div class="info">
						<span class="title">Thanh toán trực tuyến bằng thẻ quốc tế <!--<img src="images/safe.png" border="0" style="vertical-align: bottom; margin-left: 5px;" />--></span>

						<div class="bank_list">
							<ul id="b_l">
								<?php echo $baokim->generateBankImage($banks,PAYMENT_METHOD_TYPE_CREDIT_CARD); ?>
							</ul>
							<div class="clr"></div>
						</div>
					</div>
					<div class="check_box"></div>
				</div>

				<div class="row-fluid method" id="3">
					<div class="icon"><img src="images/transfer.png" border="0"/></div>
					<div class="info">
						<span class="title">Chuyển khoản InternetBanking</span>
						<span class="desc">Chọn ngân hàng thanh toán</span>

						<div class="bank_list">
							<ul id="b_l">
								<?php echo $baokim->generateBankImage($banks,PAYMENT_METHOD_TYPE_INTERNET_BANKING); ?>
							</ul>
						</div>
					</div>
					<div class="check_box"></div>
				</div>
				<div class="row-fluid method" id="1">
					<div class="icon"><img src="images/atm.png" border="0"/></div>
					<div class="info">
						<span class="title">Thanh toán trực tuyến bằng thẻ ATM nội địa</span>
						<span class="desc">Chọn ngân hàng thanh toán</span>

						<div class="bank_list">
							<ul id="b_l">
								<?php echo $baokim->generateBankImage($banks,PAYMENT_METHOD_TYPE_LOCAL_CARD); ?>
							</ul>
							<div class="clr"></div>
						</div>
					</div>
					<div class="check_box"></div>
				</div>

				<div class="row-fluid method" id="0">
					<div class="icon"><img src="images/sercurity.png" border="0"/></div>
					<div class="info">
						<div class="bk_logo"><a href="http://baokim.vn" target="_blank"><img
									src="images/bk_logo.png" border="0"/></a></div>
						<span class="title">Thanh toán Bảo Kim</span>
						<span class="desc">Thanh toán bằng tài khoản Bảo Kim (Baokim.vn)</span>
					</div>
					<div class="check_box"></div>
				</div>
				<!---<li class="mode">
					<div class="info1">
						<span class="title">Hình thức thanh toán</span>

						<div class="payment-mode">
							<input type="radio" checked="true" class="input-mode" name="payment_mode" value="1">								<span class="desc-mode">Thanh toán trực tiếp</span>
						</div>

						<div class="payment-mode">
							<input type="radio" class="input-mode" name="payment_mode" value="2" >								<span class="desc-mode">Thanh toán an toàn</span>
						</div>
						<div id="daykeep" >
							<span class="desc-mode" style="margin-right:5px;">Số ngày tạm giữ</span>
							<select name="escrow_timeout" class="daykeep">
								<option value=3>3 ngày</option>
								<option value=5>5 ngày</option>
								<option value=7>7 ngày</option>
							<select>
						</div>
					</div>

				</li>--->


				<input type="hidden" name="active_submit" value="submit"/>
				<input type="hidden" name="bank_payment_method_id" id="bank_payment_method_id" value=""/>
				<input type="hidden" name="shipping_address" size="30" value="Hà Nội"/>
				<input type="hidden" name="payer_message" size="30" value="Ok"/>
				<input type="hidden" name="extra_fields_value" size="30" value=""/>
				<input type="hidden" name="extra_payment" id="extra_payment" value=""/>

				<div class="submit">
					<input type="submit" class="btn btn-success pm_submit" name="submit" value="Hoàn thành"/>
				</div>
			</form>
		</div>

	</div>
	<!--/ end payment -->
</div>
<script>
	$("#total_amount").number( true, 0 , ',','.' );
	$(function () {
		$('.method').click(function () {
			$(this).siblings().children().find('img').removeClass('img-active');
			$('.method').removeClass('selected');
			$('.check_box').removeClass('checked_box');
			$(this).addClass('selected');
			$('.selected .check_box').addClass('checked_box');
			var method = $(this).attr('id');
			if (method != 0) {
				//$('.mode').css('display','block');
				$('.info1').slideDown();
				$('.selected img').click(function () {
					$('.method img').removeClass('img-active');
					$(this).addClass('img-active');
					var id = $(this).attr('id');
					$('#bank_payment_method_id').val(id);

				});
			}
			else {
				//$('.mode').css('display','none');
				$('.info1').slideUp('slow');
				$('.method img').removeClass('img-active');
			}
			$('#form-action').attr('action', 'request.php');
		});

		$('.input-mode').click(function () {
			var a = $(this).val();
			if (a == 2) {
				$('#daykeep').css('display', 'block');
			}
			if (a == 1) {
				$('#daykeep').css('display', 'none');
			}

		});
	});
</script>
</body>
</html>
