<?php 

class db{


    private $database;

    private $host;
    private $dbName;
    private $dbPassword;
    private $dbLogin;
    

    /**
     * Construct
     * 
     * @param [array] $credentials
     */
    public function __construct($credentials)
    {
        

        $this->host = $credentials['host'];
        $this->dbName = $credentials['dbName'];
        $this->dbPassword = $credentials['dbPassword'];
        $this->dbLogin = $credentials['dbLogin'];


        $this->database = $this->connectTodb();
        

    }

       

    /**
     * Undocumented function
     * 
     * @return void
     */
    public function connectTodb()
    {
        try 
        {
            return $bdd = new PDO("mysql:host=$this->host;dbname=$this->dbName",$this->dbLogin,$this->dbPassword);
        }
        catch(Exception $e) 
        {
            die('Erreur :/ ' .$e->getMessage()); //stop l'execution du script
        }

    }




    




}