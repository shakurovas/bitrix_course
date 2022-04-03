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

<?php //echo '<pre>';
// print_r($arRarams);
// print_r($arResult['ITEMS'][0]);
// echo '</pre>';
?>

<div class="site-section">
    <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 text-center mb-5">
            <div class="site-section-title">
              <h2><?=GetMessage('SERVICES');?></h2>
            </div>
          </div>
        </div>

        <div class="row">
			<?foreach($arResult["ITEMS"] as $arItem):?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
				<div id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="col-md-6 col-lg-4 mb-4">
					<a href="<?=$arItem['PROPERTY_LINK_VALUE']?>" class="service text-center border rounded" style="border-bottom-width: 1px;height: 184.229px;width: 347.990px;">
					<span class="icon flaticon-<?=$arItem['PROPERTY_ICON_NAME_VALUE'];?>"></span>
					<h2 class="service-heading"><?=$arItem["NAME"];?></h2>
					<p><span class="read-more"><?=GetMessage('SHOW');?></span></p>
					</a>
				</div>
			<?endforeach;?>
        </div>
	</div>
</div>
