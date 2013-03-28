<?php
class db{
	private $link;	
	
	function db(){
		$this->link=null;
	}
	
	function create_connection( ){
		$this->link = mysqli_connect(VUL_HOST, VUL_USERNAME, VUL_PASSWORD, VUL_NAME);
		$this->link->set_charset("utf8");
		return $this->checkDBConnection();
	}
	
	function checkDBConnection(){
		return ( ($this->link!=NULL && is_a($this->link,'mysqli'))?true:false );
	}
	
	function query_db( $query ){
		return mysqli_query( $this->link, $query );
	}
	
	function sanitize( $aux ){
		return mysqli_real_escape_string( $this->link, $aux );
	}
	
	function cierra_db(){
		return mysqli_close($this->link);
	}
	
	function __destruct() {
		if( $this->link!=null && is_a($this->link,'mysqli') )
			$this->cierra_db();
	}
}
?>
