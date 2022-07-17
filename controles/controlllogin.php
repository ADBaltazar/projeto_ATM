<?php

  

        session_start();

    require_once "connect.php";
    //$conexao
     
        
            $email_usuario = $_POST['usuario'];
            $senha_usuario = $_POST['senha'];

            echo "\n\nNome Usuario : : ".$senha_usuario;
           $verif_creedencial =mysqli_query($conexao,"SELECT Telefone,Senha,privlegio from contacliente where (Telefone ='$email_usuario' and Senha ='$senha_usuario')");

           $NumeroRetorno = mysqli_num_rows($verif_creedencial); 
            

            if( $NumeroRetorno > 0 && $NumeroRetorno < 2)
            {
                while ($login = mysqli_fetch_assoc($verif_creedencial)) {
                    # code...
                    $privlegio =$login['privlegio'];
                    //echo $privlegio;
                }

                $_SESSION['usuario_validado'] = $email_usuario;
                $_SESSION['senha_validado'] = $senha_usuario; 

                if($privlegio =="ADMIN" || $privlegio =="Admin" || $privlegio =="admin")
                {
                    $_SESSION['modoAdmin'] = $privlegio;
                    header("location:../vews/painelAdmin.php");
                }
                
                
                //header("location:../vews/painel_Cliente.php");
            }
            else{

                unset($email_usuario);unset($senha_usuario);
                $_SESSION['alerta']="Creedencias invalida"; 
                header("location:../index.php");
            }
 


    
?>