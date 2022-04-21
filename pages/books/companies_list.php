<?php
include "conf/db/db.conf.php";
include "conf/db/crud.php";

$companyCrud = new Crud();

$companies = $companyCrud->getAll("available_companies");

foreach ($companies as $company) {
?>
<option value="<?=$company->id?>"><?=$company->name?></option>
<?php
}
?>
