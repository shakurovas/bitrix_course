<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Авторизация");
?><?$APPLICATION->IncludeComponent(
	"bitrix:system.auth.form", 
	"authorization", 
	array(
		"FORGOT_PASSWORD_URL" => "/auth/forget.php",
		"PROFILE_URL" => "",
		"REGISTER_URL" => "/auth/registration.php",
		"SHOW_ERRORS" => "N",
		"COMPONENT_TEMPLATE" => "authorization"
	),
	false
);?><?$APPLICATION->IncludeComponent("bitrix:system.auth.confirmation", "was_authorized", Array(
	"CONFIRM_CODE" => "confirm_code",	// Название переменной, в которой передается код подтверждения
		"LOGIN" => "login",	// Название переменной, в которой передается логин пользователя
		"USER_ID" => "confirm_user_id",	// Название переменной, в которой передается ID пользователя
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>