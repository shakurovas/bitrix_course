<?php
use Bitrix\Main\Page\Asset;
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$asset = Asset::getInstance();

IncludeTemplateLangFile(__FILE__);
// $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/index.js"); #Подключаем к шаблону файлы скриптов
SITE_TEMPLATE_PATH;
// $APPLICATION->GetCurPage(false) === '/';
?>

<footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="mb-5">
              <?$APPLICATION->IncludeComponent(
                "bitrix:main.include",
                "",
                Array(
                  "AREA_FILE_SHOW" => "file",
                  "AREA_FILE_SUFFIX" => "inc",
                  "EDIT_TEMPLATE" => "",
                  "PATH" => "/include/about_in_footer.php"
                )
              );?>
            </div>
          </div>
          <div class="col-lg-4 mb-5 mb-lg-0">
            <div class="row mb-5">

              <?$APPLICATION->IncludeComponent(
                "bitrix:menu", 
                "bottom_menu", 
                array(
                  "ALLOW_MULTI_SELECT" => "N",
                  "CHILD_MENU_TYPE" => "left",
                  "DELAY" => "N",
                  "MAX_LEVEL" => "1",
                  "MENU_CACHE_GET_VARS" => array(
                  ),
                  "MENU_CACHE_TIME" => "3600",
                  "MENU_CACHE_TYPE" => "Y",
                  "MENU_CACHE_USE_GROUPS" => "Y",
                  "ROOT_MENU_TYPE" => "bottom",
                  "USE_EXT" => "N",
                  "COMPONENT_TEMPLATE" => "bottom_menu"
                ),
                false
              );?>

              <!-- <div class="col-md-12">
                <h3 class="footer-heading mb-4">Navigations</h3>
              </div>
              <div class="col-md-6 col-lg-6">
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
            </div>


          </div>

          <div class="col-lg-4 mb-5 mb-lg-0">
            <!-- <h3 class="footer-heading mb-4">Follow Us</h3> -->
                  <?$APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    Array(
                      "AREA_FILE_SHOW" => "file",
                      "AREA_FILE_SUFFIX" => "inc",
                      "EDIT_TEMPLATE" => "",
                      "PATH" => "/include/follow_us_in_footer.php"
                    )
                  );?>
          </div>
          
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
              <?$APPLICATION->IncludeComponent(
                "bitrix:main.include",
                "",
                Array(
                  "AREA_FILE_SHOW" => "file",
                  "AREA_FILE_SUFFIX" => "inc",
                  "EDIT_TEMPLATE" => "",
                  "PATH" => "/include/copyright.php"
                )
              );?>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              <!-- Copyright &copy; All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a> -->
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>
        </div>
      </div>
    </footer>

  </div>

  <?php
    $asset->addJs(SITE_TEMPLATE_PATH . '/js/jquery-3.3.1.min.js');
    $asset->addJs(SITE_TEMPLATE_PATH . '/js/jquery-migrate-3.0.1.min.js');
    $asset->addJs(SITE_TEMPLATE_PATH . '/js/jquery-ui.js');
    $asset->addJs(SITE_TEMPLATE_PATH . '/js/popper.min.js');
    $asset->addJs(SITE_TEMPLATE_PATH . '/js/bootstrap.min.js');
    $asset->addJs(SITE_TEMPLATE_PATH . '/js/owl.carousel.min.js');
    $asset->addJs(SITE_TEMPLATE_PATH . '/js/mediaelement-and-player.min.js');
    $asset->addJs(SITE_TEMPLATE_PATH . '/js/jquery.stellar.min.js');
    $asset->addJs(SITE_TEMPLATE_PATH . '/js/jquery.countdown.min.js');
    $asset->addJs(SITE_TEMPLATE_PATH . '/js/jquery.magnific-popup.min.js');
    $asset->addJs(SITE_TEMPLATE_PATH . '/js/bootstrap-datepicker.min.js');
    $asset->addJs(SITE_TEMPLATE_PATH . '/js/aos.js');
    $asset->addJs(SITE_TEMPLATE_PATH . '/js/main.js');
    $asset->addJs(SITE_TEMPLATE_PATH . '/js/send_new_password.js');
  ?>
  </body>
</html>