<?php



namespace YaCMS\Core {
	
	
	class Benchmark {
		
		
		public $timemarks = array();
		public $memorymarks = array();
		
		public function  __construct() {
	 		$this->timemarks['start'] = microtime(); 
			$this->memorymarks['start'] = memory_get_usage();
		}
		
		public function mark($timemark) {
			
			$this->timemarks[$timemark] = microtime();
		}
		
		public function displaymemoryusage() {
			
			return memory_get_usage() - $this->memorymarks['start'];
		}
		
		public function displayexecutiontime() {
			
			return $this->getinterval($this->timemarks['start'] ,microtime());
		}
		
		
		public function displaymarkelapsedtime($start, $end) {
			
			return $this->getinterval($this->timemarks[$start],$this->timemarks[$end]);
		}
		
		public function displayallmarkselapsedtime($start, $end) {
			
			foreach ($this->timemarks as $mark) {
				return $this->getinterval($this->timemarks[$start],$this->timemarks[$end]);
			}
		}
		
		function echostats($modo) {
			echo ("Modo:" . $modo . "<br>");
			echo ("Tiempo CPU: " . number_format($this->displayexecutiontime(),3) . " Segundos<br>");
			echo ("Uso de RAM: " . number_format($this->displaymemoryusage() / (1024*1024) ,3)  . "Mb<br>");
			echo ("MAX RAM: " . number_format(memory_get_peak_usage() / (1024*1024),3) . "Mb<br>");
	
			
		}
		
		
		private function getinterval($starttime, $endtime) {
			$start = explode(' ', $starttime);
			$end = explode(' ', $endtime);
			return ($end[1]+$end[0]) - ($start[1]+$start[0]);
		}
	}
	
}
?>