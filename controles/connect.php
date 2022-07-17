<?php

  
        $host="localhost";
        $user="root";
        $pass="";
        $banco_dado="atmobile"; 
        
       
        
        $conexao = mysqli_connect($host,$user,$pass,$banco_dado);
        
        if ($conexao) {
            
            // code...
            //echo "\n\n Estamos conectados!\n\n";
        } 
        else
        {
            // code...
            //echo "\n\n Falha de conexao !";
        } 
    


?>