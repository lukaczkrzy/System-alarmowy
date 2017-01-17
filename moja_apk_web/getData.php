<?php 

if($_SERVER['REQUEST_METHOD']=='GET'){
		
    $id  = $_GET['id'];
    $opt  = $_GET['opt'];
		
    require_once('log_db.php');
    
 //   $con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');
    $con = new mysqli($host_db, $login_db, $haslo_db, "zmienne");
    
    if ($opt == 1){	
        $sql = "SELECT * FROM uzbroj_get WHERE id='".$id."'";        
    }elseif ($opt == 2){
        $sql = "SELECT * FROM rozbroj_get WHERE id='".$id."'";
    }elseif ($opt == 3){
        $sql = "SELECT * FROM wlacz_get WHERE id='".$id."'";
    }elseif ($opt == 4){
        $sql = "SELECT * FROM wylacz_get WHERE id='".$id."'";
    }elseif ($opt == 5){
        $sql = "SELECT * FROM zmien_get WHERE id='".$id."'";
    }
		
    $r = mysqli_query($con,$sql);
    $res = mysqli_fetch_array($r);	
    $result = array();
		
    array_push($result,array(
        "name"=>$res['name']
    ));
		
    echo json_encode(array("result"=>$result));
        
    if ($opt == 1){
        $sql2 = $con->query("DELETE FROM uzbroj_get WHERE id='".$id."'");
    }elseif ($opt == 2){
        $sql2 = $con->query("DELETE FROM rozbroj_get WHERE id='".$id."'");
    }elseif ($opt == 3){
        $sql2 = $con->query("DELETE FROM wlacz_get WHERE id='".$id."'");
    }elseif ($opt == 4){
        $sql2 = $con->query("DELETE FROM wylacz_get WHERE id='".$id."'");
    }elseif ($opt == 5){
        $sql2 = $con->query("DELETE FROM zmien_get WHERE id='".$id."'");
    }
    
    $con -> commit();
    mysqli_close($con);
        
    //INSERT INTO colleges VALUES (1, "Kowlaski", "Polska", "CosTam")
    //INSERT INTO rozbroj_get VALUES (1, "Kowlaski")
    //INSERT INTO uzbroj_get VALUES (1, "Nowak")
    //INSERT INTO wlacz_get VALUES (1, "Majewski")
    //INSERT INTO wylacz_get VALUES (1, "Sikorski")
    //INSERT INTO zmien_get VALUES (1, "Sienkiewicz")
}
