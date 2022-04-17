<?
/**
 * Bitrix Framework
 * @package bitrix
 * @subpackage main
 * @copyright 2001-2014 Bitrix
 */

/**
 * Bitrix vars
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @param array $arParams
 * @param array $arResult
 * @param CBitrixComponentTemplate $this
 */

// echo '<pre>';
// print_r(array_values($arResult['REQUIRED_FIELDS']));
// echo '</pre>';
// print_r($USER);
// $obEnum = new CUserFieldEnum;
//     $rsEnum = $obEnum->GetList(array(), array("USER_FIELD_ID" => 12));
//     while ($arF = $rsEnum->Fetch()) {
//       echo $arF['VALUE'].'</br>';
//     }

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();

// if($arResult["SHOW_SMS_FIELD"] == true)
// {
// 	CJSCore::Init('phone_auth');
// }
?>
<!-- <div class="bx-auth-reg"> -->

<?if($USER->IsAuthorized()):?>

<p><?echo GetMessage("MAIN_REGISTER_AUTH")?></p>

<?else:?>
	<?
	if (count($arResult["ERRORS"]) > 0):
		foreach ($arResult["ERRORS"] as $key => $error)
			if (intval($key) == 0 && $key !== 0) 
				$arResult["ERRORS"][$key] = str_replace("#FIELD_NAME#", "&quot;".GetMessage("REGISTER_FIELD_".$key)."&quot;", $error);

		?><div class="alert alert-warning"><? ShowError(implode("<br />", $arResult["ERRORS"]));?></div><?

	elseif($arResult["USE_EMAIL_CONFIRMATION"] === "Y"):
	?>
		<p><?echo GetMessage("REGISTER_EMAIL_WILL_BE_SENT")?></p>
	<?endif?>

	<div id="bx_register_error" style="display:none"><?ShowError("error")?></div>
	<div id="bx_register_resend"></div>

	<div class="site-section">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-8 mb-5">
				<form method="post" action="<?=POST_FORM_ACTION_URI?>" name="regform" enctype="multipart/form-data" class="p-5 bg-white border">
					<?if($arResult["BACKURL"] <> ''):?>
						<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
					<?endif;?>
					<?foreach ($arResult["SHOW_FIELDS"] as $FIELD):
						switch ($FIELD)
						{
							case "LOGIN":?>
								<div class="row form-group">
									<div class="col-md-12 mb-3 mb-md-0">
										<label class="font-weight-bold"><?=GetMessage('REGISTER_FIELD_LOGIN');?><?if(in_array($FIELD, array_values($arResult['REQUIRED_FIELDS']))):?><span class="mf-req">*</span><?endif;?>:</label>
										<input type="text" id="login" name="REGISTER[<?=$FIELD?>]" value="<?=$arResult["VALUES"][$FIELD]?>" autocomplete="off" class="form-control">
									</div>
								</div>
							<?break;?>
							<?case "EMAIL":?>
								<div class="row form-group">
									<div class="col-md-12">
										<label class="font-weight-bold"><?=GetMessage('REGISTER_FIELD_EMAIL');?><?if(in_array($FIELD, array_values($arResult['REQUIRED_FIELDS']))):?><span class="mf-req">*</span><?endif;?>:</label>
										<input type="email" id="email" name="REGISTER[<?=$FIELD;?>]" value="<?=$arResult["VALUES"][$FIELD];?>" autocomplete="off" class="form-control">
									</div>
								</div>
							<?break;?>
							<?case "PASSWORD":?>
								<div class="row form-group">
									<div class="col-md-12">
										<label class="font-weight-bold"><?=GetMessage('REGISTER_FIELD_PASSWORD');?><?if(in_array($FIELD, array_values($arResult['REQUIRED_FIELDS']))):?><span class="mf-req">*</span><?endif;?>:</label>
										<input type="password" name="REGISTER[<?=$FIELD;?>]" value="<?=$arResult["VALUES"][$FIELD];?>" autocomplete="off" class="form-control">
									</div>
								</div>
								<?if($arResult["SECURE_AUTH"]):?>
									<span class="bx-auth-secure" id="bx_auth_secure" title="<?echo GetMessage("AUTH_SECURE_NOTE");?>" style="display:none">
										<div class="bx-auth-secure-icon"></div>
									</span>
									<noscript>
									<span class="bx-auth-secure" title="<?echo GetMessage("AUTH_NONSECURE_NOTE");?>">
										<div class="bx-auth-secure-icon bx-auth-secure-unlock"></div>
									</span>
									</noscript>
									<script type="text/javascript">
									document.getElementById('bx_auth_secure').style.display = 'inline-block';
									</script>
								<?endif;?>
							<?break;?>
							<?case "CONFIRM_PASSWORD":
								?>
								<div class="row form-group">
									<div class="col-md-12">
										<label class="font-weight-bold"><?=GetMessage('REGISTER_FIELD_CONFIRM_PASSWORD');?><?if(in_array($FIELD, array_values($arResult['REQUIRED_FIELDS']))):?><span class="mf-req">*</span><?endif;?>:</label>
										<input type="password" name="REGISTER[<?=$FIELD;?>]" value="<?=$arResult["VALUES"][$FIELD];?>" autocomplete="off" class="form-control">
									</div>
								</div>
							<?break;
						}?>
							
					<?endforeach;?>

					<div class="row form-group">
						<div class="col-md-12">
						<?if($arResult["USER_PROPERTIES"]["SHOW"] == "Y"):?>
							<?foreach ($arResult["USER_PROPERTIES"]["DATA"] as $FIELD_NAME => $arUserField):?>
								<label class="font-weight-bold"><?=$arUserField["EDIT_FORM_LABEL"]?>:<?if ($arUserField["MANDATORY"]=="Y"):?><span class="mf-req">*</span><?endif;?></label>
										<div><?$APPLICATION->IncludeComponent(
											"bitrix:system.field.edit",
											$arUserField["USER_TYPE"]["USER_TYPE_ID"],
											array("bVarsFromForm" => $arResult["bVarsFromForm"], "arUserField" => $arUserField, "form_name" => "regform"), null, array("HIDE_ICONS"=>"Y"));?>
										</div>
							<?endforeach;?>
						<?endif;?>
						</div>
					</div>
					
					<?
					/* CAPTCHA */
					if ($arResult["USE_CAPTCHA"] == "Y")
					{
						?>
							<div class="row form-group">
									<div class="col-md-12 mb-3 mb-md-0">
										<label class="font-weight-bold"><?=GetMessage("REGISTER_CAPTCHA_PROMT");?><span class="mf-req">*</span>:</label>
										<input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>" class="form-control" />
										<input type="text" name="captcha_word" maxlength="50" value="" autocomplete="off" />
									</div>
									<div class="col-md-12 mb-3 mb-md-0"><img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" /></div>
							</div>
						<?
					}
					?>
					<div class="row form-group">
						<div class="col-md-12">
							<input type="submit" name="register_submit_button" value="<?=GetMessage("AUTH_REGISTER");?>" class="btn btn-primary py-2 px-4 rounded-0">
						</div>
					</div>
				</form>
			</div>
			</div>
		</div>
	</div>
<?endif;?>
<!-- </div> -->

