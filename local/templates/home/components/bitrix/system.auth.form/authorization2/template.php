<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

CJSCore::Init();
// print_r('Hello!');
// echo '<pre>';
// print_r($arResult);
// echo '</pre>';
?>
<?
if ($arResult['SHOW_ERRORS'] == 'Y' && $arResult['ERROR'])?>
	<!-- <div class="alert alert-warning"> -->
		<?ShowMessage($arResult['ERROR_MESSAGE']);?>
	<!-- </div> -->

<?if($arResult["FORM_TYPE"] == "login"):?>

<!-- <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8 mb-5">
            <form name="system_auth_form<?//=$arResult["RND"]?>" method="post" target="_top" action="<?//=$arResult["AUTH_URL"]?>" class="p-5 bg-white border">
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Full Name</label>
                  <input type="text" id="fullname" class="form-control" placeholder="Full Name">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="email">Email</label>
                  <input type="email" id="email" class="form-control" placeholder="Email Address">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="email">Subject</label>
                  <input type="text" id="subject" class="form-control" placeholder="Enter Subject">
                </div>
              </div>
              

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="message">Message</label> 
                  <textarea name="message" id="message" cols="30" rows="5" class="form-control" placeholder="Say hello to us"></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Send Message" class="btn btn-primary  py-2 px-4 rounded-0">
                </div>
              </div>

  
            </form>
          </div>
        </div>
      </div>
    </div> -->

<?
else:
?>

<form action="<?=$arResult["AUTH_URL"]?>" class="p-5 bg-white border">
	<table width="95%">
		<tr>
			<td align="center">
				<?=$arResult["USER_NAME"]?><br />
				[<?=$arResult["USER_LOGIN"]?>]<br />
				<a href="<?=$arResult["PROFILE_URL"]?>" title="<?=GetMessage("AUTH_PROFILE")?>"><?=GetMessage("AUTH_PROFILE")?></a><br />
			</td>
		</tr>
		<tr>
			<td align="center">
			<?foreach ($arResult["GET"] as $key => $value):?>
				<input type="hidden" name="<?=$key?>" value="<?=$value?>" />
			<?endforeach?>
			<?=bitrix_sessid_post()?>
			<input type="hidden" name="logout" value="yes" />
			<input type="submit" name="logout_butt" value="<?=GetMessage("AUTH_LOGOUT_BUTTON")?>" class="btn btn-primary py-2 px-4 rounded-0" />
			</td>
		</tr>
	</table>
</form>
<?endif?>


	
