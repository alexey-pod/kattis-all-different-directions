<?

class caseClass {
	
	private $file = '';
	private $counted_case = array();
	
	public function __construct($file){
		$this->file = $file;
	}
	
	public function countMove(){
		
		$case_array = $this->parseData();
		
		$counted = array();

		foreach($case_array as $key=>$val) {
			$counted[] = $this->countCase($val);
		}
		
		$this->printResult();
	}
	
	private function printResult(){
		$str = '';
		foreach($this->counted_case as $key=>$val) {
			$str .= round($val[0], 4)." ".round($val[1], 4)." ".round($val[2], 5).PHP_EOL;
		}
		header("Content-Type: text/plain; charset=utf-8");
		echo $str;
	}
		
	private function countCase($case){
		
		$point_array = array();
		$x_sum = 0;
		$y_sum = 0;
		
		foreach($case as $line){
			$point_obj = new Point($line);
			$point = $point_obj->getPoint();
			$point_array[] = $point;
			$x_sum += $point[0];
			$y_sum += $point[1];
		}
		
		// count avg x,y
		$total_move = count($point_array);
		$avg_x = $x_sum / $total_move;
		$avg_y = $y_sum / $total_move;
		
		// count path length
		$length = 0;
		foreach ($point_array  as $key=>$val){
			$point_length = pow($val[0] - $avg_x, 2) + pow($val[1] - $avg_y, 2);
			if ($point_length > $length){
				$length = $point_length;
			}
		}
		$length = sqrt($length);
		
		$this->counted_case[] = array($avg_x, $avg_y, $length);
	}
	
	private function parseData(){
		
		$data = file($this->file);
		$case_array = $this->case_array;
		foreach($data as $key=>$val){
			$line = trim($val);
			if (is_numeric($line)) {
				if (intval($line) > 0){
					$case_array[] = array();
				}
			}else{
				$case_array[count($case_array)-1][] = $line;
			}
		}
		return $case_array;
	}
	
	
}

?>