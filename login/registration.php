<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Регистрация");
?><?
$rsUser = CUser::GetByID($USER->GetID());
$arUser = $rsUser->Fetch();
if ($arUser['UF_BUYER_OR_SELLER'] == '4') {$profile_link = '/sellers-personal-account/';}
elseif ($arUser['UF_BUYER_OR_SELLER'] == '3') {$profile_link = '/buyers-personal-account/';}
else {$profile_link = '/login/';}

$APPLICATION->IncludeComponent(
	"bitrix:main.register",
	"registration2",
	Array(
		"AUTH" => "Y",
		"COMPONENT_TEMPLATE" => "registration2",
		"REQUIRED_FIELDS" => array(0=>"EMAIL",),
		"SET_TITLE" => "Y",
		"SHOW_FIELDS" => array(0=>"EMAIL",),
		"SUCCESS_PAGE" => $profile_link,
		"USER_PROPERTY" => array(0=>"UF_BUYER_OR_SELLER",),
		"USER_PROPERTY_NAME" => "",
		"USE_BACKURL" => "Y"
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>