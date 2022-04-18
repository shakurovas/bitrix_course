<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);?>
<?php #echo '<pre>';
#print_r($arResult['ITEMS'][0]['DETAIL_PAGE_URL']);
#echo '</pre>';
?>
<?
// $rsElements = CIBlockElement::GetList(array(), array("ID" => $arResult['ID']), false, false, array("ID", "NAME", "DETAIL_PAGE_URL"));
// $rsElements->SetUrlTemplates("#SITE_DIR#/advertisments/#ELEMENT_CODE#/");
// $arElement = $rsElements->GetNext();
// print_r($arElement);
// echo '<pre>';
// print_r($arResult['ITEMS'][0]);
// echo '</pre>';
?>

<div class="slide-one-item home-slider owl-carousel">
	<?php foreach($arResult["ITEMS"] as $arItem):?>
		<div class="site-blocks-cover"
		<?php if(is_array($arItem["PREVIEW_PICTURE"])):?>
			style="background-image: url(<?=$arItem["PREVIEW_PICTURE"]["SRC"];?>);"
		<?php endif;?> data-aos="fade" data-stellar-background-ratio="0.5">
			<div class="text">
				<h2><?=$arItem["NAME"];?></h2>
				<p class="location"><span class="property-icon icon-room"></span><?=$arItem["PREVIEW_TEXT"];?></p>
				<p class="mb-2"><strong><?=number_format($arItem['DISPLAY_PROPERTIES']['price']['VALUE'], 0, '.', ' ')?> <?=GetMessage('RUB');?><?if($arItem['PROPERTIES']['rent_or_sale']['VALUE'] == 'Съём'):?><?=GetMessage('PER_MONTH');?><?endif;?></strong></p>
				<p class="mb-0"><a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="text-uppercase small letter-spacing-1 font-weight-bold"><?=GetMessage('SHOW_DETAILS');?></a></p>
			</div>
		</div>
	<?php endforeach;?>
</div>
