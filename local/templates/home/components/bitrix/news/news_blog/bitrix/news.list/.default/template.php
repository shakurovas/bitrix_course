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

<div class="site-section site-section-sm bg-light">
	<div class="container">
	<div class="row mb-5">
		<?foreach($arResult["ITEMS"] as $arItem):?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>
			<div id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="100">
			<a href="<?=$arItem['DETAIL_PAGE_URL']?>">
			<?php $renderImage = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], Array("width" => 350, "height" => 350), BX_RESIZE_IMAGE_EXACT, false);?>
				<img src="<?=$renderImage["src"];?>" alt="Image" class="img-fluid"></a>
			<div class="p-4 bg-white">
				<span class="d-block text-secondary small text-uppercase"><?=$arItem['DISPLAY_ACTIVE_FROM'];?></span>
				<h2 class="h5 text-black mb-3"><a href="<?=$arItem['DETAIL_PAGE_URL']?>"><?=$arItem["NAME"];?></a></h2>
				<p><?=$arItem["PREVIEW_TEXT"];?></p>
			</div>
			</div>
		<?endforeach;?>
		<div class="col-md-12 text-center">
            <div class="site-pagination">
			<?php 
				if ($arParams["DISPLAY_BOTTOM_PAGER"]){
				echo $arResult["NAV_STRING"];
				}
			?>
			</div>
		</div>  
	</div>
	</div>
</div>
