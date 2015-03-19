<?
require_once($_SERVER["DOCUMENT_ROOT"].'/dev/ajax_loader/class/ajaxLoader.php');
header('Content-Type: application/json');

// Your function
$heavyFunction = function($stepSize){
	
	sleep(2);
	
	$count = $_COOKIE['count'];
	
	for($i = 0; $i < $stepSize; $i++){
		$count++;
		$items_handled = $i;
	}
	
	setcookie("count", $count, time() + 3600);
	
	return $items_handled;
};

$stepSize = intval($_REQUEST["stepSize"]);
$ajaxLoader = new AjaxLoader();
$answer = $ajaxLoader->callFunction($stepSize, $heavyFunction);
echo json_encode($answer);
?>