 
<?php

    
    session_start();

    if(!isset($_POST['login']) || (!isset($_POST['haslo'])))
    {
        header('Location: login.php');
        exit();
    }
  
    require_once "connect.php";
        
    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
    
    if($polaczenie->connect_errno!=0)
    {
      echo "Connection Error: ".$polaczenie->connect_errno;
    }
    else
    {
        
    $login = $_POST['login'];
    $haslode = $_POST['haslo'];
    $haslo = md5($haslode);
    
    //zabezpieczenie przed sql injection
    $login = htmlentities($login, ENT_QUOTES, "UTF-8");
    $haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");
    
    
    if($rezultat =@$polaczenie->query(sprintf("SELECT * FROM uzytkownicy WHERE user='%s' AND pass='%s'", mysqli_real_escape_string($polaczenie,$login), mysqli_real_escape_string($polaczenie,$haslo))))
    {
        $ilu_userow = $rezultat->num_rows;
        if($ilu_userow > 0)
        {
            
            
        $REMOTE_ADDR = mysqli_real_escape_string($polaczenie, $_SERVER['REMOTE_ADDR']);
        $HTTP_USER_AGENT = mysqli_real_escape_string($polaczenie, $_SERVER['HTTP_USER_AGENT']);
            
         $id=md5(rand(-10000,10000)) . md5(microtime());
            
             $wiersz = $rezultat->fetch_assoc();
            
            mysqli_query($polaczenie, "delete from sesja where id_user = '$wiersz[id]';");
            
            echo "insert into sesja (id_user, id, ip, web) values ('$wiersz[id]','$id','$REMOTE_ADDR','$HTTP_USER_AGENT')     ";
            
            $result = mysqli_query($polaczenie, "insert into sesja (id_user, id, ip, web) values ('$wiersz[id]','$id','$REMOTE_ADDR','$HTTP_USER_AGENT');");
            
            
            if ( false===$result ) 
            {
                printf("error with inserting: %s\n", mysqli_error($polaczenie));
                $logged = false;
            }
            else
            {
                setcookie("id", $id);
                header('Location: myaccount.php');
                $logged = true;    
                $rezultat->free_result();
           
           
            
            }
  
        }
        else
        {
            $_SESSION['blad'] = '<center><span style="color:red"><b>Nieprawidlowy login lub hasło!</b></span></center>';
            header('Location: login.php');
        }
    }
        
    $polaczenie->close();        
    }
      
 ?>
 