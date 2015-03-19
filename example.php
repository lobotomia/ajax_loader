<?
header("Content-Type: text/html; charset=cp1251");
require_once($_SERVER["DOCUMENT_ROOT"].'/dev/ajax_loader/class/ajaxLoader.php');
?>

<html>
	<head>
		<link href="/dev/ajax_loader/css/style.css" rel="stylesheet" media="all">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
		<script src="/dev/ajax_loader/js/ajaxloader.js"></script>
	</head>
	<body>
		<script type="text/javascript">
			$(document).ready(function(){
				$.ajaxloader({
					"stepSize" : 5,
					"handler" : "/dev/ajax_loader/handler/test.php"
				});
			});
		</script>
		<div id="ajaxloader">
			<button id="ajaxloader-button">���������</button>
			<br><br>
			<div id="ajaxloader-message">
				������ �� ����������
			</div>
			<div id="report-container">
				<div class="report-header">
					<span>����� ���������</span>
					<span>����������</span>
					<span>����� ����������</span>
					<span>������</span>
				</div>
			</div>
		</div>
	</body>
</html>
