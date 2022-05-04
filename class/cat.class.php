<?php

	class CatDish
	{
		private $dbh;
		
		function __construct($dbh)
		{
			$this->dbh = $dbh;
		}
		
		public function getCatts()
		{
			$sql = 'SELECT * FROM catDish';
			
			return $this->dbh->sqlQuery($sql);
		}
	}

?>