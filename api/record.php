<?php 

error_reporting(E_ALL);
ini_set("display_errors", 1);

require('./env.php');
require('./db.php');
require('./db-operator.php');


if(!empty($_POST)){

    $db = new db(getCredentials());
    $pdo = $db->connectTodb();

    $dbOp = new dbOperation($pdo);

    $res = $dbOp->saveResponse(array(
        'url'        =>  $_POST['url'],
        'categorie'  =>  $_POST['cat'],
        'feedback'   =>  $_POST['how'],
        'firstname'  =>  $_POST['firstname'],
        'lastname'   =>  $_POST['lastname']
    ));


    if($res)  echo json_encode(array('code'=> 200, 'message' => 'success'));

    if(!$res) echo json_encode(array('code'=> 500, 'message' => 'error'));


}else{

    echo json_encode(array(
        'code'=> 500, 
        'message' => 'error No POST datas received'
        ));

}






