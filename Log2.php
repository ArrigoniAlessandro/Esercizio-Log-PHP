<htlm>
    <body>

        <form method = "POST">        
            <fieldset>
                <legend>
                    Connessione DataBase:
                </legend>
                <p>HOSTNAME (cognome.nome.tave.osdb.it): <input type="text" name="hostname"></p>
                <p>USER (utente database): <input type="text" name="user"></p>
                <p>PW (password utente database): <input type="password" name="pw"></p>
                <p>DB NAME (nome del database): <input type="text" name="db"></p>
                <input type="submit" value="Fatto">
            </fieldset>
        </form>

</htlm>

<?php

    include "FunConnettiDB.php";

    if(!empty($_POST)){

        $hostname = $_POST['hostname'];
        $user = $_POST['user'];
        $pw = $_POST['pw'];
        $db = $_POST['db'];

        $conn = connessioneDB($hostname, $user, $pw, $db);

        if ($conn -> connect_error) { 
            die('CONNESSIONE FALLITA: '  . $conn->connect_error); 

        }else{ 

            echo 'CONNESSIONE RIUSCITA!';

            $conn -> close();
            
            $file = fopen("conf.php", "w");

            $testo ='<?php 
                $hostname = "'.$hostname.'";
                $user = "'.$user.'";
                $pw = "'.$pw.'";
                $db = "'.$db.'";     
            ?>';

            fwrite($file, $testo);
            fclose($file);

            header("Location: http://arrigoni.alessandro.tave.osdb.it//log.php");

        }
    }
 
?>