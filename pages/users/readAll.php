<table class="highlight">
    <thead>
      <tr>
          <th>ID</th>
          <th>NOME</th>
          <th>CIDADE</th>
          <th>ENDEREÇO</th>
          <th>EMAIL</th>
          <th colspan="2">AÇÕES</th>
      </tr>
    </thead>

    <tbody>
      <?php
      foreach ($users as $user) {
        echo "<tr>";
        echo "<td>".$user->id."</td>";
        echo "<td>".$user->name."</td>";
        echo "<td>".$user->city."</td>";
        echo "<td>".$user->address."</td>";
        echo "<td>".$user->email."</td>";
        echo "<td><button class='btn waves-effect blue' onclick='displayUser({$user->id})'><i class='material-icons'>create</i></button></td>";
        echo "<td><button class='btn waves-effect red' onclick='confirm(\"Deseja excluir usuário?\") ? deleteUser({$user->id}) : \"\"'><i class='material-icons'>delete</i></button></td>";
        echo "</tr>";
      }
      ?>
  </tbody>
</table>
