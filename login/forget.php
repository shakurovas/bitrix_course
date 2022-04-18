<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Если забыли пароль...");
?><?
$er = $APPLICATION->arAuthResult;
if($er){ echo '<div class="alert alert-success">' . $er['MESSAGE'] . '</div>'; }

$APPLICATION->IncludeComponent(
	"bitrix:system.auth.forgotpasswd",
	".default",
	Array(
		"FORGOT_PASSWORD_URL" => "",
		"PROFILE_URL" => "",
		"REGISTER_URL" => "",
		"SHOW_ERRORS" => "Y"
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>