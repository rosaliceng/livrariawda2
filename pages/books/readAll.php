<table class="highlight">
    <thead>
      <tr>
          <th>ID</th>
          <th>NOME</th>
          <th>AUTOR</th>
          <th>LANÇAMENTO</th>
          <th>EDITORA</th>
          <th>QUANTIDADE</th>

          <th colspan="2">AÇÕES</th>
      </tr>
    </thead>

    <tbody>
      <?php

foreach ($book as $books) {
  echo "<tr>";
  echo "<td>".$books->id."</td>";
  echo "<td>".$books->name."</td>";
  echo "<td>".$books->author."</td>";
  echo "<td>".date_format(date_create($books->launch), "d/m/Y")."</td>";
  echo "<td>".$books->editora."</td>";
  echo "<td>".$books->quantity."</td>";
  echo "<td><button class='btn waves-effect blue' onclick='displayBooks({$books->id})'><i class='material-icons'>create</i></button></td>";
  echo "<td><button class='btn waves-effect red' onclick='confirm(\"Deseja excluir livro?\") ? deleteBooks({$books->id}) : \"\"'><i class='material-icons'>delete</i></button></td>";
  echo "</tr>";
}
?>
