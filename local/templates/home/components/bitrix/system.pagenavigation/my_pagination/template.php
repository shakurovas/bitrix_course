<?php

if (!defined('B_PROLOG_INCLUDED') || (B_PROLOG_INCLUDED !== true)) {
    die();
}

if (!$arResult["NavShowAlways"]) {
    if (
       (0 == $arResult["NavRecordCount"])
       ||
       ((1 == $arResult["NavPageCount"]) && (false == $arResult["NavShowAll"]))
    ) {
        return;
    }
}

$navQueryString      = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$navQueryStringFull  = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");

?>
<div class="site-pagination">
    <?php while ($arResult["nStartPage"] <= $arResult["nEndPage"]) { ?>
        <?php if ($arResult["nStartPage"] == $arResult["NavPageNomer"]) { ?>
            <a href="<?php echo $arResult["sUrlPath"] ?><?php echo $navQueryStringFull ?>" class="active"><?php echo $arResult["nStartPage"];?></a>
			<!-- <span class="active"><?php //echo $arResult["nStartPage"] ?></span> выводит текщую страничку спаном, пока не ссылкой, без цвета и без кружочка:( -->
        <?php } elseif ((1 == $arResult["nStartPage"]) && (false == $arResult["bSavePage"])) { ?>
			<!-- выводит предыдущие странички, с кружочком, в нужных цветах, всё ок -->
            <a href="<?php echo $arResult["sUrlPath"] ?><?php echo $navQueryStringFull ?>"><?php echo $arResult["nStartPage"] ?></a>
        <?php }  else { ?>
            <a href="<?php echo $arResult["sUrlPath"] ?>?<?php echo $navQueryString ?>PAGEN_<?php echo $arResult["NavNum"] ?>=<?php echo $arResult["nStartPage"] ?>"><?php echo $arResult["nStartPage"] ?></a>
        <?php } ?>
        <?php $arResult["nStartPage"]++ ?>
    <?php } ?>
</div>

