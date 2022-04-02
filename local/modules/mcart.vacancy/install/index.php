<?
IncludeModuleLangFile( __FILE__);
if(class_exists("mcart_vacancy")) return;

Class mcart_vacancy extends CModule
{
    var $MODULE_ID = "mcart.vacancy";
    var $MODULE_WEBFORM = "mcart_vacancy";
    var $MODULE_WEBFORM2 = "mcart_vacancy_respond";
    var $MODULE_VERSION;
    var $MODULE_VERSION_DATE;
    var $MODULE_NAME;
    var $MODULE_DESCRIPTION;
    var $MODULE_GROUP_RIGHTS = "Y";


    function __construct()
    {
        $arModuleVersion = array();

        $path = str_replace("\\", "/", __FILE__);
        $path = substr($path, 0, strlen($path) - strlen("/index.php"));
        include($path."/version.php");

        if (is_array($arModuleVersion) && array_key_exists("VERSION", $arModuleVersion)){
            $this->MODULE_VERSION = $arModuleVersion["VERSION"];
            $this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
        }else{
            $this->MODULE_VERSION=MODULE_VERSION;
            $this->MODULE_VERSION_DATE=MODULE_VERSION_DATE;
        }

        $this->MODULE_NAME = GetMessage("VACANCY_MODULE_NAME");
        $this->MODULE_DESCRIPTION = GetMessage("VACANCY_MODULE_DESCRIPTION");

        $this->PARTNER_NAME = GetMessage("VACANCY_PARTNER_NAME");
        $this->PARTNER_URI  = "http://mcart.ru/";
    }

    function DoInstall()
    {
        global $APPLICATION;

        if (!IsModuleInstalled("mcart.vacancy"))
        {
            $this->InstallDB();
            $this->InstallEvents();
            $this->InstallFiles();

        }
        return true;
    }

    function DoUninstall()
    {
        $this->UnInstallDB();
        $this->UnInstallEvents();
        $this->UnInstallFiles();

        return true;
    }


    function InstallDB() {

        global $APPLICATION, $step;
        if ($step==5)
            return false;

        if (CModule::IncludeModule('iblock')){

            $isnewiblock = IntVal($_REQUEST["isnewiblock"]);
            $webform_id = IntVal($_REQUEST["webform_id"]);
            if($step < 2)
            {
                if (phpversion()<"5.2.6")
                    $APPLICATION->IncludeAdminFile(GetMessage("VACANCY_INSTALL_QUESTION"), $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/mcart.vacancy/install/step_escape.php");
                else
                    $APPLICATION->IncludeAdminFile(GetMessage("VACANCY_INSTALL_QUESTION"), $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/mcart.vacancy/install/step1.php");
            }
            elseif($step==2)
            {
                if ($isnewiblock==1)
                {
                    CModule::includeModule('form');
                    $webform_id	= 	$this->AddWF();
                    $webform_id2	= 	$this->AddWF2();
                    $iblock_id	= 	$this->AddIB(GetMessage('VACANCY'), 'vacancy');
                    if ($iblock_id && $webform_id && $webform_id2                )
                        $step = 4;
                }
                else
                    $APPLICATION->IncludeAdminFile(GetMessage("VACANCY_STEP2_TITLE"), $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/mcart.vacancy/install/step2.php");

            }

            if ($step==4)
            {
                if(!isset($iblock_id))
                    $iblock_id = IntVal($_REQUEST["id_iblock"]);

                $ib = new CIBlock;
                $ib->Update($iblock_id, array('EDIT_FILE_BEFORE' => '/bitrix/modules/mcart.vacancy/include.php'));

                CModule::includeModule('form');
                $webform_id ? $this->UpdateWF( $webform_id ) : $webform_id = $this->AddWF();
                $webform_id2 ? $this->UpdateWF( $webform_id2 ) : $webform_id = $this->AddWF2();

                COption::SetOptionInt($this->MODULE_ID, 'VACANCY_IBLOCK_ID', (int) $iblock_id);
                COption::SetOptionInt($this->MODULE_ID, 'VACANCY_WEBFORM_ID', (int) $webform_id);
                COption::SetOptionInt($this->MODULE_ID, 'VACANCY_WEBFORM_ID2', (int) $webform_id2);

                $txt = file_get_contents($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/mcart.vacancy/admin/export_vacancies_back.php");
                $export_vacancies_text = str_replace ( "VACANCY_DOCUMENT_ROOT" , '"'.$_SERVER["DOCUMENT_ROOT"].'"', $txt);
                $handle = fopen($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/mcart.vacancy/admin/export_vacancies.php", "w");
                fwrite($handle, $export_vacancies_text);
                fclose($handle);

            }
        }

        RegisterModule("mcart.vacancy");
        return true;
    }

    function UnInstallDB()
    {
        UnRegisterModule("mcart.vacancy");
        return true;
    }

    function InstallEvents()
    {
        return true;
    }

    function UnInstallEvents()
    {
        return true;
    }

    function InstallFiles()
    {
        CopyDirFiles($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/mcart.vacancy/install/admin", $_SERVER["DOCUMENT_ROOT"]."/bitrix/admin", true);
        CopyDirFiles($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/mcart.vacancy/install/components/", $_SERVER["DOCUMENT_ROOT"]."/bitrix/components", true, true);
        return true;
    }

    function UnInstallFiles()
    {
        DeleteDirFilesEx("/bitrix/components/mcart/vacansii");
        DeleteDirFiles($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/mcart.vacancy/install/admin/", $_SERVER["DOCUMENT_ROOT"]."/bitrix/admin");
        return true;
    }

    function UpdateWF($webform_id){
        // update default field speciality
        $rsField = CFormField::GetByID('Speciality', $webform_id);
        $arField = $rsField->Fetch();
        $arANSWER = Array('MESSAGE' => 'Специальность','FIELD_TYPE' => 'hidden',"FIELD_PARAM" => "id=\"form_Sdring_peciality\" class=\"inputtext\"",'C_SORT' => 100,'ACTIVE' => 'Y');
        $arFields = array(
            "FORM_ID" => $webform_id,
            "arANSWER"=> array($arANSWER),
            'C_SORT' => 100,
            "ACTIVE" => "Y",
            'SID' => 'Speciality',
            'TITLE_TYPE' => 'text',
            'TITLE' => 'Специальность',
            'IN_RESULTS_TABLE' => 'Y',
            'IN_EXCEL_TABLE' => 'Y',
        );
        (int) $arField['ID'] ? CFormField::Set($arFields, (int) $arField['ID']) : CFormField::Set($arFields);
    }
    function AddWF(){
        // get default form
        $rsForm = CForm::GetBySID( $this->MODULE_WEBFORM );
        $arForm = $rsForm->Fetch();
        if( (int) $arForm['ID'] ){
            $this->UpdateWF($arForm['ID']);
            return $arForm['ID'];
        }else{
            CModule::includeModule('site');
            // array sites bitrix
            $rsSites = CSite::GetList($by="sort", $order="desc", Array());
            while ($arSite = $rsSites->Fetch())
                $sites[] = $arSite['LID'];

            // create new webform
            $arFields = array(
                "SID"               => $this->MODULE_WEBFORM,
                "C_SORT"            => 500,
                "NAME"              => GetMessage('VACANCY_FORM'),
                "BUTTON"            => GetMessage("VACANCY_SAVE"),
                "DESCRIPTION"       => '',
                "DESCRIPTION_TYPE"  => "text",
                "STAT_EVENT1"       => "form",
                "STAT_EVENT2"       => $this->MODULE_WEBFORM,
                "arSITE"       			=> empty($sites) ? array() : $sites,
                "arMENU"            => array("ru" => "Рекомендовать кандидата", "en" => "Recommend a candidate"),
            );
            $FORM_ID = CForm::Set($arFields, $form_id = false, $check_rights = "Y");

            if ($FORM_ID){

                $arANSWER = Array('MESSAGE' => 'Специальность','FIELD_TYPE' => 'hidden',"FIELD_PARAM" => "id=\"form_Sdring_peciality\" class=\"inputtext\"",'C_SORT' => 100,'ACTIVE' => 'Y');
                $arFields = array(
                    "FORM_ID" => $FORM_ID,
                    "arANSWER"=> array($arANSWER),
                    'C_SORT' => 100,
                    "ACTIVE" => "Y",
                    'SID' => 'Speciality',
                    'TITLE_TYPE' => 'text',
                    'TITLE' => 'Специальность',
                    'IN_RESULTS_TABLE' => 'Y',
                    'IN_EXCEL_TABLE' => 'Y',
                );
                CFormField::Set($arFields);

                $arANSWER = Array('MESSAGE' => 'ФИО','FIELD_TYPE' => 'text',"FIELD_PARAM" => "class=\"inputtext\"",'C_SORT' => 100,'ACTIVE' => 'Y');
                $arFields = array(
                    "FORM_ID" => $FORM_ID,
                    "arANSWER"=> array($arANSWER),
                    'C_SORT' => 200,
                    "ACTIVE" => "Y",
                    'SID' => 'Friend',
                    'TITLE_TYPE' => 'text',
                    'TITLE' => 'Кого рекомендуете',
                    'IN_RESULTS_TABLE' => 'Y',
                    'IN_EXCEL_TABLE' => 'Y',
                );
                CFormField::Set($arFields);

                $arANSWER = Array('MESSAGE' => 'Прикрепите файл','FIELD_TYPE' => 'file', "FIELD_PARAM" => "class=\"inputtext\"",'C_SORT' => 100,'ACTIVE' => 'Y');
                $arFields = array(
                    "FORM_ID" => $FORM_ID,
                    "arANSWER"=> array($arANSWER),
                    'C_SORT' => 300,
                    "ACTIVE" => "Y",
                    'SID' => 'File',
                    'TITLE_TYPE' => 'text',
                    'TITLE' => 'Резюме',
                    'IN_RESULTS_TABLE' => 'Y',
                    'IN_EXCEL_TABLE' => 'Y',
                );
                CFormField::Set($arFields);

                $arANSWER = Array('MESSAGE' => 'Ссылка','FIELD_TYPE' => 'url',"FIELD_PARAM" => "class=\"inputtext\"",'C_SORT' => 100,'ACTIVE' => 'Y');
                $arFields = array(
                    "FORM_ID" => $FORM_ID,
                    "arANSWER"=> array($arANSWER),
                    'C_SORT' => 400,
                    "ACTIVE" => "Y",
                    'SID' => 'Link',
                    'TITLE_TYPE' => 'text',
                    'TITLE' => 'Профиль кандидата',
                    'IN_RESULTS_TABLE' => 'Y',
                    'IN_EXCEL_TABLE' => 'Y',
                );
                CFormField::Set($arFields);

                $arANSWER = Array('MESSAGE' => ' ','FIELD_TYPE' => 'email',"FIELD_PARAM" => "class=\"inputtext\"",'C_SORT' => 100,'ACTIVE' => 'Y');
                $arFields = array(
                    "FORM_ID" => $FORM_ID,
                    "arANSWER"=> array($arANSWER),
                    'C_SORT' => 400,
                    "ACTIVE" => "Y",
                    'SID' => 'email',
                    'TITLE_TYPE' => 'email',
                    'TITLE' => 'E-MAIL',
                    'IN_RESULTS_TABLE' => 'Y',
                    'IN_EXCEL_TABLE' => 'Y',
                );

                CFormField::Set($arFields);

                $arANSWER = Array('MESSAGE' => ' ','FIELD_TYPE' => 'text',"FIELD_PARAM" => "class=\"inputtext\"",'C_SORT' => 100,'ACTIVE' => 'Y');
                $arFields = array(
                    "FORM_ID" => $FORM_ID,
                    "arANSWER"=> array($arANSWER),
                    'C_SORT' => 400,
                    "ACTIVE" => "Y",
                    'SID' => 'tel',
                    'TITLE_TYPE' => 'tel',
                    'TITLE' => 'Контактный телефон',
                    'IN_RESULTS_TABLE' => 'Y',
                    'IN_EXCEL_TABLE' => 'Y',
                );

                CFormField::Set($arFields);

                $arANSWER = Array('MESSAGE' => ' ','FIELD_TYPE' => 'textarea',"FIELD_PARAM" => "class=\"inputtextarea\"",'C_SORT' => 100,'ACTIVE' => 'Y');
                $arFields = array(
                    "FORM_ID" => $FORM_ID,
                    "arANSWER"=> array($arANSWER),
                    'C_SORT' => 500,
                    "ACTIVE" => "Y",
                    'SID' => 'Comment',
                    'TITLE_TYPE' => 'text',
                    'TITLE' => 'Комментарий для HR',
                    'IN_RESULTS_TABLE' => 'Y',
                    'IN_EXCEL_TABLE' => 'Y',
                );
                CFormField::Set($arFields);

                $arFields = array(
                    "FORM_ID"             => $FORM_ID,
                    "C_SORT"              => 100,
                    "ACTIVE"              => "Y",
                    "DEFAULT_VALUE"       => "Y",
                    "TITLE"               => "Новый",
                    "DESCRIPTION"         => "",
                    "CSS"                 => "statusgreen",
                );
                CFormStatus::Set($arFields);
                return $FORM_ID;
            }
        }
    }

    function AddWF2(){
        // get default form
        $rsForm = CForm::GetBySID( $this->MODULE_WEBFORM2 );
        $arForm = $rsForm->Fetch();
        if( (int) $arForm['ID'] ){
            $this->UpdateWF($arForm['ID']);
            return $arForm['ID'];
        }else{
            CModule::includeModule('site');
            // array sites bitrix
            $rsSites = CSite::GetList($by="sort", $order="desc", Array());
            while ($arSite = $rsSites->Fetch())
                $sites[] = $arSite['LID'];

            // create new webform
            $arFields = array(
                "SID"               => $this->MODULE_WEBFORM2,
                "C_SORT"            => 500,
                "NAME"              => GetMessage('VACANCY_FORM2'),
                "BUTTON"            => GetMessage("VACANCY_SAVE"),
                "DESCRIPTION"       => '',
                "DESCRIPTION_TYPE"  => "text",
                "STAT_EVENT1"       => "form",
                "STAT_EVENT2"       => $this->MODULE_WEBFORM2,
                "arSITE"       			=> empty($sites) ? array() : $sites,
                "arMENU"            => array("ru" => GetMessage('VACANCY_FORM2'), "en" => "Respond"),
            );
            $FORM_ID = CForm::Set($arFields, $form_id = false, $check_rights = "Y");

            if ($FORM_ID){

                $arANSWER = Array('MESSAGE' => 'Специальность','FIELD_TYPE' => 'hidden',"FIELD_PARAM" => "id=\"form_Sdring_peciality\" class=\"inputtext\"",'C_SORT' => 100,'ACTIVE' => 'Y');
                $arFields = array(
                    "FORM_ID" => $FORM_ID,
                    "arANSWER"=> array($arANSWER),
                    'C_SORT' => 100,
                    "ACTIVE" => "Y",
                    'SID' => 'Speciality',
                    'TITLE_TYPE' => 'text',
                    'TITLE' => 'Специальность',
                    'IN_RESULTS_TABLE' => 'Y',
                    'IN_EXCEL_TABLE' => 'Y',
                );
                CFormField::Set($arFields);



                $arANSWER = Array('MESSAGE' => ' ','FIELD_TYPE' => 'email',"FIELD_PARAM" => "class=\"inputtext\"",'C_SORT' => 100,'ACTIVE' => 'Y');
                $arFields = array(
                    "FORM_ID" => $FORM_ID,
                    "arANSWER"=> array($arANSWER),
                    'C_SORT' => 400,
                    "ACTIVE" => "Y",
                    'SID' => 'email',
                    'TITLE_TYPE' => 'email',
                    'TITLE' => 'E-MAIL',
                    'IN_RESULTS_TABLE' => 'Y',
                    'IN_EXCEL_TABLE' => 'Y',
                );

                CFormField::Set($arFields);

                $arANSWER = Array('MESSAGE' => ' ','FIELD_TYPE' => 'text',"FIELD_PARAM" => "class=\"inputtext\"",'C_SORT' => 100,'ACTIVE' => 'Y');
                $arFields = array(
                    "FORM_ID" => $FORM_ID,
                    "arANSWER"=> array($arANSWER),
                    'C_SORT' => 400,
                    "ACTIVE" => "Y",
                    'SID' => 'tel',
                    'TITLE_TYPE' => 'tel',
                    'TITLE' => 'Контактный телефон',
                    'IN_RESULTS_TABLE' => 'Y',
                    'IN_EXCEL_TABLE' => 'Y',
                );

                CFormField::Set($arFields);

                $arANSWER = Array('MESSAGE' => ' ','FIELD_TYPE' => 'textarea',"FIELD_PARAM" => "class=\"inputtextarea\"",'C_SORT' => 100,'ACTIVE' => 'Y');
                $arFields = array(
                    "FORM_ID" => $FORM_ID,
                    "arANSWER"=> array($arANSWER),
                    'C_SORT' => 500,
                    "ACTIVE" => "Y",
                    'SID' => 'Comment',
                    'TITLE_TYPE' => 'text',
                    'TITLE' => 'Комментарий для HR',
                    'IN_RESULTS_TABLE' => 'Y',
                    'IN_EXCEL_TABLE' => 'Y',
                );
                CFormField::Set($arFields);

                $arFields = array(
                    "FORM_ID"             => $FORM_ID,
                    "C_SORT"              => 100,
                    "ACTIVE"              => "Y",
                    "DEFAULT_VALUE"       => "Y",
                    "TITLE"               => "Новый",
                    "DESCRIPTION"         => "",
                    "CSS"                 => "statusgreen",
                );
                CFormStatus::Set($arFields);
                return $FORM_ID;
            }
        }
    }

    function AddIB($name, $code){

        $str_type = GetMessage("VACANCY_IBLOCK_TYPE_ID");
        $str_type_ru =GetMessage("VACANCY");
        $db_iblock_type =CIBlockType::GetByID(GetMessage("VACANCY"));
        if (!$db_iblock_type->Fetch())
        {$arFields = Array(
            'ID'=>GetMessage("VACANCY_IBLOCK_TYPE_ID"),
            'SECTIONS'=>'Y',
            'IN_RSS'=>'N',
            'SORT'=>100,
            'LANG'=>Array(
                'en'=>Array(
                    'NAME'=>$str_type),
                'ru'=>Array(
                    'NAME'=>$str_type_ru)
            )
        );

            $obBlocktype = new CIBlockType;
            if (!$res = $obBlocktype->Add($arFields))
            {
                echo "error:".$obBlocktype->LAST_ERROR;
                return false;
            }
        }

        $ib = new CIBlock;
        $arFields = Array(
            "ACTIVE" => "Y",
            "NAME" => $name,
            "CODE" => $code,
            "IBLOCK_TYPE_ID" => GetMessage("VACANCY_IBLOCK_TYPE_ID"),
            "SITE_ID" => Array("s1") ,
            'WORKFLOW' => 'N',
            "FIELDS" => array(
                "CODE" => array(
                    "IS_REQUIRED" => "Y", // Обязательное
                    "DEFAULT_VALUE" => array(
                        "UNIQUE" => "Y", // Проверять на уникальность
                        "TRANSLITERATION" => "Y", // Транслитерировать
                        "TRANS_LEN" => "30", // Максмальная длина транслитерации
                        "TRANS_CASE" => "L", // Приводить к нижнему регистру
                        "TRANS_SPACE" => "-", // Символы для замены
                        "TRANS_OTHER" => "-",
                        "TRANS_EAT" => "Y",
                        "USE_GOOGLE" => "N",
                    ),
                ),
            ),
            //'EDIT_FILE_BEFORE' => '/bitrix/modules/mcart.vacancy/include.php'
        );

        if (!($ID = $ib->Add($arFields)))
        {
            return false;
        }
        else
        {
            $this-> FillIBlocks($ID);
            return $ID;
        }
    }


    function FillIBlocks($iblock_id)
    {

        $arFields=array(
            "0" =>array(
                "IBLOCK_ID" => $iblock_id,
                "NAME" => GetMessage("VACANCY_FIELD_EMPLOYMENT"),
                "ACTIVE" => "Y",
                "SORT" => 40,
                "CODE" => "employment",
                "PROPERTY_TYPE" => "L",
                "ROW_COUNT" => 4,
                "COL_COUNT" => 30,
                "LIST_TYPE" => "L",

                "VALUES" => array(
                    "0" => array("VALUE" => GetMessage("VACANCY_FIELD_EMPLOYMENT_VALUE_FULL"),
                        "DEF" => "N",
                        "SORT" => 10),
                    "1" => array("VALUE" => GetMessage("VACANCY_FIELD_EMPLOYMENT_VALUE_SOME"),
                        "DEF" => "N",
                        "SORT" => 20),
                    "2" => array("VALUE" => GetMessage("VACANCY_FIELD_EMPLOYMENT_VALUE_TEMPORARLY"),
                        "DEF" => "N",
                        "SORT" => 30),
                    "3" => array("VALUE" => GetMessage("VACANCY_FIELD_EMPLOYMENT_VALUE_STAGE"),
                        "DEF" => "N",
                        "SORT" => 40),

                )

            ),
            "1" => array(
                "IBLOCK_ID" => $iblock_id,
                "NAME" => GetMessage("VACANCY_FIELD_STATUS"),
                "ACTIVE" => "Y",
                "SORT" => 20,
                "CODE" => "CML2_STATUS",
                "PROPERTY_TYPE" => "L",
                "LIST_TYPE" => "C",
                "VALUES" => array(
                    "0" => array("VALUE" => GetMessage("VACANCY_FIELD_STATUS_VALUE_ACTIVE"),
                        "DEF" => "Y",
                        "SORT" => 10),
                    "1" => array("VALUE" => GetMessage("VACANCY_FIELD_STATUS_VALUE_ARCHIVE"),
                        "DEF" => "N",
                        "SORT" => 20),

                )
            ),
            "2" => array(
                "IBLOCK_ID" => $iblock_id,
                "NAME" => GetMessage("VACANCY_FIELD_TOP"),
                "ACTIVE" => "Y",
                "SORT" => 30,
                "CODE" => "CML2_TOP",
                "PROPERTY_TYPE" => "L",
                "LIST_TYPE" => "C",
                "VALUES" => array(
                    "0" => array("VALUE" => "da",
                        "DEF" => "N",
                        "SORT" => 10),

                )

            ),
            "3" => array(
                "IBLOCK_ID" => $iblock_id,
                "NAME" => GetMessage("VACANCY_FIELD_CONTACT"),
                "ACTIVE" => "Y",
                "SORT" => 10,
                "CODE" => "contact",
                "PROPERTY_TYPE" => "S",
                "MULTIPLE" => "Y",
                "USER_TYPE" => "UserID"
            ),
            "4" => array(
                "IBLOCK_ID" => $iblock_id,
                "NAME" => GetMessage("VACANCY_FIELD_SALARY"),
                "ACTIVE" => "Y",
                "SORT" => 15,
                "CODE" => "salary",
                "PROPERTY_TYPE" => "S"
            ),
            "5"=> array (
                "IBLOCK_ID" => $iblock_id,
                "NAME" => GetMessage("VACANCY_FIELD_SHEDULE"),
                "ACTIVE" => "Y",
                "SORT" => 45,
                "CODE" => "shedule",
                "PROPERTY_TYPE" => "L",
                "LIST_TYPE" => "L",
                "VALUES" => array(
                    "0" => array("VALUE" => GetMessage("VACANCY_FIELD_SHEDULE_VALUE_1"),
                        "DEF" => "N",
                        "SORT" => 10),
                    "1" => array("VALUE" => GetMessage("VACANCY_FIELD_SHEDULE_VALUE_2"),
                        "DEF" => "N",
                        "SORT" => 20),
                    "2" => array("VALUE" => GetMessage("VACANCY_FIELD_SHEDULE_VALUE_3"),
                        "DEF" => "N",
                        "SORT" => 30),
                )

            ),
            "6" => array(
                "IBLOCK_ID" => $iblock_id,
                "NAME" => GetMessage("VACANCY_FIELD_REQUIREMENTS"),
                "ACTIVE" => "Y",
                "SORT" => 15,
                "CODE" => "REQUIREMENTS",
                "PROPERTY_TYPE" => "S:HTML",
                "ROW_COUNT" => 10, // Количество строк

            ),
            "7" => array(
                "IBLOCK_ID" => $iblock_id,
                "NAME" => GetMessage("VACANCY_FIELD_CONDITIONS"),
                "ACTIVE" => "Y",
                "SORT" => 15,
                "CODE" => "CONDITIONS",
                "PROPERTY_TYPE" => "S:HTML",
                "ROW_COUNT" => 10, // Количество строк
            ),
            "8" => array(
                "IBLOCK_ID" => $iblock_id,
                "NAME" => GetMessage("VACANCY_FIELD_INVITE"),
                "ACTIVE" => "Y",
                "SORT" => 15,
                "CODE" => "INVITE",
                "PROPERTY_TYPE" => "S",
                "HINT" => "да/нет",
            ),
            "9" => array(
                "IBLOCK_ID" => $iblock_id,
                "NAME" => GetMessage("VACANCY_FIELD_INNER"),
                "ACTIVE" => "Y",
                "SORT" => 15,
                "CODE" => "INNER",
                "PROPERTY_TYPE" => "S",
                "HINT" => "да/нет",
            ),
            "10" => array(
                "IBLOCK_ID" => $iblock_id,
                "NAME" => GetMessage("VACANCY_FIELD_DEPARTMENT"),
                "ACTIVE" => "Y",
                "SORT" => 15,
                "CODE" => "DEPARTMENT",
                "PROPERTY_TYPE" => "G"
            ),



            /**$arFields = Array(
            "NAME" => "[служебное] Ключевые слова (keywords)",
            "ACTIVE" => "Y",
            "SORT" => -777,
            "CODE" => "SEO_KEYWORDS",
            "PROPERTY_TYPE" => "S", // Строка
            "ROW_COUNT" => 3, // Количество строк
            "COL_COUNT" => 70, // Количество столбцов
            "IBLOCK_ID" => $ID,
            "HINT" => "Ключевые слова (keywords) для страницы товара",
            );*/

        );

        $ibp = new CIBlockProperty;
        for ($key = 0, $size = count($arFields); $key < $size; $key++){
            $PropID = $ibp->Add($arFields[$key]);}
    }
}
