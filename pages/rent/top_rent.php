<?php
$topRent = $crud->getAll("top_locacao", "quantity", "desc");
$lastRent = $crud->find("book","locacao_livros","order by id limit 1","desc",false);
$result = ["lastRent" => $lastRent, "topRent" => $topRent];
echo json_encode($result);
?>
