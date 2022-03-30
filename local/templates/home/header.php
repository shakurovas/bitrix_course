<?php
use Bitrix\Main\Page\Asset;
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); #Данная строчка указывается в начале файла для секретности - чтобы нельзя было открыть данный файл напрямую из браузера, без подключения ядра Битрикса
$asset = Asset::getInstance();

IncludeTemplateLangFile(__FILE__); #Подключаются языковые файлы для шаблона
// $APPLICATION->ShowTitle(False); #Отображение заголовка страницы из $APPLICATION->SetTitle("title")
// $APPLICATION->ShowHead(); #Выводит необходимый функционал в head
// $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/css/index.css"); #Подключаеv к шаблону файлы стилей
// $APPLICATION->ShowPanel(); #Подключает панель битрикса
define('SITE_TEMPLATE_PATH', '/local/templates/home'); #Содержит путь до шаблона, без последнего слеша
// $APPLICATION->GetCurPage(false) === '/'; #Необходим, если главная страница отличается от внутренней по верстке
?>
<!DOCTYPE html>
<html lang="<?=LANGUAGE_ID;?>">
  <head>
    
    <?$APPLICATION->ShowHead();?>
    <title><?$APPLICATION->ShowTitle();?></title>
    
    
    <!-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->

    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500">  -->
    <!-- <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/mediaelementplayer.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/fl-bigmug-line.css">
    
  
    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css"> -->
    <?
    $asset->addCss(SITE_TEMPLATE_PATH . "https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500");
    $asset->addCss(SITE_TEMPLATE_PATH . "/fonts/icomoon/style.css");
    $asset->addCss(SITE_TEMPLATE_PATH . "/css/bootstrap.min.css");
    $asset->addCss(SITE_TEMPLATE_PATH . "/css/bootstrap/bootstrap-reboot.css");
    $asset->addCss(SITE_TEMPLATE_PATH . "/css/bootstrap/bootstrap-grid.css");
    $asset->addCss(SITE_TEMPLATE_PATH . "/css/magnific-popup.css");
    $asset->addCss(SITE_TEMPLATE_PATH . "/css/jquery-ui.css");
    $asset->addCss(SITE_TEMPLATE_PATH . "/css/progress-bar.css");
    $asset->addCss(SITE_TEMPLATE_PATH . "/css/owl.carousel.min.css");
    $asset->addCss(SITE_TEMPLATE_PATH . "/css/owl.theme.default.min.css");
    $asset->addCss(SITE_TEMPLATE_PATH . "/css/bootstrap-datepicker.css");
    $asset->addCss(SITE_TEMPLATE_PATH . "/css/mediaelementplayer.css");
    $asset->addCss(SITE_TEMPLATE_PATH . "/css/animate.css");
    $asset->addCss(SITE_TEMPLATE_PATH . "/fonts/flaticon/font/flaticon.css");
    $asset->addCss(SITE_TEMPLATE_PATH . "/css/fl-bigmug-line.css");
    $asset->addCss(SITE_TEMPLATE_PATH . "/css/aos.css");
    $asset->addCss(SITE_TEMPLATE_PATH . "/css/style.css");
    ?>
  </head>
  <body>
  <div id="panel">
    <?$APPLICATION->ShowPanel(); ?> 
  </div>
  <div class="site-loader"></div>
  
  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    
    <div class="border-bottom bg-white top-bar">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-6 col-md-6">
            <p class="mb-0">
              <a href="#" class="mr-3"><span class="text-black fl-bigmug-line-phone351"></span><span class="d-none d-md-inline-block ml-2">
              <?$APPLICATION->IncludeComponent(
                "bitrix:main.include",
                "",
                Array(
                  "AREA_FILE_SHOW" => "file",
                  "AREA_FILE_SUFFIX" => "inc",
                  "EDIT_TEMPLATE" => "",
                  "PATH" => "/include/phone.php"
                )
              );?>
              </span></a>
              <a href="#"><span class="text-black fl-bigmug-line-email64"></span> <span class="d-none d-md-inline-block ml-2">
              <?$APPLICATION->IncludeComponent(
                "bitrix:main.include",
                "",
                Array(
                  "AREA_FILE_SHOW" => "file",
                  "AREA_FILE_SUFFIX" => "inc",
                  "EDIT_TEMPLATE" => "",
                  "PATH" => "/include/email.php"
                )
              );?>
              </span></a>
            </p>  
          </div>
          <div class="col-6 col-md-6 text-right">
            <?$APPLICATION->IncludeComponent(
              "bitrix:main.include",
              "",
              Array(
                "AREA_FILE_SHOW" => "file",
                "AREA_FILE_SUFFIX" => "inc",
                "EDIT_TEMPLATE" => "",
                "PATH" => "/include/facebook_link.php",
              ),
            );?>

            <?$APPLICATION->IncludeComponent(
                "bitrix:main.include",
                "",
                Array(
                  "AREA_FILE_SHOW" => "file",
                  "AREA_FILE_SUFFIX" => "inc",
                  "EDIT_TEMPLATE" => "",
                  "PATH" => "/include/twitter_link.php"
                )
              );?>
            
            <?$APPLICATION->IncludeComponent(
              "bitrix:main.include",
              "",
              Array(
                "AREA_FILE_SHOW" => "file",
                "AREA_FILE_SUFFIX" => "inc",
                "EDIT_TEMPLATE" => "",
                "PATH" => "/include/linkedin_link.php"
              )
            );?>
          </div>
        </div>
      </div>
      
    </div>
    <div class="site-navbar">
        <div class="container py-1">
          <div class="row align-items-center">
            <div class="col-8 col-md-8 col-lg-4">
              <h1 class=""><a href="/" class="h5 text-uppercase text-black"><strong>
                <?$APPLICATION->IncludeComponent(
                  "bitrix:main.include",
                  "",
                  Array(
                    "AREA_FILE_SHOW" => "file",
                    "AREA_FILE_SUFFIX" => "inc",
                    "EDIT_TEMPLATE" => "",
                    "PATH" => "/include/site_name.php",
                  )
                );?>
              <span class="text-danger">.</span></strong></a></h1>
            </div>
            <div class="col-4 col-md-4 col-lg-8">
              <!-- <nav class="site-navigation text-right text-md-right" role="navigation"> -->

                <!-- <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div> -->

                  <?$APPLICATION->IncludeComponent("bitrix:menu", "horizontal_top_menu", Array(
                    "ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
                      "CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
                      "DELAY" => "N",	// Откладывать выполнение шаблона меню
                      "MAX_LEVEL" => "3",	// Уровень вложенности меню
                      "MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
                      "MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
                      "MENU_CACHE_TYPE" => "Y",	// Тип кеширования
                      "MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
                      "ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
                      "USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
                      "COMPONENT_TEMPLATE" => "horizontal_multilevel"
                    ),
                    false
                  );?>

                <!-- <ul class="site-menu js-clone-nav d-none d-lg-block">
                  <li class="active">
                    <a href="index.html">Home</a>
                  </li>
                  <li class="has-children">
                    <a href="properties.html">Properties</a>
                    <ul class="dropdown">
                      <li><a href="#">Buy</a></li>
                      <li><a href="#">Rent</a></li>
                      <li><a href="#">Lease</a></li>
                      <li class="has-children">
                        <a href="#">Menu</a>
                        <ul class="dropdown">
                          <li><a href="#">Menu One</a></li>
                          <li><a href="#">Menu Two</a></li>
                          <li><a href="#">Menu Three</a></li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                  <li><a href="blog.html">Blog</a></li>
                  <li><a href="about.html">About</a></li>
                  <li><a href="contact.html">Contact</a></li>
                </ul>
              </nav> -->
            </div>
           

          </div>
        </div>
      </div>
    </div>
    
    <?if ($APPLICATION->GetCurPage(true) == SITE_DIR."index.php"){?><?} else {?>
      <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(<?=SITE_TEMPLATE_PATH . '/images/hero_bg_2.jpg'?>);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-10">
            <h1 class="mb-2"><?$APPLICATION->ShowTitle();?></h1>
            <div>
              <?$APPLICATION->IncludeComponent(
                "bitrix:breadcrumb",
                "nav2",
                Array(
                  "PATH" => "",
                  "SITE_ID" => "s1",
                  "START_FROM" => "0"
                )
              );?>
              <!-- <a href="index.html">Home</a> <span class="mx-2 text-white">&bullet;</span> <strong class="text-white">About</strong> -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <?}?>