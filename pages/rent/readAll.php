<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.fixed-action-btn');
    var instances = M.FloatingActionButton.init(elems, {
      direction: 'left'
    });
  });
</script>
<table class="highlight">
    <thead>
      <tr>
          <th>ID</th>
          <th>LIVRO</th>
          <th>USUÁRIO</th>
          <th>ALUGUEL</th>
          <th>RETORNO</th>
          <th>STATUS DEVOLUÇÃO</th>
          <th colspan="2">AÇÕES</th>
      </tr>
    </thead>

    <tbody>
<?php
function formatTurnBack($dateReturn, $expDate) {
  if(!$dateReturn) {
    return "<span class='badge blue lighten-1' style='font-size:12px;color:white !important;border-radius: 10px;'>Não devolvido </span>";
  } else if($dateReturn > $expDate) {
    return "<span class='badge red' style='font-size:12px;color:white !important;border-radius: 10px;'>".date_format(date_create($dateReturn), "d/m/Y")."</span>";
  } else {
    return "<span class='badge green' style='font-size:12px;color:white !important;border-radius: 10px;'>".date_format(date_create($dateReturn), "d/m/Y")."</span>";
  }
}

foreach ($rents as $rent) {
  echo "<tr>";
  echo "<td>".$rent->id."</td>";
  echo "<td>".$rent->book."</td>";
  echo "<td>".$rent->username."</td>";
  echo "<td>".date_format(date_create($rent->pick_date), "d/m/Y")."</td>";
  echo "<td>".date_format(date_create($rent->exp_date), "d/m/Y")."</td>";
  echo "<td>".formatTurnBack($rent->returned, $rent->exp_date)."</td>";
  echo "<td><button class='btn waves-effect blue' title='Visualizar/Editar' onclick='displayRent({$rent->id})'><i class='material-icons'>create</i></button></td>";
  echo "<td><button class='btn waves-effect green' onclick='confirm(\"Deseja dar baixa?\") ? turnBack({$rent->id}) : \"\"'><i class='material-icons'>check</i></button></td>";
  echo "</tr>";
}
?>
