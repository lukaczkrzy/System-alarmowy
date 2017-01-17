<?php 

    $haslo   = urldecode($_POST['name']);
    $opt = urldecode($_POST['opt']);
        
    require_once "log_db.php";
    mysqli_report(MYSQLI_REPORT_STRICT);
        
    $polaczenie = new mysqli($host_db, $login_db, $haslo_db, "zmienne");

    if ($opt == 1){	
        $polaczenie->query("INSERT INTO uzbroj_send VALUES (1, '$haslo')");        
    }elseif ($opt == 2){
        $polaczenie->query("INSERT INTO rozbroj_send VALUES (1, '$haslo')");
    }elseif ($opt == 3){
        $polaczenie->query("INSERT INTO wlacz_send VALUES (1, '$haslo')");
    }elseif ($opt == 4){
        $polaczenie->query("INSERT INTO wylacz_send VALUES (1, '$haslo')");
    }elseif ($opt == 5){
        $polaczenie->query("INSERT INTO zmien_send VALUES (1, '$haslo')");
    }
      
    $redalert = $polaczenie->query("SELECT name FROM uzbroj_send WHERE id=1");
    $r = mysqli_fetch_assoc($redalert);
    $kod = $r['name'];
    echo "Kod wpisany przez użytkownika: ".$kod;

    $polaczenie->close();

