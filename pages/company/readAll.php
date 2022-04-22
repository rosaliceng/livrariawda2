<table class="highlight">
    <thead>
      <tr>
          <th>ID</th>
          <th>NOME</th>
          <th>CIDADE</th>
          <th colspan="2">AÇÕES</th>
      </tr>
    </thead>

    <tbody>
      <?php


foreach ($companies as $company) {
  echo "<tr>";
  echo "<td>".$company->id."</td>";
  echo "<td>".$company->name."</td>";
  echo "<td>".$company->city."</td>";
  echo "<td><button class='btn waves-effect blue' onclick='displayCompany({$company->id})'><i class='material-icons'>create</i></button></td>";
  echo "<td><button class='btn waves-effect red' onclick='confirm(\"Deseja excluir editora?\") ? deleteCompany({$company->id}) : \"\"'><i class='material-icons'>delete</i></button></td>";
  echo "</tr>";
}
?>
