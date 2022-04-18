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
// echo '<pre>';
// print_r($arResult);
// echo '</pre>';
?>

<?
$APPLICATION->SetTitle(GetMessage('REVIEW') . ' - ' . $arResult['NAME'] . ' - ' . $arResult['PROPERTIES']['COMPANY']['VALUE']);
// $APPLICATION->SetPageProperty("title", GetMessage('REVIEW') . ' - ' . $arResult['NAME']);
// $APPLICATION->SetPageProperty("keywords", "лучшие, отзывы, " . $arResult['PROPERTIES']['COMPANY']['VALUE']);
// $APPLICATION->SetPageProperty("description", $arResult['PREVIEW_TEXT']);
?>
<hr>
<div class="review-block">
	<div class="review-text">
		<div class="review-text-cont">
			<?=$arResult['DETAIL_TEXT'];?>
		</div>
		<div class="review-autor">
			<?=$arResult['NAME'];?>, <?=$arResult['DISPLAY_ACTIVE_FROM'];?> <?=GetMessage('YEAR');?>., <?=$arResult['PROPERTIES']['POSITION']['VALUE']?>, <?=$arResult['PROPERTIES']['COMPANY']['VALUE'];?>.
		</div>
	</div>
	<div style="clear: both;" class="review-img-wrap"><img src="<?if($arResult['DETAIL_PICTURE']) echo $arResult['DETAIL_PICTURE']['SRC']; else echo SITE_TEMPLATE_PATH . '/img/rew/no_photo.jpg'?>" alt="img"></div>
</div>
<?if($arResult['DISPLAY_PROPERTIES']['FILES']['VALUE']): //if there is any file?>
	<div class="exam-review-doc">
		<p><?=GetMessage('DOCUMENTS');?>:</p>
		<?if(count($arResult['DISPLAY_PROPERTIES']['FILES']['VALUE']) == 1): //if there is only 1 document?>
			<div  class="exam-review-item-doc"><img class="rew-doc-ico" src="<?=SITE_TEMPLATE_PATH;?>/img/icons/pdf_ico_40.png"><a href="<?=$arResult['DISPLAY_PROPERTIES']['FILES']['FILE_VALUE']['SRC'];?>"><?=GetMessage('FILE');?> 1</a></div>
		<?else: //if there are more documents than 1?>
			<?foreach($arResult['DISPLAY_PROPERTIES']['FILES']['VALUE'] as $file):?>
				<div class="exam-review-item-doc"><img class="rew-doc-ico" src="<?=SITE_TEMPLATE_PATH;?>/img/icons/pdf_ico_40.png"><a href="<?=$arResult['DISPLAY_PROPERTIES']['FILES']['FILE_VALUE'][array_search($file, $arResult['DISPLAY_PROPERTIES']['FILES']['VALUE'])]['SRC'];?>"><?=GetMessage('FILE');?> <?=(array_search($file, $arResult['DISPLAY_PROPERTIES']['FILES']['VALUE']) + 1);?></a></div>
			<?endforeach;?>
		<?endif;?>
	</div>
<?endif;?>
<hr>
<!-- <a href="<?//=$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"];?>" class="review-block_back_link"> &larr; <?//=GetMessage('TO_REVIEWS_LIST');?></a> -->
