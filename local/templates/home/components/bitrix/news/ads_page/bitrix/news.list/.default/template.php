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
// print_r($arResult['ITEMS']);
// echo '</pre>';
?>
<div class="pt-5">
	<div class="container">
	<form class="row">
		<div class="col-sm-6 col-md-4 col-lg-3 mb-4">
			<div class="select-wrap">
				<span class="icon icon-arrow_drop_down"></span>
				<select name="offer-types" id="offer-types" class="form-control d-block rounded-0">
				<option value=""><?=GetMessage('CITY');?></option>
				<option value="Moscow"><?=GetMessage('MOSCOW');?></option>
				<option value="Saint-Petersburg"><?=GetMessage('SAINT_PETERSBURG');?></option>
				<option value="Yekaterinburg"><?=GetMessage('YEKATERINBURG');?></option>
				<option value="Perm"><?=GetMessage('PERM');?></option>
				<option value="Novosibirsk"><?=GetMessage('NOVOSIBIRSK');?></option>
				<option value="Sochi"><?=GetMessage('SOCHI');?></option>
				</select>
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3 mb-4">
			<div class="select-wrap">
				<span class="icon icon-arrow_drop_down"></span>
				<select name="offer-types" id="offer-types" class="form-control d-block rounded-0">
				<option value=""><?=GetMessage('RENT_OR_SALE');?></option>
				<option value="For Sale"><?=GetMessage('SALE');?></option>
				<option value="For Rent"><?=GetMessage('RENT');?></option>
				</select>
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3 mb-4">
			<div class="select-wrap">
				<span class="icon icon-arrow_drop_down"></span>
				<select name="offer-types" id="offer-types" class="form-control d-block rounded-0">
				<option value=""><?=GetMessage('SQUARE');?></option>
				<option value="800">> 500</option>
				<option value="600">200-500</option>
				<option value="400">100-200</option>
				<option value="200">50-100</option>
				<option value="100">< 50</option>
				</select>
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3 mb-4">
			<div class="select-wrap">
				<span class="icon icon-arrow_drop_down"></span>
				<select name="offer-types" id="offer-types" class="form-control d-block rounded-0">
				<option value=""><?=GetMessage('FLOORS_NUMBER');?></option>
				<option value="1000">1</option>
				<option value="800">2</option>
				<option value="600">3</option>
				<option value="400">4</option>
				<option value="200">5+</option>
				</select>
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3 mb-4">
			<div class="select-wrap">
				<span class="icon icon-arrow_drop_down"></span>
				<select name="offer-types" id="offer-types" class="form-control d-block rounded-0">
				<option value=""><?=GetMessage('BEDROOMS_NUMBER');?></option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5+">5+</option>
				</select>
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3 mb-4">
			<div class="select-wrap">
				<span class="icon icon-arrow_drop_down"></span>
				<select name="offer-types" id="offer-types" class="form-control d-block rounded-0">
				<option value=""><?=GetMessage('BATHROOMS_NUMBER_TEXT');?></option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5+">5+</option>
				</select>
			</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3 mb-4">
		<div class="mb-4">
			<div id="slider-range" class="border-primary"></div>
			<input type="text" name="text" id="amount" class="form-control border-0 pl-0 bg-white" disabled="" />
		</div>
		</div>
		<div class="col-sm-6 col-md-4 col-lg-3 mb-4">
		<input type="submit" class="btn btn-primary btn-block form-control-same-height rounded-0" value="<?=GetMessage('SEARCH');?>">
		</div>
		
	</form>

	
	</div>
</div>

<div class="site-section site-section-sm bg-light">
<div class="container">
	<div class="row mb-5">
		<div class="col-12">
		<div class="site-section-title">
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
				<span class="price rounded"><?=number_format($arItem['DISPLAY_PROPERTIES']['price']['VALUE'], 0, '.', ' ')?> <?=GetMessage('RUB');?><?if($arItem['PROPERTIES']['rent_or_sale']['VALUE'] == 'Съём'):?><?=GetMessage('PER_MONTH');?><?endif;?></span>
				<h3 class="title"><?=$arItem["NAME"];?></h3>
				<p class="location"><?=$arItem['PREVIEW_TEXT'];?></p>
				</div>
				<div class="prop-more-info">
				<div class="inner d-flex">
					<div class="col">
					<span><?=GetMessage('SQUARE');?>:</span>
					<strong><?=$arItem['PROPERTIES']['total_square']['VALUE'];?><sup>2</sup></strong>
					</div>
					<div class="col">
					<span><?if($arItem['PROPERTIES']['object_type']['VALUE'] == 'Частный дом' || $arItem['PROPERTIES']['object_type']['VALUE'] == 'Передвижной дом'){ echo GetMessage('FLOORS_NUMBER'); } else{ echo GetMessage('FLOOR_NUMBER'); }?>:</span>
					<strong><?=$arItem['PROPERTIES']['floors_number']['VALUE'];?></strong>
					</div>
					<div class="col">
					<span><?=GetMessage('BATHROOMS_NUMBER');?>:</span>
					<strong><?=$arItem['PROPERTIES']['bathrooms_number']['VALUE'];?></strong>
					</div>
					<div class="col">
					<span><?=GetMessage('HAS_GARAGE');?>:</span>
					<strong><?=$arItem['PROPERTIES']['has_garage']['VALUE'];?></strong>
					</div>
				</div>
				</div>
			</div>
			</a>
		</div>
	<?php endforeach;?>
	</div>
	<div class="row">
        <div class="col-md-12 text-center">
            <div class="site-pagination">
			<?php 
				if ($arParams["DISPLAY_BOTTOM_PAGER"]){
				echo $arResult["NAV_STRING"];
				}
			?>
			<?php
			// foreach($arResult["ITEMS"] as $arItem):?>
				<?
			// 	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			// 	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			// 	?>
				<?//endforeach;?>
              <!-- <a href="#" class="active">1</a>
              <a href="#">2</a>
              <a href="#">3</a>
              <a href="#">4</a>
              <a href="#">5</a>
              <span>...</span>
              <a href="#">10</a> -->
			</div>
		</div>  
	</div>
</div>
</div>
