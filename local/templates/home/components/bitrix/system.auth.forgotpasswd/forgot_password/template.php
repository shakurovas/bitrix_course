<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><?

ShowMessage($arParams["~AUTH_RESULT"]);
// echo '<pre>';
// print_r($arResult);
// echo '</pre>';
print_r('Hello!');
?>


<div class="site-section">
	<div class="container">
		<div class="row">
	
			<div class="col-md-12 col-lg-8 mb-5">
			
			
			
			<form name="bform" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>" class="p-5 bg-white border">

				<div class="row form-group">
				<div class="col-md-12 mb-3 mb-md-0">
					<label class="font-weight-bold" for="fullname">Full Name</label>
					<input type="text" id="fullname" class="form-control" placeholder="Full Name">
				</div>
				</div>
				<div class="row form-group">
				<div class="col-md-12">
					<label class="font-weight-bold" for="email">Email</label>
					<input type="email" id="email" class="form-control" placeholder="Email Address">
				</div>
				</div>
				<div class="row form-group">
				<div class="col-md-12">
					<label class="font-weight-bold" for="email">Subject</label>
					<input type="text" id="subject" class="form-control" placeholder="Enter Subject">
				</div>
				</div>
				

				<div class="row form-group">
				<div class="col-md-12">
					<label class="font-weight-bold" for="message">Message</label> 
					<textarea name="message" id="message" cols="30" rows="5" class="form-control" placeholder="Say hello to us"></textarea>
				</div>
				</div>

				<div class="row form-group">
				<div class="col-md-12">
					<input type="submit" value="Send Message" class="btn btn-primary  py-2 px-4 rounded-0">
				</div>
				</div>


			</form>
			</div>

			<div class="col-lg-4">
			<div class="p-4 mb-3 bg-white">
				<h3 class="h6 text-black mb-3 text-uppercase">Contact Info</h3>
				<p class="mb-0 font-weight-bold">Address</p>
				<p class="mb-4">203 Fake St. Mountain View, San Francisco, California, USA</p>

				<p class="mb-0 font-weight-bold">Phone</p>
				<p class="mb-4"><a href="#">+1 232 3235 324</a></p>

				<p class="mb-0 font-weight-bold">Email Address</p>
				<p class="mb-0"><a href="#">youremail@domain.com</a></p>

			</div>
			
			</div>
		</div>
	</div>
</div>



<form name="bform" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>">
<?
if ($arResult["BACKURL"] <> '')
{
?>
	<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
<?
}
?>
	<input type="hidden" name="AUTH_FORM" value="Y">
	<input type="hidden" name="TYPE" value="SEND_PWD">

	<p><?echo GetMessage("sys_forgot_pass_label")?></p>

	<div style="margin-top: 16px">
		<div><b><?=GetMessage("sys_forgot_pass_login1")?></b></div>
		<div>
			<input type="text" name="USER_LOGIN" value="<?=$arResult["USER_LOGIN"]?>" />
			<input type="hidden" name="USER_EMAIL" />
		</div>
		<div><?echo GetMessage("sys_forgot_pass_note_email")?></div>
	</div>

<?if($arResult["PHONE_REGISTRATION"]):?>

	<div style="margin-top: 16px">
		<div><b><?=GetMessage("sys_forgot_pass_phone")?></b></div>
		<div><input type="text" name="USER_PHONE_NUMBER" value="<?=$arResult["USER_PHONE_NUMBER"]?>" /></div>
		<div><?echo GetMessage("sys_forgot_pass_note_phone")?></div>
	</div>
<?endif;?>

<?if($arResult["USE_CAPTCHA"]):?>
	<div style="margin-top: 16px">
		<div>
			<input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>" />
			<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" />
		</div>
		<div><?echo GetMessage("system_auth_captcha")?></div>
		<div><input type="text" name="captcha_word" maxlength="50" value="" /></div>
	</div>
<?endif?>
	<div style="margin-top: 20px">
		<input type="submit" name="send_account_info" value="<?=GetMessage("AUTH_SEND")?>" />
	</div>
</form>

<div style="margin-top: 16px">
	<p><a href="/auth/index.php<?//=$arResult["AUTH_AUTH_URL"]?>"><b><?=GetMessage("AUTH_AUTH")?></b></a></p>
</div>

<?php
    // $asset->addJs(SITE_TEMPLATE_PATH . '/js/send_new_password.js');
?>

<script type="text/javascript">
document.bform.onsubmit = function(){document.bform.USER_EMAIL.value = document.bform.USER_LOGIN.value;};
document.bform.USER_LOGIN.focus();
</script>