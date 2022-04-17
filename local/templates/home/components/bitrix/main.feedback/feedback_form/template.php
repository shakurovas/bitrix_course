<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */

$formId = 'feedback_form_' . $this->randString();
// echo '<pre>';
// print_r($arResult);
// echo '</pre>';
?>


<div class="mfeedback">
<?if(!empty($arResult["ERROR_MESSAGE"]))
{
	foreach($arResult["ERROR_MESSAGE"] as $v)
		echo '<div class="alert alert-warning" role="alert">';
		ShowError($v);
		echo '</div>';
}
if($arResult["OK_MESSAGE"] <> '')
{
	?><div class="mf-ok-text alert alert-success"><?=$arResult["OK_MESSAGE"]?></div><?
}
?>

<div class="site-section">
	<div class="container">
	<div class="row">
		<div class="col-md-12 col-lg-8 mb-5">
		<form id="<?=$formId?>" action="<?=POST_FORM_ACTION_URI?>" method="POST" class="p-5 bg-white border">
		<?=bitrix_sessid_post()?>
			<div class="row form-group">
			<div class="col-md-12 mb-3 mb-md-0">
				<label class="font-weight-bold" for="fullname"><?=GetMessage('YOUR_FULL_NAME');?><?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("NAME", $arParams["REQUIRED_FIELDS"])):?><span class="mf-req">*</span><?endif?></label>
				<input type="text" id="fullname" class="form-control" name="user_name" value="<?=$arResult["AUTHOR_NAME"]?>" placeholder="<?=GetMessage('FULL_NAME');?>">
			</div>
			</div>
			<div class="row form-group">
			<div class="col-md-12">
				<label class="font-weight-bold" for="email"><?=GetMessage('EMAIL_ADDRESS');?><?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("EMAIL", $arParams["REQUIRED_FIELDS"])):?><span class="mf-req">*</span><?endif?></label>
				<input type="email" id="email" class="form-control" name="user_email" value="<?=$arResult["AUTHOR_EMAIL"]?>" placeholder="Email">
			</div>
			</div>
			<!-- <div class="row form-group">
			<div class="col-md-12">
				<label class="font-weight-bold" for="email">Тема</label>
				<input type="text" id="subject" class="form-control" placeholder="Введите тему письма">
			</div>
			</div> -->
			<div class="row form-group">
			<div class="col-md-12">
				<label class="font-weight-bold" for="message"><?=GetMessage('MESSAGE');?><?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("MESSAGE", $arParams["REQUIRED_FIELDS"])):?><span class="mf-req">*</span><?endif?></label>
				<textarea name="MESSAGE" id="message" cols="30" rows="5" class="form-control" placeholder="<?=GetMessage('MESSAGE_BEGINNING');?>"><?=$arResult["MESSAGE"]?></textarea>
			</div>
			</div>
			<?if($arParams["USE_CAPTCHA"] == "Y"):?>
				`<div class="mf-captcha">
					<div class="mf-text"><?=GetMessage("MFT_CAPTCHA")?></div>
					<input type="hidden" name="captcha_sid" value="<?=$arResult["capCode"]?>">
					<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["capCode"]?>" width="180" height="40" alt="CAPTCHA">
					<div class="mf-text"><?=GetMessage("MFT_CAPTCHA_CODE")?><span class="mf-req">*</span></div>
					<input type="text" name="captcha_word" size="30" maxlength="50" value="">
				</div>
			<?endif;?>
				<input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
			
			<div class="row form-group">
			<div class="col-md-12">
				<input type="submit" name="submit" value="<?=GetMessage('SEND_MESSAGE');?>" class="btn btn-primary  py-2 px-4 rounded-0">
			</div>
			</div>
		</form>
		</div>
		<?$APPLICATION->IncludeComponent(
			"bitrix:main.include",
			"",
			Array(
				"AREA_FILE_SHOW" => "file",
				"AREA_FILE_SUFFIX" => "inc",
				"EDIT_TEMPLATE" => "",
				"PATH" => "/include/contacts.php"
			)
		);?><br>
	</div>
	</div>
</div>