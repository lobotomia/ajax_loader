<?

class AjaxLoader {
	
	
	public function callFunction($stepSize, $heavyFunction){
		
		
		$answer = Array();
		
		////////////////////////////////////////////////////////////
		$start = microtime(true); // Замеряем скорость
		////////////////////////////////////////////////////////////
		
		if(intval($stepSize) <= 0){
			$answer["errors"][] = "stepSize не передан";
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