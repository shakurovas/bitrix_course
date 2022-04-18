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
$this->setFrameMode(true);
?>

<?php // echo '<pre>';
// print_r($arRarams);
// print_r($arResult['ITEMS'][0]);
// echo '</pre>';

// $arResult['ITEMS'][0]["DISPLAY_PROPERTIES"][21] = CIBlockFormatProperties::GetDisplayValue($arResult['ITEMS'], ['price']);
// print_r($arResult['ITEMS'][0]["DISPLAY_PROPERTIES"]);
?>

<div class="site-section site-section-sm bg-light">
<div class="container">
	<div class="row mb-5">
		<div class="col-12">
		<div class="site-section-title text-center">
			<h2><?=GetMessage('NEW_OBJECTS');?></h2>
		</div>
		</div>
	</div>
	<div class="row mb-5">
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>
		<div id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="col-md-6 col-lg-4 mb-4">
			<a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="prop-entry d-block">
			<figure>
				<?php $renderImage = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], Array("width" => 350, "height" => 350), BX_RESIZE_IMAGE_EXACT, false);?>
				<img src="<?=$renderImage["src"];?>" alt="Image" class="img-fluid">
			</figure>
			<div class="prop-text">
				<div class="inner">
				<span class="price rounded"><?=number_format($arItem['PROPERTY_PRICE_VALUE'], 0, '.', ' ')?> <?=GetMessage('RUB');?><?if($arItem['PROPERTY_RENT_OR_SALE_VALUE'] == 'Съём'):?><?=GetMessage('PER_MONTH');?><?endif;?></span>
				<h3 class="title"><?=$arItem["NAME"];?></h3>
				<p class="location"><?=$arItem['PREVIEW_TEXT'];?></p>
				</div>
				<div class="prop-more-info">
				<div class="inner d-flex">
					<div class="col">
					<span><?=GetMessage('SQUARE');?>:</span>
					<strong><?=$arItem['PROPERTY_TOTAL_SQUARE_VALUE'];?><sup>2</sup></strong>
					</div>
					<div class="col">
					<span><?if($arItem['PROPERTY_OBJECT_TYPE_VALUE'] == 'Частный дом' || $arItem['PROPERTY_OBJECT_TYPE_VALUE'] == 'Передвижной дом'){ echo GetMessage('FLOORS_NUMBER'); } else{ echo GetMessage('FLOOR_NUMBER'); }?>:</span>
					<strong><?=$arItem['PROPERTY_FLOORS_NUMBER_VALUE'];?></strong>
					</div>
					<div class="col">
					<span><?=GetMessage('BATHROOMS_NUMBER');?>:</span>
					<strong><?=$arItem['PROPERTY_BATHROOMS_NUMBER_VALUE'];?></strong>
					</div>
					<div class="col">
					<span><?=GetMessage('HAS_GARAGE');?>:</span>
					<strong><?=$arItem['PROPERTY_HAS_GARAGE_VALUE'];?></strong>
					</div>
				</div>
				</div>
			</div>
			</a>
		</div>
	<?php endforeach;?>
	</div>
</div>
</div>









