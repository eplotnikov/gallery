<?php
/**
* ------- Class For Work With DataBases -------
* can use try catch
*/
class DbAdapter
{
    protected $_link;

    //basic data types (not yet used)
    const TYPE_INT = "int";				//integer
    const TYPE_VARCHAR = "varchar";		//varchar
    const TYPE_DATE = "date";			//date and time
    const TYPE_TEXT = "text";			//text

    private static $instance;

    private function __construct() {}
    private function __clone() {}
    private function __wakeup() {}

    /**
     * @return DbAdapter
     */
    public static function getInstance() 
    {
        if (empty(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }
	
    //-----------CONNECTION METHODS-----------
    /**
     * method connection for DataBase
     * $host - host
     * $user - user name for db
     * $password - password for db
     * $db - database name
     */
    public function connectionDB($host, $user, $password, $db) 
    {
        if (!empty($host) && !empty($user) && !empty($password) && !empty($db)) {
            $link = mysqli_connect($host, $user, $password, $db);
            if (!$link) {
                throw new Exception("Unable to connect to database. Error code: %s\n", mysqli_connect_error());
                $this -> _link = $link;
                return false;
            }
            return $this -> _link = $link;
        } else {
            throw new Exception("One Of The Values (host, user, password, db) Is Empty!");
        }
    }
	
    /**
     * method to close connection with DataBase
     */
    public function closeConnection()
    {
        if (isset($this -> _link)) {
            mysqli_close($this -> _link);
        } else {
            throw new Exception("Not Open Connection!");
        }
    }

    //-----------SETS METHODS-----------
    /**
     * method sets general table name
     * $table_name - table name, str
     */
    public function setTable($table_name)
    {
        if (!empty($table_name) || isset($table_name)) {
            $this -> table_name = $table_name;
        } else {
            throw new Exception("table_name is empty!");
        }
    }
	
    /**
     * method sets general field or fields names
     * $field_name - field or fields names, str, separator - ,
     */
    public function setField($field_name)
    {
        if (!empty($field_name) || isset($field_name)) {
            $this -> field_name = $field_name;
        } else {
            throw new Exception("field_name is empty!");
        }
    }
	
    /**
     * method sets general value or values
     * $values - value or values, separator - ,
     */
    public function setValue($value)
    {
        if (!empty($value) || isset($value)) {
            $this -> value = $value;
        } else {
            throw new Exception("value is empty!");
        }
    }
	
    /**
     * method sets index field for search by index field (by condition WHERE)
     * $index_field_name - index field name, str
     */
    public function setIndexField($index_field_name)
    {
        if (!empty($index_field_name) || isset($index_field_name)) {
            $this -> index_field_name = $index_field_name;
        } else {
            throw new Exception("index_field_name is empty!");
        }
    }
	
    /**
     * method sets index value for search by index value (by condition WHERE)
     * $index_value - index value
     */
    public function setIndexValue($index_value)
    {
        if (!empty($index_value) || isset($index_value)) {
            $this -> index_value = $index_value;
        } else {
            throw new Exception("index_value is empty!");
        }
    }
	
    /**
     * method sets str for request CREATE TABLE
     * $strCreateTable - str, viuvs (FirstName varchar(15), LastName varchar(15), Age int AUTO_INCREMENT, PRIMARY KEY (Age) )
     */
    public function setStrForCreateTable($strCreateTable)
    {
        if (!empty($strCreateTable) || isset($strCreateTable)) {
            $this -> strCreateTable = $strCreateTable;
        } else {
            throw new Exception("strCreateTable is empty!");
        }
    }
	
	
	//-----------WORKS METHODS-----------
	/**
     * method for create table
     */
    public function createTable()
    {
        $query  = "CREATE TABLE ".$this -> table_name."
                    (".$this -> strCreateTable.")";
        if (mysqli_multi_query($this -> _link, $query)) {
		   do {
			   if ($result = mysqli_store_result($this -> _link)) {
				   mysqli_free_result($result);
			   }
		   } while (mysqli_next_result($this -> _link));
		}
    }
	
	/**
     * method add record in table
     */
    public function addRecord()
	{
        $result = "";
        if ($result == mysqli_query($this -> _link, "insert into ".$this -> table_name." (".$this -> field_name.") values('".$this -> value."')")) {
            mysqli_free_result($result);
        } else {
            //throw new Exception("cant record value(s)!");
        }
    }

    /**
     * method add records in table
     */
    public function addRecords($fields, $values)
    {
        $result = "";
        if ($result == mysqli_query($this -> _link, "insert into ".$this -> table_name." (".$fields.") values(".$values.")")) {
            mysqli_free_result($result);
        } else {
            //throw new Exception("cant record value(s)!");
        }
    }

	/**
     * method for select 1 value
     */
    public function selectValue()
    {
        $query = "SELECT ".$this -> field_name." FROM ".$this -> table_name." WHERE ".$this -> index_field_name."=".$this -> index_value."" or die("Error in the consult.." . mysqli_error($this->_link));
        $result = $this -> _link -> query($query);
        $res = "";
        while ($row = mysqli_fetch_array($result)) {
            $res = $row[$this -> field_name];
        }
        return $res;
    }

    public function selectValueAu()
    {
        mysql_connect("localhost", "gallery", "gallery") or die (mysql_error ());
        mysql_select_db("gallery") or die(mysql_error());
        $query = "SELECT ".$this -> field_name." FROM ".$this -> table_name." WHERE ".$this -> index_field_name."=".$this -> index_value."" or die("Error in the consult.." . mysqli_error($this->_link));
        $result = $this -> _link -> query($query);
        $res = "";
        while ($row = mysqli_fetch_array($result)) {
            $res = $row[$this -> field_name];
        }
        return $res;
    }

	/**
     * method for select all values
	 * returns an array of values
     */
    public function selectValues()
	{
        $query = "SELECT ".$this -> field_name." FROM ".$this -> table_name." " or die("Error in the consult.." . mysqli_error($this -> _link));
        $result = $this -> _link -> query($query);
        while ($row = mysqli_fetch_array($result)) {
            //echo $row[$this -> field_name];
			$arr[] = $row[$this -> field_name];
        }
		//echo "test";
		return $arr;
    }
	
	/**
     * method for select all values in row
	 * returns an array of values
     */
    public function selectValuesInRow($field_names)
	{
        $query = "SELECT ".$field_names." FROM ".$this -> table_name." " or die("Error in the consult.." . mysqli_error($this -> _link));
        $result = $this -> _link -> query($query);
        while ($row = mysqli_fetch_array($result)) {
            //echo $row[$this -> field_name];
			$arr[] = $row[$this -> field_names];
        }
		return $arr;
    }
	
	/**
     * method update table
     */
	public function updateInfo()
	{
		//$this -> _link -> query("update ".$this -> table_name." set ".$this -> field_name." = '".$this -> value."' where ".$this -> index_field_name." = '".$this -> index_value."'");
		mysql_connect("localhost", "gallery", "gallery") or die (mysql_error ());
        mysql_select_db("gallery") or die(mysql_error());
		$query = "UPDATE ".$this -> table_name." SET ".$this -> field_name." = '".$this -> value."' WHERE ".$this -> index_field_name."='".$this -> index_value."'";
		//$query = "UPDATE users SET role = 'test' WHERE id='plov'";
		mysql_query($query) or die(mysql_error());
	}
	
	public function updateInfoSpec($newGalleryComment)
	{
		mysql_connect("localhost", "gallery", "gallery") or die (mysql_error ());
        mysql_select_db("gallery") or die(mysql_error());
		$query = "UPDATE ".$this -> table_name." SET ".$this -> field_name." = '".$this -> value."', comment = '".$newGalleryComment."' WHERE ".$this -> index_field_name."='".$this -> index_value."'";
		mysql_query($query) or die(mysql_error());
	}
	
	
	/**
     * method to delete a row in tables in the database for the value
     */
	public function deleteField($t, $f, $n)
	{
        mysql_connect("localhost", "gallery", "gallery") or die (mysql_error ());
        mysql_select_db("gallery") or die(mysql_error());
        $sql ="DELETE FROM ".$t." WHERE ".$f."='".$n."'";
        mysql_query($sql) or die(mysql_error());
	}
	
	/**
     * method specifically to display the menu on this page
     */
	public function show_menu_categorys()
	{
		$query = "SELECT ".$this -> field_name." FROM ".$this -> table_name." " or die("Error in the consult.." . mysqli_error($this -> _link));
        $result = $this -> _link -> query($query);
        while ($row = mysqli_fetch_array($result)) {
			echo "<li><a class='bottom' href='#'>".$row[$this -> field_name]."</a></li>";
        }
	}
	
	/**
     * method for select 2 values in table
	 * returns an array of values
     */
	public function selectTwoValues($val1, $val2)
	{
		$query = "SELECT * FROM ".$this -> table_name." " or die("Error in the consult.." . mysqli_error($this -> _link));
        $result = $this -> _link -> query($query);
        while ($row = mysqli_fetch_array($result)) {
			$arr = array ($val1 => $row[$val1], $val2 => $row[$val2]);
			$array[] = $arr;
        }
		return $array;
	}
	
	/**
     * method for select 2 values in table
	 * returns an array of  key(value1) => values(value2)
     */
	public function selectTwoValuesSpecial($val1, $val2)
	{
		$query = "SELECT * FROM ".$this -> table_name." " or die("Error in the consult.." . mysqli_error($this -> _link));
        $result = $this -> _link -> query($query);
        while ($row = mysqli_fetch_array($result)) {
            //echo $row[$this -> field_name];
			$arr[] = array ($row[$val1] => $row[$val2]);
        }
		return $arr;
	}
	
	/**
     * method for select 3 values in table
	 * returns an array of values
     */
	public function selectThreeValues($val1, $val2, $val3)
	{
		$query = "SELECT * FROM ".$this -> table_name." " or die("Error in the consult.." . mysqli_error($this -> _link));
        $result = $this -> _link -> query($query);
        while ($row = mysqli_fetch_array($result)) {
			$arr = array ($val1 => $row[$val1], $val2 => $row[$val2], $val3 => $row[$val3]);
			$array[] = $arr;
        }
		return $array;
	}
	
	/**
     * method for select 4 values in table
	 * returns an array of values
     */
	public function selectFourValues($val1, $val2, $val3, $val4)
	{
		$query = "SELECT * FROM ".$this -> table_name." " or die("Error in the consult.." . mysqli_error($this -> _link));
        $result = $this -> _link -> query($query);
        while ($row = mysqli_fetch_array($result)) {
			$arr = array ($val1 => $row[$val1], $val2 => $row[$val2], $val3 => $row[$val3], $val4 => $row[$val4]);
			$array[] = $arr;
        }
		return $array;
	}

    /**
     * method for select 5 values in table
     * returns an array of values
     */
    public function selectFiveValues($val1, $val2, $val3, $val4, $val5)
    {
        $query = "SELECT * FROM ".$this -> table_name." " or die("Error in the consult.." . mysqli_error($this -> _link));
        $result = $this -> _link -> query($query);
        while ($row = mysqli_fetch_array($result)) {
            $arr = array ($val1 => $row[$val1], $val2 => $row[$val2], $val3 => $row[$val3], $val4 => $row[$val4], $val5 => $row[$val5]);
            $array[] = $arr;
        }
        return $array;
    }
	
	/**
     * method for select 6 values in table
     * returns an array of values
     */
    public function selectSixValues($val, $val1, $val2, $val3, $val4, $val5, $val6)
    {
		//mysql_connect("localhost", "gallery", "gallery") or die (mysql_error ());
        //mysql_select_db("gallery") or die(mysql_error());
        $query = "SELECT * FROM ".$this -> table_name." WHERE login='".$val."'" or die("Error in the consult.." . mysqli_error($this -> _link));
        $result = $this -> _link -> query($query);
        while ($row = mysqli_fetch_array($result)) {
            $arr = array ($val1 => $row[$val1], $val2 => $row[$val2], $val3 => $row[$val3], $val4 => $row[$val4], $val5 => $row[$val5], $val6 => $row[$val6]);
            $array[] = $arr;
        }
        return $array;
    }
	
	/**
     * method specifically to display the menu on this page for footer
     */
	public function show_menu_categorys_footer()
	{
		$query = "SELECT ".$this -> field_name." FROM ".$this -> table_name." " or die("Error in the consult.." . mysqli_error($this -> _link));
        $result = $this -> _link -> query($query);
        while ($row = mysqli_fetch_array($result)) {
			echo "<li><a class='footerbottom' href='#'>".$row[$this -> field_name]."</a></li>";
        }
	}
	
}
