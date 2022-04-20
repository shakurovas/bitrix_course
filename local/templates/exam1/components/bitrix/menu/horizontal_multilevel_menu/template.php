<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
// echo '<pre>';
// print_r($arResult);
// echo '</pre>';
// echo '<pre>';
// print_r($aMenuLinks);
// echo '</pre>';
?>


<?if (!empty($arResult)):?>
	<nav class="nav">
		<div class="inner-wrap">
			<div class="menu-block popup-wrap">
				<a href="" class="btn-menu btn-toggle"></a>
				<div class="menu popup-block">
					<ul class="">
					<li class="main-page"><a href="/s2/">Главная</a>
                    </li>
					<?
					$previousLevel = 0;
					foreach($arResult as $arItem):?>
						<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
							<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
						<?endif?>

						<?if ($arItem["IS_PARENT"]):?>
							<?if ($arItem["DEPTH_LEVEL"] == 1):?>
								<li><a href="<?=$arItem["LINK"]?>" class="<?if ($arItem["SELECTED"]):?>color-green<?endif?>"><?=$arItem["TEXT"]?></a>
									<ul>
									<?if($arItem['PARAMS']['TEXT']):?>
										<div class="menu-text">
											<? echo $arItem['PARAMS']['TEXT'];?>
										</div>
									<?endif;?>
									
							<?else:?>
								<li<?if ($arItem["SELECTED"]):?> class="color-green"<?endif;?>><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
									<ul>
									<?if($arItem['PARAMS']['TEXT2']):?>
										<div class="menu-text">
											<? echo $arItem['PARAMS']['TEXT2'];?>
										</div>
									<?endif;?>

							<?endif?>

						<?else:?>

							<?if ($arItem["PERMISSION"] > "D"):?>

								<?if ($arItem["DEPTH_LEVEL"] == 1):?>
									<li><a href="<?=$arItem["LINK"]?>" class="<?if ($arItem["SELECTED"]):?>color-green<?endif?>"><?=$arItem["TEXT"]?></a></li>
								<?else:?>
									<li<?if ($arItem["SELECTED"]):?> class="color-green"<?endif?>><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
								<?endif?>

							<?//else:?>

								<?//if ($arItem["DEPTH_LEVEL"] == 1):?>
									<!-- <li><a href="" class="<?//if ($arItem["SELECTED"]):?>color-green<?//endif?>" title="<?//=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?//=$arItem["TEXT"]?></a></li> -->
								<?//else:?>
									<!-- <li><a href="" class="denied" title="<?//=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?//=$arItem["TEXT"]?></a></li> -->
								<?//endif?>

							<?endif?>

						<?endif?>
						<?$previousLevel = $arItem["DEPTH_LEVEL"];?>

					<?endforeach?>

					<?if ($previousLevel > 1)://close last item tags?>
						<?=str_repeat("</ul></li>", ($previousLevel-1) );?>
					<?endif?>
					<div class="clearboth"></div>
					</ul>
                        <a href="" class="btn-close"></a>
                    </div>
                <div class="menu-overlay"></div>
			</div>
		</div>
	</nav>
<?endif?>
