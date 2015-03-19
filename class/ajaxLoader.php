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
}

?>