<?PHP
define("SERVER_BASE_URL", $_SERVER['HTTP_HOST']);

class  TableManager{

	private $conn;
	private $dbname;
	
	public function __construct($AdminID, $AdminPWD)
	{
        // Create connection
		$this->conn = new mysqli(SERVER_BASE_URL, $AdminID, $AdminPWD);
		// Check connection
		if ($this->conn->connect_error)
		{
			print "Connection failed: ".$this->conn->connect_error;
		}
		// else
		{
			//print "connected";
		}
    }
	
	private function query($sql)
	{
		$result = $this->conn->query($sql);
		return $result;
	}
	
	private function get_key_column_name($tablename)
	{
		$sql="SELECT k.column_name FROM information_schema.table_constraints t JOIN information_schema.key_column_usage k USING(constraint_name,table_schema,table_name) WHERE t.constraint_type='PRIMARY KEY'   AND t.table_schema='".$this->dbname."'   AND t.table_name='".$tablename."'";
		$result = $this->query($sql);
		$row = $result->fetch_assoc();
		$key_column_name = $row['column_name'];
		return $key_column_name;
	}
	
	public function selectdb($dbname)
	{
		$this->conn->select_db($dbname);
		$this->dbname = $dbname;
	}

	public function add_row($tablename, $rowdata)
	{
		$head = $this->get_table_head($tablename);
		$sql = "insert into ".$tablename." (";
		$i=1;
		while($i<sizeof($head)-1)
		{
			$sql=$sql.$head[$i].',';
			$i++;
		}
		$sql=$sql.$head[sizeof($head)-1].") values (";
		$i=0;
		while($i<sizeof($rowdata)-1)
		{
			if((string)(int)$rowdata[$i] != $rowdata[$i])
			{
				$sql=$sql."'".$rowdata[$i]."',";
			}else{
				$sql=$sql.$rowdata[$i].',';
			}
			$i++;
		}
		if((string)(int)$rowdata[$i] != $rowdata[$i])
		{
			$sql=$sql."'".$rowdata[$i]."')";
		}else{
			$sql=$sql.$rowdata[$i].')';
		}
		
		$this->query($sql);
	}
	
	public function delete_row($tablename,$rowid)
	{
		$idcolumn = $this->get_key_column_name($tablename);
		$sql = "delete from ".$tablename." where ".$idcolumn."=".$rowid;
		$this->query($sql);
	}
	
	public function get_table_head($tablename)
	{
		$sql = "SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='$this->dbname' AND `TABLE_NAME`='$tablename'";
		$result = $this->query($sql);
		$i=0;
		while($row = $result->fetch_assoc()) {
			$t[$i] = $row['COLUMN_NAME'];
			$i++;
		}
		return $t;
	}
	
	public function get_table_data($tablename)
	{
		$t = $this->get_table_head($tablename);
		
		$sql = "select * from ".$tablename;
		$result = $this->query($sql);
		$count=0;
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				$i=0;
				while($i<sizeof($row))
				{
					$answer[$count][$i] = $row[$t[$i]];
					$i++;
				}
				$count++;
			}
			return $answer;
		}else{
			echo "bye";
			return array();
		}
	}
	
	public function get_cell_data($tablename,$columnname,$rowid)
	{
		$idcolumn = $this->get_key_column_name($tablename);
		$sql = "select ".$columnname." from ".$tablename." where ".$idcolumn."=".$rowid;
		$result = $this->query($sql);
		$row = $result->fetch_assoc();
		$answer = $row[$columnname];
		return $answer;
	}
	
	public function update_cell_data($tablename,$columnname,$rowid,$data)
	{
		$idcolumn = $this->get_key_column_name($tablename);
		if((string)(int)$data != $data)
		{
			$sql = "update ".$tablename." set ".$columnname."='".$data."' where ".$idcolumn."=".$rowid;
		}else{
			$sql = "update ".$tablename." set ".$columnname."=".$data." where ".$idcolumn."=".$rowid;
		}
		$this->query($sql);
	}

	public function update_cell_without_id($tablename,$columnname,$rowid,$data,$otherData)
	{
		// $idcolumn = $this->get_key_column_name($tablename);
		if((string)(int)$data != $data)
		{
			// $sql = "update ".$tablename." where ".$rowid."='".$otherData."' set ".$columnname."='.$data";
			$sql = "update ".$tablename." set ".$columnname."='".$data."' where ".$rowid."='".$otherData."'";
			// $sql = "update ".$tablename." set ".$columnname."='".$data."' where ".$rowid."='".$otherData;
		}else{
			$sql = "update ".$tablename." set ".$columnname."='".$data."' where ".$rowid."='".$otherData."'";
			// $sql = "update ".$tablename." where ".$rowid."='".$otherData."' set ".$columnname."='".$data"'";
			// $sql = "update ".$tablename." set ".$columnname."=".$data." where ".$rowid."=".$otherData;
		}
		$this->query($sql);
		return $sql;
	}
	
	function __destruct()
	{
		$this->conn->close();
	}
}

?>