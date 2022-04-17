<?
IncludeModuleLangFile(__FILE__);
$MODULE_ID = GetModuleID(__FILE__);
$WEBFORM_ID  = COption::GetOptionInt($MODULE_ID, 'VACANCY_WEBFORM_ID');
?>
<form action="<?echo $APPLICATION->GetCurPage()?>" name="form1">
	<?=bitrix_sessid_post()?>
	<input type="hidden" name="lang" value="<?echo LANG?>">
	<input type="hidden" name="id" value="mcart.vacancy">
	<input type="hidden" name="install" value="Y">
	<input type="hidden" name="step" value="4">

	<select id='id_iblock' name='id_iblock' size='1'>
		<?	
		if (CModule::IncludeModule('iblock')){
			$el = new CIBlock;
			$spr = CIBlock::GetList();
			while ($el=$spr->GetNext()) 
				echo "<option value='".$el["ID"]."'>".$el["NAME"]."</option>";
		}	?>
	</select>
	<br><br>
	<select id='webform_id' name='webform_id' size='1'>
		<option value='0' <?= $WEBFORM_ID ? 'selected="selected"':''?>>[mcart_vacancy] <?=GetMessage("VACANCY_WEBFORM_INSTALL")?></option>
		<? if ( CModule::includeModule('form') ) {
			$rsSites = CForm::GetList($by="ID", $order="desc", Array());
			while ($arr = $rsSites->Fetch()){
				if($arr["SID"]!='mcart_vacancy')
					echo "<option value='".$arr["ID"]."' ".( $WEBFORM_ID==$arr["ID"] ? 'selected="selected"':'' ).">[".$arr["SID"]."] ".$arr["NAME"]."</option>";
			}
		}
		?>
	</select>
	<br><br>
	<input type="submit" name="inst" value="<?echo GetMessage("MOD_INSTALL")?>">
	<form>