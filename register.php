<?php

    session_start();

    if(isset($_POST['email']))
    {
        //udana walidacja
        $wszystko_OK=true;
        
        $imie = $_POST['imie'];
        $nazwisko = $_POST['nazwisko'];
        $login = $_POST['login'];
        $email = $_POST['email'];
        
        //sprawdzanie imienia
        if((strlen($imie)<3)||(strlen($imie)>20))
        {
            $wszystko_OK=false;
            $_SESSION['e_imie']="Imię musi posiadać od 3 do 20 znaków!";
        }
        
        if(ctype_alnum($imie)==false)
        {
            $wszystko_OK=false;
            $_SESSION['e_imie']="Imię nie może zawierać znaków specjalnych!";
        }
        
        if((strlen($nazwisko)<3)||(strlen($nazwisko)>20))
        {
            $wszystko_OK=false;
            $_SESSION['e_nazwisko']="Nazwisko musi posiadać od 3 do 20 znaków!";
        }
        //sprawdzanie nazwiska
        if(ctype_alnum($nazwisko)==false)
        {
            $wszystko_OK=false;
            $_SESSION['e_nazwisko']="Nazwisko nie może zawierać znaków specjalnych!";
        }
        
        if((strlen($login)<3)||(strlen($login)>20))
        {
            $wszystko_OK=false;
            $_SESSION['e_login']="Login musi posiadać od 3 do 20 znaków!";
        }
        //sprawdzanie loginu
        if(ctype_alnum($login)==false)
        {
            $wszystko_OK=false;
            $_SESSION['e_login']="Login nie może zawierać znaków specjalnych!";
        }
        
        
        
        //sprawdzanie emaila  
        
        $emailB = filter_var($email,FILTER_SANITIZE_EMAIL);
        
        if((filter_var($emailB,FILTER_VALIDATE_EMAIL)==false)||($emailB!=$email))
        {
            $wszystko_OK=false;
            $_SESSION['e_email']="Podaj poprawny adres e-mail!";
        }
        
        //sprawdzenie hasel
        $password = $_POST['password'];
        $repassword = $_POST['repassword'];
        
        if((strlen($password)<8)||(strlen($password)>20))
        {
            $wszystko_OK=false;
            $_SESSION['e_password']="Hasło musi posiadać od 8 do 20 znaków!";
        }
        
        if($password!=$repassword)
        {
            $wszystko_OK=false;
            $_SESSION['e_repassword']="Podane hasła muszą być identyczne!";
        }
        
        //checkbox
        
        if(!isset($_POST['regulamin']))
        {
            $wszystko_OK=false;
            $_SESSION['e_regulamin']="Musisz zaakceptowac regulamin!";
        }
        
        //zapamietanie wprowazdonych danych
        $_SESSION['fr_imie'] = $imie;
        $_SESSION['fr_nazwisko'] = $nazwisko;
        $_SESSION['fr_login'] = $login;
        $_SESSION['fr_email'] = $email;
        if(isset($_POST['regulamin']))
            $_SESSION['fr_regulamin']=true;
        
        require_once "connect.php";
        mysqli_report(MYSQLI_REPORT_STRICT);
        try
        {
            $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
            
        if($polaczenie->connect_errno!=0)
            {
                throw new Exception(mysqli_connect_errno());         
            }
            
        
        else
        {
            //czy email zajety
            
            $rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE email='$email'");
            
            
            if(!$rezultat) throw new Exception($polaczenie->error);
            
            $ile_takich_maili = $rezultat->num_rows;
            if($ile_takich_maili>0)
            {
                $wszystko_OK=false;
                $_SESSION['e_email']="Taki email juz istnieje w bazie!";
            }
            
            //czy login zajety?
        
            $rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE user='$login'");
            
            
            if(!$rezultat) throw new Exception($polaczenie->error);
            
            $ile_takich_userow = $rezultat->num_rows;
            if($ile_takich_userow>0)
            {
                $wszystko_OK=false;
                $_SESSION['e_login']="Podany login jest zajęty!";
            }
            
            
            //wszystko ok udana walidacja
            if($wszystko_OK==true)
            {   
                //hashowanie hasla
                if(isset($_POST['password']))
                        {
                        $hasloo = $_POST['password'];
                        $szyfr = md5($hasloo);
                        }
                
                if($polaczenie->query("INSERT INTO uzytkownicy VALUES(NULL, '$login','$szyfr','$email','$imie','$nazwisko','user')"))
                {
                    $_SESSION['udanarejestracja']=true;
                    header('Location: welcome.php');
                }
                else
                {
                    throw new Exception($polaczenie->error);
                }
            }
        
            
            
            $polaczenie->close();
        }
            
        }
        catch(Exception $e)
        {
            echo'<span style="color:red;">Błąd serwera!</span>';
           // echo '<br/>Info o błędzie:'.$e;
        }
        
    }

