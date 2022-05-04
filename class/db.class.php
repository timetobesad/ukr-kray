<?php

	class DB
    {
        private $login;
        private $pass;
        private $host;
        private $name;
		
		private $dbh;
		
		public $isConnected = false;

        function __construct($connectData)
        {
            $this->login = $connectData['login'];
            $this->pass = $connectData['pass'];
            $this->host = $connectData['host'];
            $this->name = $connectData['name'];
        }
		
		public function connect()
		{
			try
			{
				$this->dbh = new PDO('mysql:host='.$this->host.';dbname='.$this->name.';charset=utf8;', $this->login, $this->pass);
				$this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				$this->isConnected = true;
			}
			catch(PDOException $ex)
			{
					die($ex->getMessage());
			}
		}
		
		public function queryNoResult($sql)
		{
			
		}
		
		public function sqlQuery($sql)
		{
			$result = $this->dbh->query($sql)->fetchAll();
			
			foreach($result as $row)
			{
				$response[] = $row;
			}
				
			return $response;
		}
    }

?>