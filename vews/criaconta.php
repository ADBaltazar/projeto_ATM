<?php 
    
    session_start();
    
    
    require_once "../controles/connect.php";

    //Gerenciando o acesso

?> 
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Material Dashboard 2 by Creative Tim
  </title> 
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
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="background-image: url('../assets/img/illustrations/Untitled-26.png'); background-size: cover;">
              </div>
            </div>
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
              <div class="card card-plain">
                <div class="card-header">
                  <h4 class="font-weight-bolder">Crie sua Conta </h4>
                  <p class="mb-0">registra-se na bankingExpress e torne sua vida finânceira mais facil</p>
                </div>
                <!---->
                <?php
                if (isset($_SESSION['alerta'])) {
                    
                ?>
                <div class="alert alert-danger alert-dismissible text-white" role="alert">
                  <span class="text-sm">Lamentamos! <a href="javascript:;" class="alert-link text-white"><?php  echo "".$_SESSION['alerta']; ?></a>.</span>
                  <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>


                <?php 
                }
                  unset($_SESSION['alerta']);
                ?>
                <div class="card-body">
                  <form role="form" action="../controles/criarConta.php" method="post">
                  <?php

                      $buscandoBancos = mysqli_query($conexao,"SELECT *from tb_banco; ");

                      if(mysqli_num_rows($buscandoBancos) ==0)
                      {

                      }
                      else{

                  ?>
                <!---->
                  <div class="input-group input-group-outline mb-3"> 

                    
                      <select name="banco" id="" class="form-control input-group input-group-outline mb-3" required>
                        <option value="">Selecione um Banco</option>
                        <?php

                            while($banco = mysqli_fetch_assoc($buscandoBancos))
                            {
                              $codigo = $banco['codBanco'];
                              $listabanco = $banco['Banco'];
                              $logo = $banco['Sigla'];
                        ?>
                          <option value="<?php echo $codigo;?>" class="input-group input-group-outline mb-3"><?php echo "$logo - $listabanco "; ?></option>
                        <?php
 
                        }
                        ?>
                      </select>
                  </div>
                  <?php

                      }
                  ?>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Nome</label>
                      <input type="text" class="form-control" name="nome" required autocomplete="false">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Apelido</label>
                      <input type="text" class="form-control" name="apelido" required autocomplete="false">
                    </div>
                    <div class="form-check form-check-info text-start ps-0">
                      <input class="form-check-input corletra" type="radio" value="M" id="flexCheckDefault" checked name="sexo">
                      <label class="form-check-label text-dark font-weight-bolder" for="flexCheckDefault" >
                       Masculino
                      </label>
                      <input class="form-check-input corletra" type="radio" value="F" id="flexCheckDefault1"  name="sexo">
                      <label class="form-check-label text-dark font-weight-bolder" for="flexCheckDefault1" >
                       Feminino
                      </label>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label" hidden>Data de Nascimento</label>
                      <input type="date" class="form-control" name="datanasc" required>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Nº de Telefone</label>
                      <input type="text" class="form-control" name="telefone" minlength="9" maxlength="13" required >
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">senha</label>
                      <input type="password" class="form-control" minlength="4" maxlength="25" required name="senha">
                    </div>
                    <div class="form-check form-check-info text-start ps-0">
                      <input class="form-check-input corletra" type="checkbox" id="flexCheckDefault2" required name="termos">
                      <label class="form-check-label" for="flexCheckDefault2" >
                        Eu eceito os <a href="javascript:;" class="text-dark font-weight-bolder">termos de licença</a>
                      </label>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0" id="corletra">Crie minha Banking</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-2 text-sm mx-auto">
                    já tenho uma conta?
                    <a href="../index.php" class="text-primar text-gradiente font-weight-bold " id="corletra2">iniciar sessão</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
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
  <!-- Github buttons 
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  -->
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.0.2"></script>
</body>

</html>