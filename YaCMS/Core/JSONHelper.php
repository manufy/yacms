<?php

namespace IWeb\Core {
	class JSONHelper {
		
		
		
			public function getjsondataarray($page, $records, $total, $rows) {
			$jsondataarray = array();
			$jsondataarray['page'] = $page;
			$jsondataarray['records'] = $records;
			$jsondataarray['total'] = $total;
			foreach ($rows as $row){
				foreach($row as $key=>$value) {
					$rowdata[] = $value;
					//echo $value;
				}
				$jsonrowsarray[] = array( 'id' => 'ii', 'cell' => $rowdata);
				
			}
		
			$jsondataarray['rows'] = $jsonrowsarray;
			return $jsondataarray;
		}
		
	}
	
}
?>