?>


<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>SuperSaiyan</title>
    <meta name="author" content="Mateusz Ciałowicz"/>
	<meta name="description" content="Trening, dieta, odżywki" />
	<meta name="keywords" content="trener, trening, dieta, personalny" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="Shortcut icon" href="img/top_icon.ico" />
	<link rel="stylesheet" href="style/style.css" type="text/css" />
	<link rel="stylesheet" href="style/style_log.css" type="text/css" />
	<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script>
            
        function sprawdzanie(){
            
                $.post( "check.php", {login: $('#login').val()}, function( data ) 
                    {
                    $('#login').html(data);           
                    } 
                      );
        }
            function sprawdzanie2(){
            
                $.post( "check.php", {email: $('#email').val()}, function( data ) 
                    {
                    $('#email').html(data);           
                    } );
                
        }
         
        
        </script>
    
	<style>
        #info {
            margin: 0;
            padding: 0;
            color: red;
        }
        
    .error
        {
            color: red;
            margin-top: 10px;
        }        
    </style>
</head>

<body>
<div id="container">


	<div id="logbox"> 
	
	<div id="top_bar">
    
    <?php 
        $name = basename(__FILE__);
        include 'navbar.php';
    ?>
    </div>
    
		<form method="post">
		
            <input type="text" placeholder="imie" value="<?php
            
              if(isset($_SESSION['fr_imie']))
              {
                  echo $_SESSION['fr_imie'];
                  unset($_SESSION['fr_imie']);
              }
                                                         
            ?>" name="imie">
            <?php
                if(isset($_SESSION['e_imie']))
                {
                    echo '<div class="error">'.$_SESSION['e_imie'].'</div>';
                    unset($_SESSION['e_imie']);
                }
            ?>
			
			
			
			<input type="text" placeholder="nazwisko" value="<?php
            
              if(isset($_SESSION['fr_nazwisko']))
              {
                  echo $_SESSION['fr_nazwisko'];
                  unset($_SESSION['fr_nazwisko']);
              }
                                                         
            ?>" name="nazwisko">
			<?php
                if(isset($_SESSION['e_nazwisko']))
                {
                    echo '<div class="error">'.$_SESSION['e_nazwisko'].'</div>';
                    unset($_SESSION['e_nazwisko']);
                }
            ?>
			
			<input type="email" placeholder="email" value="<?php
            
              if(isset($_SESSION['fr_email']))
              {
                  echo $_SESSION['fr_email'];
                  unset($_SESSION['fr_email']);
              }
                                                         
            ?>" onBlur="sprawdzanie2()" id="email" name="email">
			
			<?php
                if(isset($_SESSION['e_email']))
                {
                    echo '<div class="error">'.$_SESSION['e_email'].'</div>';
                    unset($_SESSION['e_email']);
                }
            ?>

			<input type="text" placeholder="login" value="<?php
            
              if(isset($_SESSION['fr_login']))
              {
                  echo $_SESSION['fr_login'];
                  unset($_SESSION['fr_login']);
              }              

                                                         
            ?>"  onBlur="sprawdzanie()" id="login" name="login">
            
            
            
			
			<?php
                if(isset($_SESSION['e_login']))
                {
                    echo '<div class="error">'.$_SESSION['e_login'].'</div>';
                    unset($_SESSION['e_login']);
                }
            ?>
			
			<input type="password" placeholder="hasło" name="password">
			
			<?php
                if(isset($_SESSION['e_password']))
                {
                    echo '<div class="error">'.$_SESSION['e_password'].'</div>';
                    unset($_SESSION['e_password']);
                }
            ?>
			
			<input type="password" placeholder="powtórz hasło" name="repassword">
			<?php
                if(isset($_SESSION['e_repassword']))
                {
                    echo '<div class="error">'.$_SESSION['e_repassword'].'</div>';
                    unset($_SESSION['e_repassword']);
                }
            ?>
			<br><br>
		
			<label>
			<input type="checkbox" name="regulamin" <?php 
                   if(isset($_SESSION['fr_regulamin']))
                   {
                       echo "checked";
                        unset($_SESSION['fr_regulamin']);
                   }
                   
                   ?>/> <a1>Akceptuję regulamin</a1>			
            </label>
               <?php
                if(isset($_SESSION['e_regulamin']))
                {
                    echo '<div class="error">'.$_SESSION['e_regulamin'].'</div>';
                    unset($_SESSION['e_regulamin']);
                }
            ?>
               
               <br><br>
                
           

			<input type="submit" value="Zarejestruj się" name="register">
			
		</form>
        
        
        
	</div>
	<br/><br/><br/>
	</div>
    
	    <?php 
        $name = basename(__FILE__);
        include 'footer.php';
    ?> 


</body>
</html>