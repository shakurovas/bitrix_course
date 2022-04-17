<?
/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 */
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();
?>

<div class="site-section">
      <div class="container">
        <div class="row">
       
          <div class="col-md-12 col-lg-8 mb-5">

<div class="bx-auth-profile">

	<?ShowError($arResult["strProfileError"]);?>
	<?
	if ($arResult['DATA_SAVED'] == 'Y')
		ShowNote(GetMessage('PROFILE_DATA_SAVED'));
	?>

	<script type="text/javascript">
	<!--
	var opened_sections = [<?
	$arResult["opened"] = $_COOKIE[$arResult["COOKIE_PREFIX"]."_user_profile_open"];
	$arResult["opened"] = preg_replace("/[^a-z0-9_,]/i", "", $arResult["opened"]);
	if ($arResult["opened"] <> '')
	{
		echo "'".implode("', '", explode(",", $arResult["opened"]))."'";
	}
	else
	{
		$arResult["opened"] = "reg";
		echo "'reg'";
	}
	?>];
	//-->
	var cookie_prefix = '<?=$arResult["COOKIE_PREFIX"]?>';
	</script>

	<form method="post" name="form1" action="<?=$arResult["FORM_TARGET"]?>" enctype="multipart/form-data" class="p-5 bg-white border">
		<?=$arResult["BX_SESSION_CHECK"]?>
		<input type="hidden" name="lang" value="<?=LANG?>" />
		<input type="hidden" name="ID" value=<?=$arResult["ID"]?> />


		<div class="bx-auth-title"><a title="<?=GetMessage("REG_SHOW_HIDE")?>" href="javascript:void(0)" onclick="SectionClick('reg')"><?=GetMessage("REG_SHOW_HIDE")?></a></div>
		<div class="profile-block-<?= mb_strpos($arResult["opened"], "reg") === false ? "hidden" : "shown"?>" id="user_div_reg"><br>
			<?
			if($arResult["ID"]>0)
			{
			?>
				<?
				if ($arResult["arUser"]["TIMESTAMP_X"] <> '')
				{
				?>
					<div class="row form-group">
					<div class="col-md-12 mb-3 mb-md-0">
						<label class="font-weight-bold"><?=GetMessage('LAST_UPDATE')?></label>
						<label><?=$arResult["arUser"]["TIMESTAMP_X"]?></label>
					</div>
					<?
					if ($arResult["arUser"]["LAST_LOGIN"] <> '')
					{
					?>
						<div class="col-md-12 mb-3 mb-md-0">
							<label class="font-weight-bold"><?=GetMessage('LAST_LOGIN')?></label>
							<label><?=$arResult["arUser"]["LAST_LOGIN"]?></label>
						</div>
						</div>
					<?
					}
					?>
				<?
				}
				?>
			<?
			}
			?>

			<div class="row form-group">
			<div class="col-md-12">
				<label class="font-weight-bold"><?echo GetMessage("role_on_the_site")?>:</label>
				<label><?if($arResult['arUser']['UF_BUYER_OR_SELLER'] == 3) echo GetMessage('buyer'); elseif($arResult['arUser']['UF_BUYER_OR_SELLER'] == 4) echo GetMessage('seller'); else echo GetMessage('worker');?></label>
				
			</div>
			</div>

			<div class="row form-group">
            <div class="col-md-12">
				<label class="font-weight-bold"><?echo GetMessage("main_profile_title")?></label>
				<input type="text" name="TITLE" value="<?=$arResult["arUser"]["TITLE"]?>" class="form-control">
            </div>
            </div>

			<div class="row form-group">
            <div class="col-md-12">
				<label class="font-weight-bold"><?=GetMessage('NAME')?></label>
				<input name="NAME" maxlength="50" value="<?=$arResult["arUser"]["NAME"]?>" class="form-control">
            </div>
            </div>

			<div class="row form-group">
            <div class="col-md-12">
				<label class="font-weight-bold"><?=GetMessage('LAST_NAME')?></label>
				<input type="text" name="LAST_NAME" maxlength="50" value="<?=$arResult["arUser"]["LAST_NAME"]?>" class="form-control">
            </div>
            </div>

			<div class="row form-group">
            <div class="col-md-12">
				<label class="font-weight-bold"><?=GetMessage('SECOND_NAME')?></label>
				<input type="text" name="SECOND_NAME" maxlength="50" value="<?=$arResult["arUser"]["SECOND_NAME"]?>" class="form-control">
            </div>
            </div>

			<div class="row form-group">
            <div class="col-md-12">
				<label class="font-weight-bold"><?=GetMessage('LOGIN')?></label>
				<input type="text" name="LOGIN" maxlength="50" value="<? echo $arResult["arUser"]["LOGIN"]?>" class="form-control">
            </div>
            </div>

			<div class="row form-group">
            <div class="col-md-12">
				<label class="font-weight-bold"><?=GetMessage('EMAIL')?></label>
				<input type="text" name="EMAIL" maxlength="50" value="<? echo $arResult["arUser"]["EMAIL"]?>" class="form-control">
            </div>
            </div>

			<?if($arResult['CAN_EDIT_PASSWORD']):?>
				<div class="row form-group">
				<div class="col-md-12">
					<label class="font-weight-bold"><?=GetMessage('NEW_PASSWORD_REQ')?></label>
					<input type="password" name="NEW_PASSWORD" maxlength="50" value="" autocomplete="off" class="bx-auth-input form-control">

					<?if($arResult["SECURE_AUTH"]):?>
						<span class="bx-auth-secure" id="bx_auth_secure" title="<?echo GetMessage("AUTH_SECURE_NOTE")?>" style="display:none">
							<div class="bx-auth-secure-icon"></div>
						</span>
						<noscript>
						<span class="bx-auth-secure" title="<?echo GetMessage("AUTH_NONSECURE_NOTE")?>">
							<div class="bx-auth-secure-icon bx-auth-secure-unlock"></div>
						</span>
						</noscript>
						<script type="text/javascript">
						document.getElementById('bx_auth_secure').style.display = 'inline-block';
						</script>
					<?endif?>

				</div>
				</div>


				<div class="row form-group">
				<div class="col-md-12">
					<label class="font-weight-bold"><?=GetMessage('NEW_PASSWORD_CONFIRM')?></label>
					<input type="password" name="NEW_PASSWORD_CONFIRM" maxlength="50" value="" autocomplete="off" class="form-control">
				</div>
				</div>
			<?endif?>
		</div>

		<?if($arResult["IS_ADMIN"]):?>
		<div class="profile-link profile-user-div-link"><a title="<?=GetMessage("USER_SHOW_HIDE")?>" href="javascript:void(0)" onclick="SectionClick('admin')"><?=GetMessage("USER_ADMIN_NOTES")?></a></div>
		<div id="user_div_admin" class="profile-block-<?= mb_strpos($arResult["opened"], "admin") === false ? "hidden" : "shown"?>">
			<?=GetMessage("USER_ADMIN_NOTES")?>:</td>
			<textarea cols="30" rows="5" name="ADMIN_NOTES"><?=$arResult["arUser"]["ADMIN_NOTES"]?></textarea>
		</div>
		<?endif;?>
		<?// ********************* User properties ***************************************************?>
		<?if($arResult["USER_PROPERTIES"]["SHOW"] == "Y"):?>
		<div class="profile-link profile-user-div-link"><a title="<?=GetMessage("USER_SHOW_HIDE")?>" href="javascript:void(0)" onclick="SectionClick('user_properties')"><?=trim($arParams["USER_PROPERTY_NAME"]) <> '' ? $arParams["USER_PROPERTY_NAME"] : GetMessage("USER_TYPE_EDIT_TAB")?></a></div>
		<div id="user_div_user_properties" class="profile-block-<?= mb_strpos($arResult["opened"], "user_properties") === false ? "hidden" : "shown"?>">
			<?$first = true;?>
			<?foreach ($arResult["USER_PROPERTIES"]["DATA"] as $FIELD_NAME => $arUserField):?>
				<?if ($arUserField["MANDATORY"]=="Y"):?>
					<span class="starrequired">*</span>
				<?endif;?>
				<?=$arUserField["EDIT_FORM_LABEL"]?>:
					<?$APPLICATION->IncludeComponent(
						"bitrix:system.field.edit",
						$arUserField["USER_TYPE"]["USER_TYPE_ID"],
						array("bVarsFromForm" => $arResult["bVarsFromForm"], "arUserField" => $arUserField), null, array("HIDE_ICONS"=>"Y"));?>
			<?endforeach;?>
		</div>
		<?endif;?>
		<?// ******************** /User properties ***************************************************?>
		<p><?echo $arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"];?></p>
		<div class="row form-group">
		<div class="col-md-12">
			<input type="submit" name="save" value="<?=(($arResult["ID"]>0) ? GetMessage("MAIN_SAVE") : GetMessage("MAIN_ADD"))?>" class="btn btn-primary  py-2 px-4 rounded-0">&nbsp;&nbsp;<input type="reset" value="<?=GetMessage('MAIN_RESET');?>" class="btn btn-primary  py-2 px-4 rounded-0">
		</div>
        </div>
	</form>
</div>
</div>
</div>
</div>
</div>