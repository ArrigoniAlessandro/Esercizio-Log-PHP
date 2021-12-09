
        
<htlm>
        <body>
    
            <form method = "POST">        
                <fieldset>
                    <legend>
                        Inserisci i dati all'interno del DataBase [SCUOLA]:
                    </legend>
                    <p>Codice: <input type="text" name="codice"></p>
                    <p>Nome: <input type="text" name="nome"></p>
                    <p>Indirizzo: <input type="text" name="indirizzo"></p>
                    <p>Telefono: <input type="text" name="telefono"></p>
                    <input type="submit" value="Invio dati">
                </fieldset>
            </form>
        </body>
    
</htlm>
    
    <?php
    
        include "FunConnettiDB.php";
        
        include "configura.php";
    
        if(!empty($_POST)){
    
            $codice = $_POST['codice'];
            $nome = $_POST['nome'];
            $indirizzo = $_POST['indirizzo'];
            $telefono = $_POST['telefono'];
    
            $conn = connessioneDB($hostname, $user, $pw, $db);
    
            if ($conn -> connect_error) { 
                
                die('CONNESSIONE FALLITA: '  . $conn->connect_error); 
    
            }else{ 
    
                $sql = "INSERT INTO scuola (codice, nome, indirizzo, telefono)
                VALUES ('$codice', '$nome', '$indirizzo', '$telefono')";
                
                if ($conn -> query($sql) === TRUE) {
    
                    echo "OPERAZIONE ESEGUITA CON SUCCESSO!";
    
                    $file = fopen("log.txt", "a");
    
                    $testo ='OK';
    
                    fwrite($file, $testo);
                    fclose($file);
    
                } else {
    
                  echo " è stato riscontrato un ERRORE!: " . $sql . "<br>" . $conn->error;
    
                    $file = fopen("log.txt", "a");
    
                    $testo = $sql . "<br>" . $conn->error;
    
                    fwrite($file, $testo);
                    fclose($file);
                }
                
                $conn -> close();
    
            }
        }
    
    ?>









