<?php
include "conf/db/db.conf.php";
include "conf/db/crud.php";

$bookCrud = new Crud();

$book = $bookCrud->getAll("books_view");

foreach ($book as $books) {
?>
<option value="<?=$books->id?>"><?=$books->name?></option>
<?php
}
?>
