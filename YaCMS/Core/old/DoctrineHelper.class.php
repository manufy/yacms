<?php

namespace IWeb\Core {
	
	use Doctrine\ORM\Query; // Para la constante de Hydrate
	spl_autoload_register();
// TODO: Quitar el extends
	class DoctrineHelper {
		
		public function getdqlquery($dql) {
			$query = $this->entitymanager->createQuery($dql);
			$result = $query->getResult();
			return $result;
		}
	
		public function getdqlqueryasarray($dql) {
			$query = $this->entitymanager->createQuery($dql);
			$result = $query->getResult(Query::HYDRATE_ARRAY);
			return $result;
		}
		
		public function getdqlqueryasjson($dql) {
			
			$result = $this->getdqlqueryasarray($dql);
			$dh = new DoctrineHelper();
			$jh = new JSONHelper();

			$rows = $dh->getdqlqueryasarray($dql);
			$result = json_encode($jh->getjsondataarray($page=1, $records=1, $total=1, $rows));
			
			return $result;
			
			
		}
		
		
		
	}
	
}
?>