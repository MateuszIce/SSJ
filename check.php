
<?php

    $ok = "<style> input[name=login] { box-shadow: 0px 0px 10px 2px rgba(143,136,143,1); border: 2px solid #ff0000; background-color: #ff6d6d; color: #fcfcfc;}</style>";
    $nieok = "<style> input[name=login] {box-shadow: 0px 0px 10px 2px rgba(143,136,143,1); border: 2px solid #00ff0a; background-color: #b0f7aa; color: #030303; } </style>";



    $polaczenie = new mysqli('localhost', 'root', '', 'SSJ');

    if(isset($_POST['login']))
        {
        $rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE user='{$_POST['login']}'");
        $ile_takich_userow = $rezultat->num_rows;
            if($ile_takich_userow>0)
            {
               echo $ok;
            }
            else
            {
                echo $nieok;
            }
        }

   

    
?>
