<?php


        //session_start();
        
        include_once "connect.php";

        $tel_usuario = $_SESSION['usuario_validado'];
    
        $senha_usuario =  $_SESSION['senha_validado']; 
        //DECLARAÇÃO DAS VARIAVEIS A MANIPULAR

        $para = $_POST['destino'];
        $montante = $_POST['montante'];

        function tranferencia($conectar,$usuario,$senha)
        {
            $para = $_POST['destino'];
            $montante = $_POST['montante'];

            //INICIALIZAR A TRANZAÇÃO 
            $iniciartransacao = mysqli_query($conectar,"start transaction;");
                 
            //PRIMEIRA OPERAÇÃO VERIFICAR O SALDO DE CONTA PRIMEIRA FASE*
            $VerifSaldo = mysqli_query($conectar,"SELECT CodConta,Telefone,Senha,Saldo from contacliente where (Telefone ='$usuario' and Senha ='$senha')");

            //SEGUNDA OPERAÇÃO - VERIFICAR CONTA DE DESTINATÁRIO
            $VerifDestino = mysqli_query($conectar,"SELECT CodConta,Nome,Sobrenome,Conta,Telefone from contacliente where (Telefone ='$para' OR  Conta='$para')and (Telefone !='$usuario')");

            if((mysqli_num_rows($VerifSaldo)== 1)and (mysqli_num_rows($VerifDestino)== 1))
            {
                while ($linha  = mysqli_fetch_assoc($VerifSaldo))
                {
                    //BUSCAR OS DADOS DE ORIGEM
                    
                    $codigoCliente = $linha['CodConta'];
                    $saldo_conta = $linha['Saldo'];
                    $Telef = $linha['Telefone'];
 
                }

                //BUSCANDO OS DADOS DE DESTINATÁRIO
                while ($a =mysqli_fetch_Assoc($VerifDestino)) {
                    # cod
                    $codigoDestino = $a['CodConta'];
                    $NomeDestino = $a['Nome'];
                    $SobrenomeDestino = $a['Sobrenome'];

                }

                //Verificar o saldo de conta de Origem
                if($saldo_conta >= $montante)
                {
                        
                     //EFETUANDO O DESCONTO NA CONTA DE ORIGEM
                     $DescontoOrigem = mysqli_query($conectar,"UPDATE `contacliente` SET `Saldo` = (Saldo-'$montante') WHERE `contacliente`.`CodConta` = '$codigoCliente';");

                     //EFETUAR O DEPOSITO NA CONTA DE DESTINATARIO
                     $DescontoOrigem = mysqli_query($conectar,"UPDATE `contacliente` SET `Saldo` = (Saldo+'$montante') WHERE `contacliente`.`CodConta` = '$codigoDestino';");

                     //REGISTRANDO O MOVIMNTO NA CONTA DE ORIGEM
                     $RegistMov_Origem = mysqli_query($conectar,"INSERT INTO `operacao` (`codOperacao`, `Valor`, `Destino`, `IDCliente`, `IDTipo`, `Data`) VALUES (NULL, '-$montante', '$para', '$codigoCliente', '3', Now()); ");

                     //
                     //REGISTRANDO O MOVIMNTO NA CONTA DE DESTINO
                     $RegistMov_Origem = mysqli_query($conectar,"INSERT INTO `operacao` (`codOperacao`, `Valor`, `Destino`, `IDCliente`, `IDTipo`, `Data`) VALUES (NULL, '+$montante', '$Telef', '$codigoDestino', '3', Now()); ");
                    
                     //
    ?>
                     
                    <div class="card mt-4" id="transferencia">
                  
                        <h4 class="font-weight-bolder">Confirme os Dados </h4>
                        <h5 class="font-weight-bolder"><?php echo "Desti : ".$NomeDestino." ".$SobrenomeDestino; ?></h5>
                        <h5 class="font-weight-bolder"><?php echo "Montante : ".number_format($montante,2,',','.')." "?></h5><br>
                        <p class="mb-0">Certifique -se de que os dados de destinario estejam correcto.</p> 
                      

                        <form class="card-body p-3" action="./Operacoes.php" method="post">
                          <br>
                          <div class="row">
                            <div class="col-md-6 mb-md-0 mb-4">
                              <div class="card  card-plain border-radius-lg2 d-flex2 align-items-center flex-row">
                                <div class="input-group input-group-outline mb-36"> 
                                  <center>
                                  <a class="btn bg-gradient-success w-1002 mb-0 toast-btn" href="../controles/confirmar.php?conirmar=1" data-target="successToast"  name="confirmar" value="confirmar" >Conformar </a>
                                  </center>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="card card-plain border-radius-lg d-flex align-items-center flex-row">
                                  <div class="input-group input-group-outline mb-36">
                                    <center>
                                        <a href="../controles/confirmar.php?conirmar=1" class="btn bg-gradient-danger w-1002 mb-0 toast-btn" name="destino" >Cancelar</a>
                                    </center>
                                  </div>
                              </div>
                            </div>

                          </div> 
                            <br><br>
                        </form>
                    </div>


                    <div class="alert alert-warningt alert-dismissible text-whitte" role="alert" hidden>
                        <h4 class="font-weight-bolder">Confirme os Dados </h4>
                        <h5 class="font-weight-bolder"><?php echo "Destinatário : ".$NomeDestino." ".$SobrenomeDestino; ?></h5>
                        <h5 class="font-weight-bolder"><?php echo "Montante : ".number_format($montante,2,',','.')." "?></h5><br>
                        <p class="mb-0">Certifique -se de que os dados de destinario estejam correcto.</p> 
                        <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Closev" >
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

             

    <?php
                      
                      //echo $codigoCliente." origem <br> Destino ".$codigoDestino."<br>";
                        
                }
                else{
                        echo "Não é possivel tranferirir";
                }
                    //echo "$saldo_conta <br> $codigoCliente<br>";
            } 


        }
        tranferencia($conexao,$tel_usuario,$senha_usuario);
        //echo "$para $montante";


?>
