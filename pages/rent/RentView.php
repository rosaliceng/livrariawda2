<ul class="collection">
  <li class="collection-item">
    <div class="row">
      <div class="col s1">
        <p style="font-size:20px">Aluguéis</p>
      </div>
      <div class="col s3">
        <div class="row">
          <div class="col s12">
            <a class="waves-effect waves-light btn blue darken-1" style="margin-top:14px" onclick="openRentModal()">
              <i class="material-icons right">add</i>Novo
            </a>
          </div>
        </div>
      </div>
      <div class="col s2">
      </div>
      <div class="col s6">
        <div class="row">
          <form class="col s12">
            <div class="row">
              <div class="input-field col s12">
                <input id="search" type="text" class="validate ">
                <label for="search">Pesquisar</label>
                <i class="material-icons prefix">search</i>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </li>
  <li class="collection-item" id="table-rent">

  </li>
  <div id="modal1" class="modal modal-fixed-footer">
      <div class="modal-content">
        <h4 id="modalTitle"></h4>
        <div class="row">
          <form class="col s12">
            <div class="row">
                <input id="rentId" type="hidden">
              <div class="input-field col s12">
                <select id="book_id">
                  <?php include "books_list.php";?>
                </select>
                <label>Livro</label>
              </div>
            </div>
            <div class="row">
                <input id="rentId" type="hidden">
              <div class="input-field col s12">
                <select id="user_id">
                  <?php include "users_list.php";?>
                </select>
                <label>Usuário</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                  <input id="pick_date" type="date" class="validate">
                <label for="pick_date">Data de aluguel</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input id="exp_date" type="date" class="validate">
                <label for="exp_date">Previsão de devolução</label>
                <input id="rentId" type="hidden">
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" name="button" id="create-rent" class="waves-effect waves-light green btn">Salvar</button>
        <button type="button" name="button" class="waves-effect waves-light red btn" onclick="$('#modal1').modal('close')">Fechar</button>
      </div>
    </div>
</ul>

<script type="text/javascript">
$(document).ready(function() {
  $('select').formSelect();
  $('#table-rent').load('pages/rent/RentController.php?action=all');

  $('#table-rent').load('pages/rent/RentController.php?action=all');
  $("#create-rent").click(function() {
    if($('#rentId').val().length == 0) {
      saveRent();
    } else {
      updateRent();
    }
  });

  $('#search').keyup(function() {
    $.ajax({
      type: 'GET',
      url: 'pages/rent/RentController.php?action=search',
      data: {
        field: $('#search').val()
      },
      success: function(result) {
        $('#table-rent').empty();
        $('#table-rent').append(result);
      }
    });
  });

});

 function saveRent() {
   $.ajax({
     type: "POST",
     url: "pages/rent/RentController.php?action=insert",
     data: {
       book_id: $('#book_id').val(),
       user_id: $('#user_id').val(),
       pick_date: $('#pick_date').val(),
       exp_date: $('#exp_date').val()
     },
     success: function(message) {
       $('#modal1').modal('close');
       $('#table-rent').load('pages/rent/RentController.php?action=all');
     }
   })
 }

 function openRentModal() {
   $("#rentId").val('');
   $('#modalTitle').empty();
   $('#modalTitle').append('Cadastrar aluguel');
   $("input[type='text']").val('');
   $('#modal1').modal('open');
 }

 function updateRent() {
   $.ajax({
     type: "POST",
     url: "pages/rent/RentController.php?action=update",
     data: {
       book_id: $('#book_id').val(),
       user_id: $('#user_id').val(),
       pick_date: $('#pick_date').val(),
       exp_date: $('#exp_date').val(),
       id: $('#rentId').val()
     },
     success: function(message) {
       $('#modal1').modal('close');
       $('#table-rent').load('pages/rent/RentController.php?action=all');
     }
   })
 }

 function turnBack(id) {
   var date = new Date();
   $.ajax({
     type: "POST",
     url: "pages/rent/RentController.php?action=update",
     data: {
       returned: date.getFullYear() + "-" + date.getMonth() + "-" + date.getDay(),
       id: id
     },
     success: function(e) {
        M.toast({html: 'Devolvido'})
        $('#table-rent').load('pages/rent/RentController.php?action=all');
     }
   });
 }

 function displayRent(id) {
   $.ajax({
     type: "POST",
     url: "pages/rent/RentController.php?action=find",
     data: {
       id: id
     },
     success: function(data) {
       const result = JSON.parse(data);

       $('#modalTitle').empty();
       $('#modalTitle').append('Editar aluguel');

       $('#book_id').val(result.book_id);
       $('#user_id').val(result.user_id);
       $('#pick_date').val(result.pick_date);
       $('#exp_date').val(result.exp_date);
       $("#rentId").val(result.id);
       M.updateTextFields();
       $('select').formSelect();
       $('#modal1').modal('open');
     }
   });
 }
</script>
