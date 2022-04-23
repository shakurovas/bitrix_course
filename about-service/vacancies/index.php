<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
CModule::IncludeModule("mcart.vacancy");
$APPLICATION->SetTitle("Вакансии");
$APPLICATION->SetPageProperty('title', 'Вакансии');
?><?$APPLICATION->IncludeComponent(
	"mcart:vacansii",
	"",
Array(
"DISPLAY_NAME" => "Y",
"IBLOCK_TYPE" => "vacancies",
"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
"PAGER_TITLE" => "Вакансии",
"SET_TITLE" => "Y",
)
);
// echo '<pre>';
// print_r($arResult);
// echo '</pre>';
?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>