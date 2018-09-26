<?

class Point
{
	private $alpha = 0;
	private $x = 0;
	private $y = 0;
	
	public function __construct($str){

		$arr = explode(" ",$str);
		$this->start( $arr[0], $arr[1] );
		array_splice($arr, 0, 2);
		
		while (!empty($arr)){

			$action = trim($arr[0]);
			$value = trim($arr[1]);
		
			switch ($action) {
				case 'start':
					$this->turn($value);
					break;
				case 'walk':
					$this->walk($value);
					break;
				case 'turn':
					$this->turn($value);
					break;
			}
			array_splice($arr,0,2);
		}
	
	}
	
	private function start($x, $y){
		$this->x = $x;
		$this->y = $y;
	}
	
	private function walk($length){
		$this->x += $length * cos(deg2rad($this->alpha));
		$this->y += $length * sin(deg2rad($this->alpha));
	}
	
	private function turn($alpha){
		$this->alpha += $alpha;
	}
	
	public function getPoint(){
		return array($this->x, $this->y);
	}
	
}

?>