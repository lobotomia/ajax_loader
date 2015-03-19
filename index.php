<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
require_once($_SERVER["DOCUMENT_ROOT"].'/dev/ajax_loader/class/ajaxLoader.php');
//error_reporting(E_ALL);

$APPLICATION->AddHeadString('<link href="/dev/ajax_loader/css/style.css" rel="stylesheet" media="all">');
//$APPLICATION->AddHeadString('<script src="/dev/ajax_loader/js/ajaxloader.js"></script>');
//$APPLICATION->AddHeadScript('/dev/ajax_loader/js/ajaxloader.js');
//<script type="text/javascript" src="/dev/ajax_loader/js/ajaxloader.js" /></script>
?>


<script type="text/javascript">
	$(document).ready(function(){
		$.ajaxloader({
			"stepSize" : 5000,
			"handler" : "/dev/ajax_loader/handler/handler.php"
		});
	});
</script>


<button id="ajaxloader-button">Запустить</button>
<br><br>
<div id="ajaxloader-message">
Скрипт не запускался
</div>
<div id="report-container">
	<div class="report-header">
		<span>Номер обращения</span>
		<span>Обработано</span>
		<span>Время исполнения</span>
		<span>Статус</span>
	</div>
</div>





<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>