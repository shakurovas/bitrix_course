<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

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
                </ul>-->


<?if (!empty($arResult)):?>
	<nav class="site-navigation text-right text-md-right" role="navigation">
		<div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>
			<ul class="site-menu js-clone-nav d-none d-lg-block">
				<?
				$previousLevel = 0;
				foreach($arResult as $arItem):?>

					<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
						<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
					<?endif?>

					<?if ($arItem["IS_PARENT"]):?>

						<?if ($arItem["DEPTH_LEVEL"] == 1):?>
							<li class="has-children <?if ($arItem['SELECTED']):?>active<?endif?>"><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
								<ul class="dropdown">
						<?elseif($arItem['DEPTH_LEVEL'] == 2):?>
							<li class="has-children <?if ($arItem['SELECTED']):?>active<?endif?>"><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
								<ul class="dropdown">
						<?else:?>
							<li<?if ($arItem["SELECTED"]):?> class="active"<?endif?>><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
								<ul>
						<?endif?>

					<?else:?>

						<?if ($arItem["PERMISSION"] > "D"):?>

							<?if ($arItem["DEPTH_LEVEL"] == 1):?>
								<li<?if ($arItem["SELECTED"]):?> class="active"<?endif?>><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
							<?else:?>
								<li<?if ($arItem["SELECTED"]):?> class="active"<?endif?>><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
							<?endif?>

						<?endif?>

					<?endif?>

					<?$previousLevel = $arItem["DEPTH_LEVEL"];?>

				<?endforeach?>

				<?if ($previousLevel > 1)://close last item tags?>
					<?=str_repeat("</ul></li>", ($previousLevel-1) );?>
				<?endif?>
			<div class="clearboth"></div>
			</ul>
	</nav>
<?endif?>