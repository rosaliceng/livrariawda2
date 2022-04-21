<?php
include "../../conf/db/db.conf.php";
include "../../conf/db/crud.php";

switch ($_SERVER['REQUEST_METHOD']) {
  case 'POST':
  $action = (explode("=",$_SERVER['QUERY_STRING']))[1];
    switch ($action) {
      case 'insert':
        $crud->insert($_POST, "books_users");
        break;
      case 'delete':
        $id = $_POST['id'];
        unset($_POST['id']);
        echo "ID: ".$id;
        $crud->update($_POST, "books_users", "id={$id}");
        break;
      case 'find':
        $id = $_POST['id'];
        $result = $crud->find("id, book, username, pick_date, exp_date, book_id,user_id","locacao_livros","id={$id}");
        echo json_encode($result);
        break;
      case 'update':
        $id = $_POST['id'];
        unset($_POST['id']);
        $crud->update($_POST, "locacao_livros", "id={$id}");
      break;
      default:
        break;
    }
    break;
  case 'GET':
    $action = (explode("=",$_SERVER['QUERY_STRING']))[1];
    switch ($action) {
      case 'topRent':
      include "top_rent.php";
      break;
      case 'all':
      $rents = $crud->getAll("locacao_livros");
      include "readAll.php";
      break;
      case 'search&field':
    $rents= $crud->findAll($_GET['field'], "locacao_livros where ", $fields = ["book","book_id","user_id","pick_date","exp_date","username","returned"]);
      if(!empty($rents)) {
        include "readAll.php";
      } else {
        echo "<center><h4>Resultado não encontrado!</h4></center>";
      }
      break;
    }
    break;
}
?>
