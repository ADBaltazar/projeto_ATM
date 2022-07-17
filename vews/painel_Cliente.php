<?php 
    
    session_start();
    
    
    require_once "../controles/connect.php";

    //Gerenciando o acesso

    
    $tel_usuario = $_SESSION['usuario_validado'];
    
    $senha_usuario =  $_SESSION['senha_validado']; 

    $liberar_acesso = mysqli_query($conexao,"SELECT Telefone,Senha from contacliente where (Telefone ='$tel_usuario' and Senha ='$senha_usuario')");

    if(mysqli_num_rows($liberar_acesso) > 0)
    {

    }
    else{
      unset($_SESSION['usuario_validado']);
      unset($_SESSION['senha_validado']);

      header("location:../index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
  <link rel="icon" type="image/png" href="../images/Screenshot 2022-04-10 at 17-08-52 MULTICAIXA Express.png">
  <title>
    Banking Express
  </title>

  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.0.2" rel="stylesheet" />



  
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons --> 
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.0.2" rel="stylesheet" />
  <style type="text/css">
    #corletra{ 
      background: #ed7607;
    }
    .corletra{ 
      background: #ed7607;
    }
    #corletra2{
      color: #ed7607; 
    }
  </style>
</head>

<body class="">
   
  <main class="main-content  mt-0">
    <!-- CONSULTA SQL PARA FAZER FILTRO DOS DADO DA CONTA DO CLIENTE-->
    <?php
        
        $filtrarDados = mysqli_query($conexao,"SELECT * from contacliente inner join tb_banco on contacliente.IDBanco = tb_banco.codBanco where (contacliente.Telefone='$tel_usuario' and contacliente.Senha='$senha_usuario');");

        while ($linhaFiltrado = mysqli_fetch_assoc($filtrarDados)) {
          # code...
    ?>
    <!---->
    <section>
      <div class="page-header min-vh-100">
        <div class="container"> 
            <div class="col-5 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column" style="background-image: url('../assets/img/illustrations/ insira uma imagem'); background-size: cover;">
            
            </div>
            <div class="col-xl-6 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5" style="background-image: url('../assets/img/illustrations/'); background-size: cover;">
              <div class="card card-plain">
              
                <div class="card-header" >
                <div class="col-6- text-end" >
                        <?php
                           if(isset($_SESSION['modoAdmin']))
                           {
                        ?>
                        <a class="btn bg-gradient-dark mb-0" href="./painelAdmin.php"><i class="material-icons text-sm"></i>&nbsp;&nbsp; Modo Admin</a>    
                        <?php
                           }
                        ?>
                </div>

                <div class="alert alert-warning alert-dismissible text-white" role="alert">
                  <h6 class="font-weight-bolder">Conta Banking Express </h6>
                  <p class="mb-0">registra-se na bankingExpress e torne sua vida finânceira mais facil</p>
                  

              </div>
                  
            </div> 

            </div>                
                <div class="card-body">

                <center>
                  <div class="col-xl-9 mb-xl-0 mb-4" >
                    <div class="card bg-transparent shadow-xl">
                      <div class="overflow-hidden position-relative border-radius-xl">
                        <img src="../assets/img/illustrations/pattern-tree.svg" class="position-absolute opacity-2 start-0 top-0 w-100 z-index-1 h-100" alt="pattern-tree">
                        <span class="mask bg-gradient-dark opacity-10"></span>
                        <div class="card-body position-relative z-index-1 p-3">
                          <i class="material-icons text-white p-2"><?php 
                          //IMPRIMINDO O BANCO AQUE SE ENCONTRA CADASTRADO
                            echo " ".$linhaFiltrado['Banco']." ";/*$linhaFiltrado['Sigla']*/
                          ?></i>
                          <h5 class="text-white mt-4 mb-5 pb-2">4562&nbsp;&nbsp;&nbsp;1122&nbsp;&nbsp;&nbsp;4594&nbsp;&nbsp;&nbsp;7852</h5>
                          <div class="d-flex">
                            <div class="d-flex">
                              <div class="me-4">
                                <p class="text-white text-sm opacity-8 mb-0">Proprietário</p>
                                <h6 class="text-white mb-02">
                                  <?php 
                                  //IMPRIMINDO O TITULAR DA CONTA
                                    echo " ".$linhaFiltrado['Nome']."  ".$linhaFiltrado['Sobrenome'];
                                  ?>
                                </h6>
                              </div>
                              <div>
                                <p class="text-white text-sm opacity-8 mb-0">validade</p>
                                <h6 class="text-white2 mb-0">11/22</h6>
                              </div>
                            </div>
                            <div class="ms-auto w-20 d-flex align-items-end justify-content-end">
                              <img class="w-60 mt-2" src="../assets/img/logos/mastercard.png" alt="logo">
                            </div>
                          </div>
                        </div>
                      </div>
                      <br><br>
                      <a class="btn bg-gradient-dark mb-0" href="javascript:;"><i class="material-icons text-sm"></i>&nbsp;&nbsp; novo Cartão</a>
                    </div>
                  </div>
                  </center> <br>
              <div class="row">
                <div class="col-md-6 col-6">
                  <div class="card">
                    <div class="card-header mx-4 p-3 text-center">
                      <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                        <i class="material-icons opacity-10">AKZ</i>
                      </div>
                    </div>
                    <div class="card-body pt-0 p-3 text-center">
                      <h6 class="text-center mb-0">Saldo de Conta</h6>
                      <span class="text-xs" >Saldo disponivel</span> 
                      <hr class="horizontaly dark my-3">
                      <h5 class="mb-0">
                              <?php 
                                  //IMPRIMINDO O TITULAR DA CONTA
                                    $saldo = $linhaFiltrado['Saldo'];
                                    $ValorFinal = number_format($saldo,2,'.',',');
                                    echo " ".$ValorFinal;
                              ?>
                      </h5>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-6">
                  <div class="card">
                    <div class="card-header mx-4 p-3 text-center">
                      <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                        <i class="material-icons opacity-10">$US</i>
                      </div>
                    </div>
                    <div class="card-body pt-0 p-3 text-center">
                      <h6 class="text-center mb-0">Valor Em Dolar</h6>
                      <span class="text-xs">cabio Internacional</span>
                      <hr class="horizontaly dark my-3">
                      <h5 class="mb-0">
                             <?php 
                                  //IMPRIMINDO O TITULAR DA CONTA
                                    $saldo = $linhaFiltrado['Saldo']/75000;
                                    $ValorFinal = number_format($saldo,2,'.',',');
                                    echo " \$ US ".$ValorFinal;
                              ?>
                      </h5>
                    </div>
                  </div>
                </div>
              </div>

          <!-- FECHAMENTO DO FILTRO -->
              <?php
                  }

              ?>
  
          <!-- -->
             
          <div class="card-body p-3">
               
                <div class="row">
                  <div class="col-lg-3 col-sm-6 col-12">
                    <a class="btn bg-gradient-success w-100 mb-0 toast-btn" href="?operacao=1#transferencia" data-target="successToast"  name="tranf">Tranferencia</a>
                  </div>
                  <div class="col-lg-3 col-sm-6 col-12 mt-sm-0 mt-2">
                    <a class="btn bg-gradient-info w-100 mb-0 toast-btn" href="?operacao=2#Levantamento" data-target="infoToast">Levantamento</a>
                  </div>
                  <div class="col-lg-3 col-sm-6 col-12 mt-lg-0 mt-2">
                    <a class="btn bg-gradient-warning w-100 mb-0 toast-btn" href="?operacao=3#movimentos" data-target="warningToast">Movimento</a>
                  </div>
                  <div class="col-lg-3 col-sm-6 col-12 mt-lg-0 mt-2">
                  
                    <a class="btn bg-gradient-danger w-100 mb-0 toast-btn" href="../controles/encerrarAplicacao.php" data-target="dangerToast">encerrar</a>
                  </div>
                </div>  
            </div>
             <?php
                   
                    if(isset($_GET['operacao']))
                    {
                      $escolha = $_GET['operacao'];
                      switch($escolha)
                      {
                        case '1':
              ?>
                    
                    <div class="card mt-4" id="transferencia">
                        <div class="card-header pb-0 p-3">
                          <div class="row">
                            <div class="col-6 d-flex align-items-center">
                              <h6 class="mb-0">Painel de Tranferencia</h6>
                            </div>   
                          </div>
                        </div>
                        <form class="card-body p-3" action="./Operacoes.php" method="post">
                          <div class="row">
                            <div class="col-md-6 mb-md-0 mb-4">
                              <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                                <div class="input-group input-group-outline mb-36">
                                  <label class="form-label">Nº de Conta / Telefone </label>
                                  <input type="number" class="form-control" name="destino" required>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                                  <div class="input-group input-group-outline mb-36">
                                    <label class="form-label">Valor monetario </label>
                                    <input type="number" class="form-control" name="montante" required>
                                  </div>
                              </div>
                            </div>

                          </div>
                          <div class="col-md-65">
                              <div class="text-center">
                                  <button type="submit" name="bt_transf" class="btn btn-lg bg-gradient-success btn-lg6 w-1006 mt-4 mb-09" >Confirmar tranferância</button>
                              </div>
                          </div>

                        </form>
                    </div>

              <?php
                          if(isset($_GET['bt_transf']))
                          {
                            echo "clicou no botao tranferir !";
                          }

                          //echo "tranferencia"
                          ;break;
                        case '2':
            ?>

                  <div class="card mt-4" id="Levantamento">
                        <div class="card-header pb-0 p-3">
                          <div class="row">
                            <div class="col-6 d-flex align-items-center">
                              <h6 class="mb-0">Levantamento</h6>
                            </div>   
                          </div>
                        </div>
                        <form class="card-body p-3" action="./Operacoes.php" method="post">
                          <div class="row">   
                            <div class="col-md-66 mb-md-0 mb-4">
                              <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                                <div class="input-group input-group-outline mb-36">
                                  <label class="form-label">Montante a levantar </label>
                                  <input type="number" class="form-control" name="montante" required>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-65">
                                
                                      <center>
                                      <button type="submit" name="bt_levant" class="btn btn-lg bg-gradient-info btn-lg6 w-1006 mt-4 mb-09" >Confirmar</button>
                                
                                      </center>
                              
                            </div>

                          </div>
                          <div class="col-md-65">
                              
                          </div>

                        </form>
                  </div>



            <?php
                           // echo "Levantamento";
                          ;break;

                        case '3':
            ?>

              <div class="row" id="movimentos">
                  <div class="col-12">
                  <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                      <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Consulta de Movimentos </h6>
                      </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                      <div class="table-responsive p-0">
                        <table class="table align-items-center justify-content-center mb-0">
                          <thead>
                            <tr> 
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tipo de Mocimento</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Montante</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Data de Realização</th>
                              <th hidden></th>
                            </tr>
                          </thead>
                          <tbody>

                          <?php
                              $listaBanco =mysqli_query($conexao,"SELECT * from tb_banco");
                              while($lista =mysqli_fetch_assoc($listaBanco))
                              {

                                  //recuperando o codigo do banco
                                  $codigo_banco = $lista['codBanco'];
                                  //SOMANDO O PAPITAL DOS CLIENTE POR BANCO
                                  $capitalIvest =mysqli_query($conexao,"SELECT Saldo from contaCliente where IDBanco ='$codigo_banco'");
                                  $Ivestimento = 0;
                                  while($saldo = mysqli_fetch_assoc($capitalIvest))
                                  {
                                    $Ivestimento = $Ivestimento+$saldo['Saldo'];
                                  }

                          ?>
                              <tr>
                                  <td>
                                    <div class="d-flex px-2">
                                      <div>
                                        <img src="../assets/img/small-logos/logo-asana.svg" class="avatar avatar-sm rounded-circle me-2" alt="spotify">
                                      </div>
                                      <div class="my-auto">
                                        <h6 class="mb-0 text-sm"><?php echo $lista['Banco']; ?></h6>
                                      </div>
                                    </div>
                                  </td>
                                  <td>
                                    <p class="text-sm font-weight-bold mb-0"><?php echo number_format($Ivestimento,2,',','.'); ?></p>
                                  </td>
                                  <td>
                                    <span class="text-xs font-weight-bold"><?php echo "Bom"; ?></span>
                                  </td> 
                                  <td class="align-middle" hidden>
                                    <button class="btn btn-link text-secondary mb-0">
                                      <i class="fa fa-ellipsis-v text-xs"></i>
                                    </button>
                                  </td>
                                </tr>
                          <?php
                              }
                          ?>

                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            <?php

                           // echo "Movimento";
                            ;break;

                            default:

                            ;break;
                      }
                    } 
                     

            ?>
              <div class="col-md-12 mb-lg-0 mb-4">
              
            </div>
                </div> 
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer py-4  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                Criado <i class="fa fa-heart"></i> pela
                <a href="https://free.facebook.com/fernand.gomes.1428?ref_component=mfreebasic_home_header&ref_page=%2Fwap%2Fhome.php&refid=7" class="font-weight-bold" target="_blank">ArSystems</a>
                .
              </div>
            </div> 
          </div>
        </div>
      </footer>

    </section>
  </main>

  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="material-icons py-2">Configurações</i>
    </a>
    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Suas Preferencias</h5> 
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="material-icons">X</i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Cores</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Opcções de Menu</h6>
          <p class="text-sm"></p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark" onclick="sidebarType(this)">Preto</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent" onclick="sidebarType(this)">Transparente</button> 
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <div class="mt-3 d-flex">
          <h6 class="mb-0">Fixar a navegação</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
          </div>
        </div>
        <hr class="horizontal dark my-3">
        <div class="mt-2 d-flex">
          <h6 class="mb-0">claro / escuro</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)" >
          </div>
        </div>
          
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script> 
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.0.2"></script>
</body>

</html>