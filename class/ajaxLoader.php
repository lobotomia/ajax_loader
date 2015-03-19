<?

class AjaxLoader {
	
	
	public function callFunction($stepSize, $heavyFunction){
		
		
		$answer = Array();
		
		////////////////////////////////////////////////////////////
		$start = microtime(true); // �������� ��������
		////////////////////////////////////////////////////////////
		
		if(intval($stepSize) <= 0){
			$answer["errors"][] = "stepSize �� �������";
			return false;
		}
		
		
		$answer["items_handled"] = $heavyFunction($stepSize);
		
		
		////////////////////////////////////////////////////////////
		$stop = microtime(true) - $start;
		$answer["time_exec"] = $stop;
		////////////////////////////////////////////////////////////
		
		return $answer;
	}
	
	
	public function call($stepSize){
		
		$answer = Array();
		
		////////////////////////////////////////////////////////////
		$start = microtime(true); // �������� ��������
		////////////////////////////////////////////////////////////
		
		if(intval($stepSize) <= 0){
			$answer["errors"][] = "stepSize �� �������";
		}
		
		
		
		if(!CModule::IncludeModule("sale")){
			$answer["errors"][] = "������ sale �� ���������";
		}
		
		$i = 0;
		while($i < $stepSize){
			CSaleUser::DeleteOldAgent(30);
			$i++;
		}
		
		
		
		////////////////////////////////////////////////////////////
		$stop = microtime(true) - $start;
		$answer["time_exec"] = $stop;
		////////////////////////////////////////////////////////////
		
		$answer["items_handled"] = $i;
		
		return $answer;
	}
	
	function __construct(){
		
	}
}

?>