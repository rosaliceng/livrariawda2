<?php
$userCrud = new Crud();
$users = $userCrud->getAll("users where status=1");

foreach ($users as $user) {
?>
<option value="<?=$user->id?>"><?=$user->name?></option>
<?php
}
?>
