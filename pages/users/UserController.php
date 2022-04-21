<?php
include "../../conf/db/db.conf.php";
include "../../conf/db/crud.php";

switch ($_SERVER['REQUEST_METHOD']) {
  case 'POST':
  $action = (explode("=",$_SERVER['QUERY_STRING']))[1];
    switch ($action) {
      case 'insert':
        $crud->insert($_POST, "users");
        break;
      case 'delete':
        $id = $_POST['id'];
        unset($_POST['id']);
        
        $crud->update($_POST, "users", "id={$id}");
        break;
      case 'find':
        $id = $_POST['id'];
        $result = $crud->find("id, name, city, address, email","users","id={$id}");
        echo json_encode($result);
        break;
      case 'update':
        $id = $_POST['id'];
        unset($_POST['id']);
        $crud->update($_POST, "users", "id={$id}");
      break;
      default:
        break;
    }
    break;
  case 'GET':
    $action = (explode("=",$_SERVER['QUERY_STRING']))[1];

    switch ($action) {
      case 'all':
      $users = $crud->getAll("users where status = 1");
      include "readAll.php";
      break;
      case 'search&field':
      $users = $crud->findAll($_GET['field'], "users where (status = 1) and ", $fields = ["name","city","email","address"]);
      if(!empty($users)) {
        include "readAll.php";
      } else {
        echo "<center><h4>Usuário não encontrado!</h4></center>";
      }
      break;
    }
    break;
  case 'PUT':
    break;
  case 'DELETE':
    break;
}
?>
