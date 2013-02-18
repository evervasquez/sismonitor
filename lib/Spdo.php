<?php
class Spdo extends PDO {
    private static $instance = null;
    protected  $host = HOST;
    protected $port = PORT;
    protected $dbname=DBNAME;
    protected $user=USER;
    protected $password=PASSWORD;
    protected $driver=DRIVER;

	public function __construct()
	{
		$dns=$this->driver.':dbname='.$this->dbname.';host='. $this->host.'';
           	parent::__construct($dns,$this->user,$this->password);
	}

	public static function singleton()
	{
            if( self::$instance == null )
                {
                    self::$instance = new self();
                }
             return self::$instance;
            	
	}

}
?>