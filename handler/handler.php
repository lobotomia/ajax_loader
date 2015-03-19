<?
require_once($_SERVER["DOCUMENT_ROOT"].'/dev/ajax_loader/class/ajaxLoader.php');
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
header('Content-Type: application/json');

$bxHeavyFunction = function($stepSize){
	
	if(!CModule::IncludeModule("sale")){
		$answer["errors"][] = "Модуль sale не подключен";
	}
	
	global $DB;
	$nDays = IntVal(21);
	$strSql =
	"SELECT ID ".
	"FROM b_sale_fuser ".
	"WHERE TO_DAYS(DATE_UPDATE)<(TO_DAYS(NOW())-".$nDays.") LIMIT ".$stepSize;
	
	$db_res = $DB->Query($strSql, false, "File: ".__FILE__."<br>Line: ".__LINE__);
	
	$i = 0;
	while ($ar_res = $db_res->Fetch()){
		CSaleBasket::DeleteAll($ar_res["ID"], false);
		CSaleUser::Delete($ar_res["ID"]);
		$i++;
	}
	
	return $i;
};

$stepSize = intval($_REQUEST["stepSize"]);
$ajaxLoader = new AjaxLoader();
$answer = $ajaxLoader->callFunction($stepSize, $bxHeavyFunction);

echo json_encode($answer);
?>