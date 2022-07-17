<?php
    
    session_start();
    require_once "controles/connect.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <title>
    BANKEXPRESS
  </title> 
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/material-dashboard.css?v=3.0.2" rel="stylesheet" />

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
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
        
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="background-image: url('assets/img/illustrations/Untitled-26.png'); background-size: cover;">
              </div>
            </div>
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
              <div class="card card-plain">
                <div class="card-header">
                  <h4 class="font-weight-bolder">Iniciar Sessão </h4>
                  <p class="mb-0" >registra-se na bankingExpress e torne sua vida finânceira mais facil</p>
                </div>
                <div class="card-body">
                <form role="form" class="text-start" action="controles/controlllogin.php" method="post">
                  <?php
                  if(isset($_SESSION['alerta'])) 
                  { 
                      
                  ?>
                  <div class="alert alert-danger alert-dismissible text-white" role="alert">
                    <span class="text-sm">Lamentamos! <a href="javascript:;" class="alert-link text-white"><?php  echo "".$_SESSION['alerta']; ?></a>. Não foi possivel validar o teu Acesso.</span>
                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <?php
                    }
                    //unset($_SESSION['Parabens']);
                    unset($_SESSION['alerta']);
                  if(isset($_SESSION['Parabens']))
                  {
                  ?>
                  <div class="alert alert-success alert-sucess text-white" role="alert">
                    <span class="text-sm">Parabéns! <a href="javascript:;" class="alert-link text-white"><?php  echo "".$_SESSION['Parabens']; ?></a> criada com Sucesso.</span> 
                  </div>
                <?php
                      unset($_SESSION['Parabens']);
                  }
                ?>
            
                      
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Nº de Telefone</label>
                      <input type="number" class="form-control" name="usuario" required>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">senha</label>
                      <input type="password" class="form-control" name="senha" required>
                    </div>
                    <div class="form-check form-check-info text-start ps-0">
                      <input class="form-check-input corletra" type="checkbox" value="" id="flexCheckDefault" required>
                      <label class="form-check-label" for="flexCheckDefault" >
                         <a href="#" class="text-dark font-weight-bolder">Estado ativo</a>
                      </label>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0" id="corletra">concluido</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-2 text-sm mx-auto">
                    Não tem registro?
                    <a href="vews/criaconta.php" class="text-primar text-gradiente font-weight-bold " id="corletra2">Crie já sua conta</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
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
  </main>
  <!--   Core JS Files   -->  
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons --> 
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/material-dashboard.min.js?v=3.0.2"></script>
</body>
</html>