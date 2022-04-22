<?php
include "../../conf/db/db.conf.php";
include "../../conf/db/crud.php";

switch ($_SERVER['REQUEST_METHOD']) {
  case 'POST':
  $action = (explode("=",$_SERVER['QUERY_STRING']))[1];
    switch ($action) {
      case 'insert':
        $crud->insert($_POST, "company");
        break;
      case 'delete':
        $id = $_POST['id'];
        unset($_POST['id']);
        echo "ID: ".$id;
        $crud->update($_POST, "company", "id={$id}");
        break;
      case 'find':
        $id = $_POST['id'];
        $result = $crud->find("id, name, city","company","id={$id}");
        echo json_encode($result);
        break;
      case 'update':
        $id = $_POST['id'];
        unset($_POST['id']);
        $crud->update($_POST, "company", "id={$id}");
      break;
      default:
        break;
    }
    break;
  case 'GET':
    $action = (explode("=",$_SERVER['QUERY_STRING']))[1];

    switch ($action) {
      case 'all':
      $companies = $crud->getAll("available_companies");
      include "readAll.php";
      break;
      case 'search&field':
      $companies = $crud->findAll($_GET['field'], "available_companies where ", $fields = ["name","city"]);
      if(!empty($companies)) {
        include "readAll.php";
      } else {
        echo "<center><h4>Resultado não encontrado!</h4></center>";
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
