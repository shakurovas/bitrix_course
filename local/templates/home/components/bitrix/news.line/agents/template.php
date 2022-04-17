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

<?php #echo '<pre>';
#print_r($arResult['ITEMS'][0]['DETAIL_TEXT']);
#echo '</pre>';
?>


<div class="site-section">
    <div class="container">
      <div class="row mb-5 justify-content-center">
        <div class="col-md-7">
          <div class="site-section-title text-center">
            <h2><?=GetMessage('OUR_AGENTS');?></h2>
          </div>
        </div>
      </div>
      <div class="row block-13">

        <div class="nonloop-block-13 owl-carousel">

		<?foreach($arResult["ITEMS"] as $arItem):?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>
			<div id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="slide-item">
				<div class="team-member text-center">
				<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"];?>" alt="Image" class="img-fluid mb-4 w-50 rounded-circle mx-auto">
				<div class="text p-3">
					<h2 class="mb-2 font-weight-light text-black h4"><?=$arItem["NAME"];?></h2>
					<span class="d-block mb-3 text-white-opacity-05"><?=$arItem["PREVIEW_TEXT"];?></span>
					<p class="mb-5"><?=$arItem["DETAIL_TEXT"];?></p>
					<p>
					<?php if ((isset($arItem['PROPERTY_FACEBOOK_LINK_VALUE'])) and (!empty($arItem['PROPERTY_FACEBOOK_LINK_VALUE']))):?>
						<a href="<?=$arItem['PROPERTY_FACEBOOK_LINK_VALUE'];?>" class="text-black p-2"><span class="icon-facebook"></span></a>
					<?endif;?>
					<?php if ((isset($arItem['PROPERTY_TWITTER_LINK_VALUE'])) and (!empty($arItem['PROPERTY_TWITTER_LINK_VALUE']))):?>
						<a href="<?=$arItem['PROPERTY_TWITTER_LINK_VALUE'];?>" class="text-black p-2"><span class="icon-twitter"></span></a>
					<?endif;?>
					<?php if ((isset($arItem['PROPERTY_LINKEDIN_LINK_VALUE'])) and (!empty($arItem['PROPERTY_LINKEDIN_LINK_VALUE']))):?>
						<a href="<?=$arItem['PROPERTY_LINKEDIN_LINK_VALUE'];?>" class="text-black p-2"><span class="icon-linkedin"></span></a>
					<?endif;?>
					</p>
				</div>
				</div>
			</div>
		<?endforeach;?>

        </div>

        </div>
      </div>
    </div>
 





