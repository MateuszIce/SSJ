<?php
 
/*Definiowanie zmiennych z danymi niezbędnymi do połączenia z bazą danych*/
$serwer = 'localhost';
$uzytkownik = 'root';
$haslo = '';
$nazwa_bazy = 'ssj';
  
/*Połączenie z bazą*/
$db = mysqli_connect($serwer, $uzytkownik, $haslo, $nazwa_bazy);
 
/*Komunikat o błędzie w przypadku problemów z połączeniem*/
if (mysqli_connect_errno()) 
{
    echo 'Błąd';
    exit;   
}
else {
}
 
?>


<!DOCTYPE html>

<html>
<head>
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
</head>

<body>
    <!--
    
            $( "tr" ).has( "td" ).css( "background-color", "red" );
        
        $('tr input').focus(function () {
    var $tr = $(this).closest('tr'); //get tr
    $tr.css('bgcolor', 'red'); //change background color 
    $tr.siblings().css('bgcolor', 'blue'); //set sibling tr's background color to be old color
}).blur(function () {
    var $tr = $(this).closest('tr');//get tr
    $tr.css('bgcolor', 'blue');//set tr's background color to be old color
});
    
-->
<!--<script>
function pobierz(plik){
    $.get( plik, { login: $('#login').val() } )
  .done(function( data ) {
    $('div#body div.tresc').html(data);
  });
}

</script>
    -->
    
    <!--
<script>
$('input[type=button].menu').click(
    function(){
        pobierz($(this).attr('sciezka'));
    }
);
</script>
--> 
    
    <script>
    
function sprawdzanie(){
            
                $.post( "check.php", {login: $('#login').val()}, function( data ) 
                    {
                    $('#info').html(data);
                    }
            );
        }
        
        
    </script>
    

    
   <input type="text" name="login" id="login">
    <input type="submit" onclick="sprawdzanie()">
    <div id="info"></div>

</body>

</html>