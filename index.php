<?php include "conf/paths.php";?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- Compiled and minified CSS -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <style media="screen">
      .align-text {
        margin-top: 4px;
        margin-left: 4px
      }
      .teal {
        background-color: red
      }
      .input-field input[type=text]:focus + label {
           color: #1e88e5!important;
         }
      .input-field input[type=text]:focus {
        border-bottom: 1px solid #fff!important;
        box-shadow: 0 1px 0 0 #1e88e5 !important;
      }
      .input-field .prefix.active {
        color: #1e88e5;
      }
    </style>
    <script type="text/javascript">
      $().ready(function(){
        $('.modal').modal();
      });
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>bem vindo</title>
  </head>
  <body>
    <nav class="nav-extended blue darken-1">
    <div class="nav-wrapper">
      <a href="#" class="brand-logo">Livraria WDA</a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
    <div class="nav-content">
      <ul class="tabs tabs-transparent">
        <li class="tab <?= (isset($_GET['page']) && $_GET['page']=="home") ? "active" : "" ?>">
          <a href="?page=home">
            <div class="row">
              <div class="col s2">
                <i class ="material-icons">home</i>
              </div>
              <div class="col s2">
                <div class="align-text">
                  Home
                </div>
              </div>
            </div>
          </a>
        </li>
        <li class="tab <?= (isset($_GET['page']) && $_GET['page']=="users") ? "active" : "" ?>">
          <a class="active" href="?page=users">
          <div class="row">
            <div class="col s2">
              <i class ="material-icons">person</i>
            </div>
            <div class="col s2">
              <div class="align-text">
                Usuários
              </div>
            </div>
          </div>
        </a></li>
        <li class="tab <?= (isset($_GET['page']) && $_GET['page']=="company") ? "active" : "" ?>">
          <a class="active" href="?page=company">
          <div class="row">
            <div class="col s2">
              <i class ="material-icons">business</i>
            </div>
            <div class="col s2">
              <div class="align-text">
                Editora
              </div>
            </div>
          </div>
        </a></li>
        <li class="tab <?= (isset($_GET['page']) && $_GET['page']=="books") ? "active" : "" ?>">
          <a class="active" href="?page=books">
          <div class="row">
            <div class="col s2">
              <i class ="material-icons">library_books</i>
            </div>
            <div class="col s2">
              <div class="align-text">
                Livros
              </div>
            </div>
          </div>
        </a></li>
        <li class="tab <?= (isset($_GET['page']) && $_GET['page']=="rent") ? "active" : "" ?>">
          <a class="active" href="?page=rent">
          <div class="row">
            <div class="col s2">
              <i class ="material-icons">dvr</i>
            </div>
            <div class="col s2">
              <div class="align-text">
                Aluguéis
              </div>
            </div>
          </div>
        </a></li>
      </ul>
    </div>
  </nav>
  <div class="container">
    <?php include "pages/handle_pages.php";?>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  </body>
</html>
