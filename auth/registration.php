<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Регистрация");
?><?$APPLICATION->IncludeComponent(
	"bitrix:main.register", 
	"registration2", 
	array(
		"AUTH" => "Y",
		"REQUIRED_FIELDS" => array(
			0 => "EMAIL",
		),
		"SET_TITLE" => "Y",
		"SHOW_FIELDS" => array(
			0 => "EMAIL",
		),
		"SUCCESS_PAGE" => "",
		"USER_PROPERTY" => array(
			0 => "UF_SELLER_OR_BUYER",
		),
		"USER_PROPERTY_NAME" => "",
		"USE_BACKURL" => "Y",
		"COMPONENT_TEMPLATE" => "registration2"
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>