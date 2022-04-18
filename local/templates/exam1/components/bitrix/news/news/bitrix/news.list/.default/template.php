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
// print_r($arResult['ITEMS'][1]);
// echo '</pre>';
function mb_ucfirst($str) {
	return mb_strtoupper(mb_substr($str, 0, 1)) . mb_substr($str, 1);
}
?>

<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<hr>

<?foreach($arResult["ITEMS"] as $arItem):?>
	<?$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_EDIT'));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_DELETE'), array('CONFIRM' => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')))
	?>
	<div class="news-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<div class="review-block">
			<div class="review-text">
				<div class="review-block-title"><span class="review-block-name"><a href="<?=$arItem['DETAIL_PAGE_URL'];?>"><?=$arItem['NAME'];?></a></span><span class="review-block-description"><?=$arItem['DISPLAY_ACTIVE_FROM'];?> <?=GetMessage('YEAR');?>., <?=mb_ucfirst($arItem['PROPERTIES']['POSITION']['VALUE']);?>, <?=$arItem['PROPERTIES']['COMPANY']['VALUE'];?></span></div>		
				<div class="review-text-cont">
					<?=$arItem['PREVIEW_TEXT'];?>
				</div>
			</div>
			<div class="review-img-wrap"><a href="<?=$arItem['DETAIL_PAGE_URL'];?>"><img src="<?if(is_array($arItem['PREVIEW_PICTURE'])) echo $arItem['PREVIEW_PICTURE']['SRC']; else echo SITE_TEMPLATE_PATH . '/img/rew/no_photo.jpg'?>" alt="img"></a></div>
		</div>
	</div>
<?endforeach;?>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>

