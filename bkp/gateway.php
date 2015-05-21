<?php
require_once('database.php');
/**
* 
*/
class Gateway // extends AnotherClass
{
		
	private $con;

	function __construct()
	{
		//die(var_dump($con));
	}

	public function Save($obj, $json_response=FALSE)
	{
		$rs = $this->insertDB($obj->save());
		
		if($json_response){
			return "pending...";
		}
		return $rs;

	}

	public function Retrieve($obj, $arguments=NULL, $json_response=TRUE)
	{
		if ($json_response) {
			$rs = $this->selectDB($obj->retrieve(), $obj);
			// var_dump();
			// die;
			$qtt = count($rs);
			$json_data = array(
			    "draw"            => intval( $qtt ),
			    "recordsTotal"    => intval( $qtt ),
			    "recordsFiltered" => intval( $qtt ),
			    "data"            => $rs
			);

			$rtn = json_encode($json_data);
			return($rtn);
			
		} else {
			# code...
		}
		
		return $rs;	



		// $rs = $this->insertDB($obj->save());
		
		// if($json_response){
		// 	return "pending...";
		// }
		// return $rs;

	}

	private function selectDB($sql, $obj, $params=null)
    {
        $query=Database::connect()->prepare($sql);
        $query->execute();
        // $rs = Database::connect()->lastInsertId() or die(print_r($query->errorInfo(), true));
        $rs = $query->fetchAll(PDO::FETCH_ASSOC) or die(print_r($query->errorInfo(), true));
        Database::disconnect();
        return $rs;
    }

    

	private function insertDB($sql,$params=null)
    {
        $query=Database::connect()->prepare($sql);
        $query->execute();
        $rs = Database::connect()->lastInsertId() or die(print_r($query->errorInfo(), true));
        Database::disconnect();
        return $rs;
    }

}

?>