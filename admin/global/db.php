<?php
/*

	db.php

	Database Class	

*/

 class db {

	var $query;
	var $db;
	
	// Db connection with constructor

	function db() {

		$this->db = mysql_connect("localhost","root","root") or die(mysql_error());
		if (!$this->db) die();
		
		$selectdb = mysql_select_db("finalpro",$this->db);
		if (!$selectdb) die ();
	}

	// number of rows in the record
		function numrows($query) {
		$this->query = $query;
		$result = mysql_query($query);
		return mysql_num_rows($result);
	}

     // Get rows in form of table
	function getRows($query) {
		$this->query = $query;
		$result = mysql_query($query);
		$tables = array();
		while ($row = mysql_fetch_row($result)) {
			$tables[] = $row;
		}
		return $tables;
	}

	//DB error number
	function error() {
		return (mysql_errno($this->db))? true : false;
	}

     // DB error string
	function errorstring() {
		return mysql_error($this->db);
	}

	// recent insert id return
	function insertid() {
		return mysql_insert_id($this->db);
	}

	//Query affected
	function affected() {
		return mysql_affected_rows($this->db);
	}

	// Close database
	function close() {
		mysql_close($this->db);
	}
	
	// select function for record retrial
	function select($query, $maxRows = 0, $pageNum = 0) {
		$this->query = $query;
		$this->queryArray[] = $query;
		## start limit if $maxRows is greater than 0
		if ($maxRows > 0) {
			$startRow = $pageNum;
			$query = sprintf("%s LIMIT %d, %d", $query, $startRow, $maxRows);
			$startRow = $pageNum + $maxRows;
		}	
		$result = mysql_query($query);
		
		if ($this->error()) die (mysql_error());
				
		if (mysql_num_rows($result) >= 1) {
			for ($n=0, $max=mysql_num_rows($result); $n < $max; $n++) {
				$row = mysql_fetch_assoc($result);
				$output[$n] = $row;
			}
			return $output;
		} else {
			return false;
		}
	}

	// Insert record function
		function insert($tablename, $record) {
		if (!is_array($record)) die(mysql_error());
		
		foreach ($record as $field => $value) {
			$fields[] = sprintf("`%s`", $field);
			$values[] = sprintf("%s", $value);
		}
		
		$this->query = sprintf("INSERT INTO %s (%s) VALUES (%s);", $tablename, implode(',', $fields), implode(',', $values));
		
		mysql_query($this->query);
		if ($this->error()) die (mysql_error());
		return ($this->affected() > 0) ? true : false;
	}

	// update record function
		function update($tablename, $record, $where = '') {
		if(!is_array($record)) die (mysql_error());
		foreach ($record as $field => $value) {
			$set[] = sprintf("`%s` = %s", $field, $value);
		}
		if(!empty($where)) {
			if (is_array($where)) {
				foreach ($where as $field => $value) {
					$whereArray[] = sprintf("`%s` = '%s'", $field, $value);
				}
				$where = "WHERE ".implode(' AND ', $whereArray);
			} else {
				$where = "WHERE ".$where;
			}
		}
		$this->query = sprintf("UPDATE %s SET %s %s;", $tablename, implode(',', $set), $where);
		mysql_query($this->query);
		if ($this->error()) die (mysql_error());
		return ($this->affected() > 0) ? true : false;
	}

     //delete function
	function delete($tablename, $where = '', $limit = '') {
		if (!empty($where)) {
			if (is_array($where)) {
				foreach ($where as $field => $value) {
					$whereArray[] = sprintf("`%s` = '%s'", $field, $value);
				}
				$where = " WHERE ".implode(' AND ', $whereArray);
			} else {
				$where = " WHERE ".$where;
			}
		}
		$query = "DELETE from ".$tablename.$where;
		if (!empty($limit)) $query .= " LIMIT " . $limit;
		
		$this->query = $query;
		mysql_query($query);

		return ($this->affected() > 0) ? true : false;
	}

	// Polish the field data
	function Safe($value, $quote = "'") { 
		
		## Stripslashes 
		if (get_magic_quotes_gpc()) {
			$value = stripslashes($value);
		}
		## Strip quotes if already in
		$value = str_replace(array("\'","'"), "&#39;", $value);
		
		## Quote value
		if (function_exists('mysql_real_escape_string')) {
			$value = mysql_real_escape_string($value, $this->db);
		} else {
			$value = mysql_escape_string($value, $this->db);
		}
		$value = $quote . trim($value) . $quote; 
	 
		return $value; 
	}
	
	//pagination Function
    function paginate($numRows, $limit, $start=0,$page_name){

        $back=$start-$limit;
        $next=$start+$limit;

        if($numRows<=0)
        {
           echo "No record in database";
        }

          if($back>=0)
          {
        print "<li><a href='$page_name?start=$back'>Prev</a></li>";
          }
          $j=1;
          for($i=0;$i<$numRows;$i=$i+$limit){
          if($i<>$start){
              print  "<li><a href='$page_name?start=$i'>$j</a></li>&nbsp;&nbsp;";
              }
              else
              {
             print  "<li><span>$j</span></li>&nbsp;&nbsp;";
              }
           $j++;
           }
           if($next<$numRows){
           print "<li><a href='$page_name?start=$next'>Next</a></li>&nbsp;&nbsp;";
           }
        }

     //Site function
     function login($user,$pass){
         if($user=='admin' && $pass=='admin'){
             return true;
         }
         else{
             return false;
         }

     }



 }
 ?>