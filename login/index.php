<?
define("NEED_AUTH", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

if (is_string($_REQUEST["backurl"]) && mb_strpos($_REQUEST["backurl"], "/") === 0)
{
	LocalRedirect($_REQUEST["backurl"]);
}

$APPLICATION->SetTitle("Вход на сайт");
?><?php
$rsUser = CUser::GetByID($USER->GetID());
$arUser = $rsUser->Fetch();
if ($arUser['UF_BUYER_OR_SELLER'] == '4') {$profile_link = '/sellers-personal-account/';}
elseif ($arUser['UF_BUYER_OR_SELLER'] == '3') {$profile_link = '/buyers-personal-account/';}
else {$profile_link = '/login/worker_profile.php';}

$APPLICATION->IncludeComponent(
	"bitrix:system.auth.form",
	"authorization2",
	Array(
		"COMPONENT_TEMPLATE" => "authorization2",
		"FORGOT_PASSWORD_URL" => "/login/",
		"PROFILE_URL" => $profile_link,
		"REGISTER_URL" => "/login/registration.php",
		"SHOW_ERRORS" => "Y",
	)
);
?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>