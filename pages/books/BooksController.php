<?php
include "../../conf/db/db.conf.php";
include "../../conf/db/crud.php";

switch ($_SERVER['REQUEST_METHOD']) {
  case 'POST':
  $action = (explode("=",$_SERVER['QUERY_STRING']))[1];
    switch ($action) {
      case 'insert':
        $crud->insert($_POST, "books");
        break;
      case 'delete':
        $id = $_POST['id'];
        unset($_POST['id']);
        
        $crud->update($_POST, "books", "id={$id}");
        break;
      case 'find':
        $id = $_POST['id'];
        $result = $books->find("id, name, author, launch, quantity, editora, company_id","books_view","id={$id}");
        echo json_encode($result);
        break;
      case 'update':
        $id = $_POST['id'];
        unset($_POST['id']);
        $crud->update($_POST, "books", "id={$id}");
      break;
      default:
        break;
    }
    break;
  case 'GET':
    $action = (explode("=",$_SERVER['QUERY_STRING']))[1];

    switch ($action) {
      case 'all':
      $book = $crud->getAll("books_view");
      include "readAll.php";
      break;
      case 'search&field':
      $book= $crud->findAll($_GET['field'], "books_view where ", $fields = ["name","author","launch","quantity","editora"]);
      if(!empty($book)) {
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
