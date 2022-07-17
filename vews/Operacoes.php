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
  <!--     Fonts and icons     --> 
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
   
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
                        <a class="btn bg-gradient-dark mb-0" hidden href="../controles/encerrarAplicacao.php"><i class="material-icons text-sm"></i>&nbsp;&nbsp;</a>
                        
                </div>

              <div class="alert alert-warning alert-dismissible text-white" role="alert">
                  <h6 class="font-weight-bolder">Conta Banking Express </h6>
                  <p class="mb-0">registra-se na bankingExpress e torne sua vida finânceira mais facil</p>
              </div>
                  
            </div> 

            </div>                
                <div class="card-body">

                <center> 
                  <?php

                      include_once "../controles/processar.php";
                           

                  ?>

                </center> <br> 

          <!-- FECHAMENTO DO FILTRO -->
              <?php
                  }

              ?>
  
          <!-- -->
             
          <div class="card-body p-3" hidden>
              <form action="../controles/confirmar.php" method="post">
                <div class="row">
                  <div class="col-lg-3 col-sm-6 col-12">
                    <a class="btn bg-gradient-success w-1002 mb-0 toast-btn" href="../controles/confirmar.php?conirmar=1" data-target="successToast"  name="confirmar" value="confirmar" >Conformar </a>
                  </div> 
                  <div class="col-lg-3 col-sm-6 col-12 mt-lg-0 mt-2">
                    <a class="btn bg-gradient-danger w-1002 mb-0 toast-btn" type="submit" data-target="dangerToast" name="cancelar">Concelar</a>
                  </div>
                </div>
              </form>
          </div>
             
              
            </div>
                </div> 
              </div>
            </div>
          </div>
        </div>
      </div>
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
  <script src="../assets/js/material-dashboard.min.js?v=3.0.2"></script>

</body>

</html>