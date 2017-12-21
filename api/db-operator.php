<?php 


class dbOperation extends db{

    public  $database;

    public function __construct($connect)
    {
    
        $this->database = $connect;
        
    }


    public function getList()
    {

        $response = $this->database->query("
                    SELECT *
                    FROM `responses`
                    ");
        
        $datas = array();
        
        while ($donnees = $response->fetch())
        {
            $datas[] = $donnees;
        }
        
        return $datas;

        
    }


    public function saveResponse($datas)
    {   


        $sql = 'INSERT INTO responses(url,categorie,feedback,firstname)
                       VALUES(:url,:categorie,:feedback,:firstname)';

        $req = $this->database->prepare($sql);
        
        $res = $req->execute(array(
            'url'        => $datas['url'],
            'categorie'  => $datas['categorie'],
            'feedback'   => $datas['feedback'],
            'firstname'  => $datas['firstname'],
            //'lastname'   => $datas['lastname']
            //'date' =>  date("Y-m-d G:i:s")
            ));
        
        return $res;
    
    }


}