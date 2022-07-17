<?php

    session_start();

    require_once "connect.php";


    function criarConta($conect_serve)
    {
        $bancoselecionado = $_POST['banco'];
        $nome = $_POST['nome'];
        $sobrenome = $_POST['apelido'];
        $genero = $_POST['sexo'];
        $DataNasc = $_POST['datanasc'];
        $telefone = $_POST['telefone'];
        $palavrapasse = $_POST['senha'];
        $termo = $_POST['termos'];

        echo $bancoselecionado."<br>".$nome."<br>".$sobrenome."<br>".$genero."<br>".$DataNasc."<br>".$telefone."<br>".$palavrapasse."<br>".$termo;

        if(isset($termo))
        {   


            //DIFININDO O NIVEL DE ISOLAMENTO
            $NIVELISOLAMENTO = mysqli_query($conect_serve,"set global transaction isolation level read uncommitted;");
            

            //VERIFICAR O NUMERO DE TELEFONE NO BANCO DE DADO
            
            $boa = mysqli_query($conect_serve,"select *from contaCliente where Telefone='$telefone'");
            if(mysqli_num_rows($boa) > 0)
            {
                echo "Numero duplicado"; 
                $_SESSION['alerta'] = "Não foi possivel criar a sua CONTA BankingExpress";
                header("location:../vews/criaconta.php");
            }
            else{
                // INICIALIZAR A TRANSÇÃO 
                 $iniciartransacao = mysqli_query($conect_serve,"start transaction;");
                 
                 //OPERAÇÃO *INSERÇÃO DE DADOS DO CLIENTE BANKING*
                 echo "Comece a operação";
                 $criarConta = mysqli_query($conect_serve,"insert into contacliente (contacliente.Nome, contacliente.Sobrenome, contacliente.Genero,contacliente.DataNasc,contacliente.Telefone,contacliente.Senha,contacliente.IDBanco) values ('$nome','$sobrenome','$genero','$DataNasc','$telefone','$palavrapasse','$bancoselecionado'); 
                ");
                if($criarConta==true and $iniciartransacao==true)
                {
                    //CONFIRMAR A TRANSAÇÃO A EXECUSÃO DA TRANSÇÃO 
                    $confirmartransacao = mysqli_query($conect_serve,"commit;");
                    $_SESSION['Parabens'] = "CONTA BankingExpress";
                    echo "Comece a operação".$_SESSION['Parabens'];
                    header("location:../index.php");
                }
                
            }
            /* 

            if($criarConta==false or $iniciartransacao==false)
            {
                 //CONFIRMAR A TRANSAÇÃO A EXECUSÃO DA TRANSÇÃO 
                $confirmartransacao = mysqli_query($conect_serve,"commit;");
                $_SESSION['Parabens'] = "CONTA BankingExpress";
                header("location:../vews/criaconta.php");
            }
            else{
                
               $cancelartransacao = mysqli_query($conect_serve,"rollback;");
               $_SESSION['alerta'] = "Não foi possivel criar a sua CONTA BankingExpress";
               header("location:../vews/criaconta.php");
            }
            unset($termo);*/
        }
        else{
            echo "preencha novamento os dados !";
        }

        unset($termo);
       echo "sfsfsdggffghgfhgf";

    }
    criarConta($conexao);

?>