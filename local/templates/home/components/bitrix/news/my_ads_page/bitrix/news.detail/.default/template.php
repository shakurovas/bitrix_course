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
// // print_r($arParams);
// print_r($arResult);
// echo '</pre>';
?>

<div class="site-blocks-cover overlay" <?if(is_array($arResult['DETAIL_PICTURE'])):?>style="background-image: url(<?=$arResult['DETAIL_PICTURE']['SRC'];?>);"<?endif;?> data-aos="fade" data-stellar-background-ratio="0.5">
	<div class="container">
		<div class="row align-items-center justify-content-center text-center">
			<div class="col-md-10">
				<span class="d-inline-block text-white px-3 mb-3 property-offer-type rounded"><?=GetMessage('DETAIL_DESCRIPTION');?></span>
				<h1 class="mb-2"><?=$arResult['NAME'];?></h1>
				<p class="mb-5"><strong class="h2 text-success font-weight-bold"><?=number_format($arResult['DISPLAY_PROPERTIES']['price']['VALUE'], 0, '.', ' ');?> <?=GetMessage('RUB');?><?if($arResult['PROPERTIES']['rent_or_sale']['VALUE'] == 'Съём'):?><?=GetMessage('PER_MONTH');?><?endif;?></strong></p>
			</div>
		</div>
	</div>
</div>

