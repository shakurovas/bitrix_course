<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>


<div class="col-md-12">
	<h3 class="footer-heading mb-4">Навигация</h3>
</div>
			  <!-- <div class="col-md-6 col-lg-6">
                <ul class="list-unstyled">
                  <li><a href="#">Home</a></li>
                  <li><a href="#">Buy</a></li>
                  <li><a href="#">Rent</a></li>
                  <li><a href="#">Properties</a></li>
                </ul>
              </div>
              <div class="col-md-6 col-lg-6">
                <ul class="list-unstyled">
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Privacy Policy</a></li>
                  <li><a href="#">Contact Us</a></li>
                  <li><a href="#">Terms</a></li>
                </ul>
              </div> -->


<?if (!empty($arResult)):?>
<!-- <ul class="left-menu"> -->
<div class="col-md-6 col-lg-6">
<ul class="list-unstyled">
<?
foreach($arResult as $arItem):
// 	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
// 		continue;
?>

	<li><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
	
<?endforeach?>
<div class="clearboth"></div>
</ul>
</div>
<?endif?>