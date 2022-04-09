<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

CJSCore::Init();
// echo '<pre>';
// print_r($arResult);
// echo '</pre>';
?>

<?
if ($arResult['SHOW_ERRORS'] == 'Y' && $arResult['ERROR'])
	ShowMessage($arResult['ERROR_MESSAGE']);
?>

<?if($arResult["FORM_TYPE"] == "login"):?>

	<form name="system_auth_form<?=$arResult["RND"]?>" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>">
	<?if($arResult["BACKURL"] <> ''):?>
		<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
	<?endif?>
	<?foreach ($arResult["POST"] as $key => $value):?>
		<input type="hidden" name="<?=$key?>" value="<?=$value?>" />
	<?endforeach?>

	<!-- <div class="bx-system-auth-form"> -->

	<div class="site-section">
		<div class="container">
		<div class="row">
		
			<div class="col-md-12 col-lg-8 mb-5">
			<form name="system_auth_form<?=$arResult["RND"]?>" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>" class="p-5 bg-white border">
				<div class="row form-group">
				<div class="col-md-12 mb-3 mb-md-0">
					<b><?=GetMessage("AUTH_LOGIN")?>:</b></br>
					<input type="text" name="USER_LOGIN" class="form-control" maxlength="50" value="" size="17" />
					<script>
						BX.ready(function() {
							var loginCookie = BX.getCookie("<?=CUtil::JSEscape($arResult["~LOGIN_COOKIE_NAME"])?>");
							if (loginCookie)
							{
								var form = document.forms["system_auth_form<?=$arResult["RND"]?>"];
								var loginInput = form.elements["USER_LOGIN"];
								loginInput.value = loginCookie;
							}
						});
					</script>
					<!-- <label class="font-weight-bold" for="fullname">Full Name</label>
					<input type="text" id="fullname" class="form-control" placeholder="Full Name"> -->
				</div>
				</div>
				<div class="row form-group">
				<div class="col-md-12">
					<b><?=GetMessage("AUTH_PASSWORD")?>:</b><br />
					<input type="password" name="USER_PASSWORD" class="form-control" maxlength="255" size="17" autocomplete="off" />
					<?if($arResult["SECURE_AUTH"]):?>
						<span class="bx-auth-secure" id="bx_auth_secure<?=$arResult["RND"]?>" title="<?echo GetMessage("AUTH_SECURE_NOTE")?>" style="display:none">
							<div class="bx-auth-secure-icon"></div>
						</span>
						<noscript>
						<span class="bx-auth-secure" title="<?echo GetMessage("AUTH_NONSECURE_NOTE")?>">
							<div class="bx-auth-secure-icon bx-auth-secure-unlock"></div>
						</span>
						</noscript>
						
						<script type="text/javascript">
						document.getElementById('bx_auth_secure<?=$arResult["RND"]?>').style.display = 'inline-block';
						</script>
					<?endif?>
					<!-- <label class="font-weight-bold" for="email">Email</label>
					<input type="email" id="email" class="form-control" placeholder="Email Address"> -->
				</div>
				</div>
				<div class="row form-group">
				<div class="col-md-12">
					<?if ($arResult["STORE_PASSWORD"] == "Y"):?>
						<tr>
							<td valign="top"><input type="checkbox" id="USER_REMEMBER_frm" name="USER_REMEMBER" value="Y" /></td>
							<td width="100%"><label for="USER_REMEMBER_frm" title="<?=GetMessage("AUTH_REMEMBER_ME")?>"><?echo GetMessage("AUTH_REMEMBER_SHORT")?></label></td>
						</tr>
					<?endif?>
					<?if ($arResult["CAPTCHA_CODE"]):?>
						<tr>
							<td colspan="2">
							<?echo GetMessage("AUTH_CAPTCHA_PROMT")?>:<br />
							<input type="hidden" name="captcha_sid" value="<?echo $arResult["CAPTCHA_CODE"]?>" />
							<img src="/bitrix/tools/captcha.php?captcha_sid=<?echo $arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" /><br /><br />
							<input type="text" name="captcha_word" maxlength="50" value="" /></td>
						</tr>
					<?endif?>
					<!-- <label class="font-weight-bold" for="email">Subject</label>
					<input type="text" id="subject" class="form-control" placeholder="Enter Subject"> -->
				</div>
				</div>
				

				<!-- <div class="row form-group">
				<div class="col-md-12">
					
					<label class="font-weight-bold" for="message">Message</label> 
					<textarea name="message" id="message" cols="30" rows="5" class="form-control" placeholder="Say hello to us"></textarea>
				</div>
				</div> -->

				<div class="row form-group">
				<div class="col-md-12">
					<input type="submit" name="Login" value="<?=GetMessage("AUTH_LOGIN_BUTTON")?>" class="btn btn-primary  py-2 px-4 rounded-0">
				</div>
				</div>

				<?if($arResult["NEW_USER_REGISTRATION"] == "Y"):?>
					<div class="row form-group">
					<div class="col-md-12">
						<a href="<?=$arResult["AUTH_REGISTER_URL"]?>" rel="nofollow"><?=GetMessage("AUTH_REGISTER")?></a>
					</div>
					</div>
				<?endif?>
					<a href="<?=$arResult["AUTH_FORGOT_PASSWORD_URL"]?>" rel="nofollow"><?=GetMessage("AUTH_FORGOT_PASSWORD_2")?></a></noindex>



			</form>
			</div>
		</div>
		</div>
	</div>