<div class="site-section site-section-sm">
	<div class="container">
	<div class="row">
		<div class="col-lg-8" style="margin-top: -150px;">
		<div class="mb-5">
			<?php //echo '<pre>'; print_r(count($arResult['DISPLAY_PROPERTIES']['gallery']['VALUE'])); echo '</pre>';
			if(count($arResult['DISPLAY_PROPERTIES']['gallery']['VALUE']) == 1):?>
				<div class="slide-one-item home-slider owl-carousel">
					<div><?$renderImage = CFile::ResizeImageGet($arResult['DISPLAY_PROPERTIES']['gallery']['FILE_VALUE'], Array("width" => 730, "height" => 730), BX_RESIZE_IMAGE_EXACT, false);?>
						<img src="<?=$renderImage["src"];?>" alt="Image" class="img-fluid">
					</div>
				</div>
			<?else:?>
				<div class="slide-one-item home-slider owl-carousel">
				
				<?foreach($arResult['DISPLAY_PROPERTIES']['gallery']['FILE_VALUE'] as $image):?>
					<div><?$renderImage = CFile::ResizeImageGet($image, Array("width" => 730, "height" => 730), BX_RESIZE_IMAGE_EXACT, false);?>
						<img src="<?=$renderImage["src"];?>" alt="Image" class="img-fluid">
					</div>
				<?endforeach;?>

				</div>
			<?endif;?>
		</div>
		<div class="bg-white">
			<div class="row mb-5">
			<div class="col-md-6">
				<strong class="text-success h1 mb-3"><?=number_format($arResult['DISPLAY_PROPERTIES']['price']['VALUE'], 0, '.', ' ');?> <?=GetMessage('RUB');?><?if($arResult['PROPERTIES']['rent_or_sale']['VALUE'] == 'Съём'):?><?=GetMessage('PER_MONTH');?><?endif;?></strong>
			</div>
			<div class="col-md-6">
				<ul class="property-specs-wrap mb-3 mb-lg-0  float-lg-right">
				
				<li>
				<span class="property-specs"><?=GetMessage('UPDATED');?></span>
				<span class="property-specs-number"><?=ConvertDateTime($arResult["TIMESTAMP_X"], "DD-MM-YYYY")?></span>
				
				</li>
				<li>
				<span class="property-specs"><?=GetMessage('METERS');?><sup>2</sup></span>
				<span class="property-specs-number"><?=$arResult['PROPERTIES']['total_square']['VALUE'];?></span>
				
				</li>
				<li>
				<span class="property-specs"><?=GetMessage('FLOORS_OR_FLOOR_NUMBER');?></span>
				<span class="property-specs-number"><?=$arResult['PROPERTIES']['floors_number']['VALUE'];?></span>
				
				</li>
			</ul>
			</div>
			</div>
			<div class="row mb-5">
			<?if($arResult['PROPERTIES']['bedrooms_number']['VALUE'] != 0):?>
			<div class="col-md-6 col-lg-4 text-left border-bottom border-top py-3">
				<span class="d-inline-block text-black mb-0 caption-text"><?=GetMessage('BEDROOMS_NUMBER');?></span>
				<strong class="d-block"><?=$arResult['PROPERTIES']['bedrooms_number']['VALUE'];?></strong>
			</div>
			<?endif;?>
			<?if($arResult['PROPERTIES']['bathrooms_number']['VALUE'] != 0):?>
			<div class="col-md-6 col-lg-4 text-left border-bottom border-top py-3">
				<span class="d-inline-block text-black mb-0 caption-text"><?=GetMessage('BATHROOMS_NUMBER');?></span>
				<strong class="d-block"><?=$arResult['PROPERTIES']['bathrooms_number']['VALUE'];?></strong>
			</div>
			<?endif;?>
			<div class="col-md-6 col-lg-4 text-left border-bottom border-top py-3">
				<span class="d-inline-block text-black mb-0 caption-text"><?=GetMessage('HAS_GARAGE');?></span>
				<strong class="d-block"><?=$arResult['PROPERTIES']['has_garage']['VALUE'];?></strong>
			</div>
			</div>
			<h2 class="h4 text-black"><?=GetMessage('DETAIL_INFO');?></h2>
			<p><?=$arResult['DETAIL_TEXT'];?></p>

			<div class="row mt-5">
				<div class="col-12">
					<h2 class="h4 text-black mb-3"><?=GetMessage('GALLERY');?></h2>
				</div>
				<?if(count($arResult['DISPLAY_PROPERTIES']['gallery']['VALUE']) == 1):?>
					<?$renderImage = CFile::ResizeImageGet($arResult['DISPLAY_PROPERTIES']['gallery']['FILE_VALUE'], Array("width" => 160, "height" => 160), BX_RESIZE_IMAGE_EXACT, false);?>
						<div class="col-sm-6 col-md-4 col-lg-3 mb-4">
							<a href="<?$renderImage = CFile::ResizeImageGet($arResult['DISPLAY_PROPERTIES']['gallery']['FILE_VALUE'], Array("width" => 730, "height" => 730), BX_RESIZE_IMAGE_EXACT, false); echo $renderImage['src'];?>" class="image-popup gal-item">
							<img src="<?$renderImage = CFile::ResizeImageGet($arResult['DISPLAY_PROPERTIES']['gallery']['FILE_VALUE'], Array("width" => 160, "height" => 160), BX_RESIZE_IMAGE_EXACT, false); echo $renderImage['src'];?>" alt="Image" class="img-fluid"></a>
						</div>
				<?elseif(count($arResult['DISPLAY_PROPERTIES']['gallery']['VALUE']) == 0):?>
					<p><?=GetMessage('NO_ADDITIONAL_IMAGES');?></p>
				<?else:?>
					<?foreach($arResult['DISPLAY_PROPERTIES']['gallery']['FILE_VALUE'] as $image):?>
						<?$renderImage = CFile::ResizeImageGet($image, Array("width" => 160, "height" => 160), BX_RESIZE_IMAGE_EXACT, false);?>
						<div class="col-sm-6 col-md-4 col-lg-3 mb-4">
							<a href="<?$renderImage = CFile::ResizeImageGet($image, Array("width" => 730, "height" => 730), BX_RESIZE_IMAGE_EXACT, false); echo $renderImage['src'];?>" class="image-popup gal-item">
							<img src="<?$renderImage = CFile::ResizeImageGet($image, Array("width" => 160, "height" => 160), BX_RESIZE_IMAGE_EXACT, false); echo $renderImage['src'];?>" alt="Image" class="img-fluid"></a>
						</div>
					<?endforeach;?>
				<?endif;?>
			</div>

			
			<h2 class="h4 text-black"><?=GetMessage('ADDITIONAL_MATERIALS');?></h2>
			<?if(!empty($arResult['DISPLAY_PROPERTIES']['other_materials']['VALUE'])):?>
				<?if(count($arResult['DISPLAY_PROPERTIES']['other_materials']['VALUE']) == 1):?>
					<p><?=$arResult['DISPLAY_PROPERTIES']['other_materials']['DISPLAY_VALUE'];?></p>
				<?
				else:?>
					<p><?foreach($arResult['DISPLAY_PROPERTIES']['other_materials']['DISPLAY_VALUE'] as $link => $file_properties):?>
						<?=$file_properties;?><br>
					<?endforeach;?></p>
				<?endif;?>
			<?else:?>
				<p><?=GetMessage('NO_ADDITIONAL_MATERIALS');?></p>
			<?endif;?>
			
			<h2 class="h4 text-black"><?=GetMessage('LINKS');?></h2>
			<?if(!empty($arResult['DISPLAY_PROPERTIES']['links']['VALUE'])):?>
				<?foreach($arResult['DISPLAY_PROPERTIES']['links']['VALUE'] as $link => $value):?>
					<a href="<?=$value;?>"><?=$value;?></a><br>
				<?endforeach;?>
			<?else:?>
				<p><?=GetMessage('NO_LINKS');?></p>
			<?endif;?>
		</div>
		</div>
		<div class="col-lg-4 pl-md-5">

		<div class="bg-white widget border rounded">

			<h3 class="h4 text-black widget-title mb-3"><?=GetMessage('CONTACT_AGENT');?></h3>
			<form action="" class="form-contact-agent">
			<div class="form-group">
				<label for="name"><?=GetMessage('NAME');?></label>
				<input type="text" id="name" class="form-control">
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" id="email" class="form-control">
			</div>
			<div class="form-group">
				<label for="phone"><?=GetMessage('PHONE');?></label>
				<input type="text" id="phone" class="form-control">
			</div>
			<div class="form-group">
				<input type="submit" id="phone" class="btn btn-primary" value="<?=GetMessage('SEND_MESSAGE');?>">
			</div>
			</form>
		</div>

		<div class="bg-white widget border rounded">
			<h3 class="h4 text-black widget-title mb-3"><?=GetMessage('TEXT_TO_AGENT');?></h3>
			<p><?=GetMessage('LOREM_IPSUM');?></p>
		</div>

		</div>
		
	</div>
	</div>
</div>
