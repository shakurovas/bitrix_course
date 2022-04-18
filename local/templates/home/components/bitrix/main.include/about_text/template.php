<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
print_r($arParams);
if($arResult["FILE"] <> '')
	include($arResult["FILE"]);
?>

<div class="site-section border-bottom">
    <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
            <img src="images/about.jpg" alt="Image" class="img-fluid">
          </div>
          <div class="col-md-5 ml-auto"  data-aos="fade-up" data-aos-delay="200">
            <div class="site-section-title mb-3">
              <h2>Our Company</h2>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus in cum odio.</p>
            <p>Illum repudiandae ratione facere explicabo. Consequatur dolor optio iusto, quos autem voluptate ea? Sunt laudantium fugiat, mollitia voluptate? Modi blanditiis veniam nesciunt architecto odit voluptatum tempore impedit magnam itaque natus!</p>
          </div>
        </div>
    </div>
</div>

<?// if($arResult["FILE"] <> '')
// 	include($arResult["FILE"]);
