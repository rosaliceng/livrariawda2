<ul class="collection">
  <li class="collection-item">
    <div class="row">
      <div class="col s1">
        <p style="font-size:20px">Usuários</p>
      </div>
      <div class="col s3">
        <div class="row">
          <div class="col s12">
            <a class="waves-effect waves-light btn blue darken-1" style="margin-top:14px" onclick="openUserModal()">
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
  <li class="collection-item" id="table-users">

  </li>
  <div id="modal1" class="modal modal-fixed-footer">
      <div class="modal-content">
        <h4 id="modalTitle"></h4>
        <div class="row">
          <form class="col s12">
            <div class="row">
              <div class="input-field col s12">
                <input id="username" type="text" class="validate">
                <label for="username">Nome</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input id="city" type="text" class="validate">
                <label for="city">Cidade</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input id="address" type="text" class="validate">
                <label for="address">Endereço</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input id="email" type="text" class="validate">
                <label for="email">Email</label>
                <input id="userId" type="hidden">
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" name="button" id="create-user" class="waves-effect waves-light green btn">Salvar</button>
        <button type="button" name="button" class="waves-effect waves-light red btn" onclick="$('#modal1').modal('close')">Fechar</button>
      </div>
    </div>
</ul>

<script type="text/javascript">
$(document).ready(function() {
  $('#table-users').load('pages/users/UserController.php?action=all');

  $("#create-user").click(function() {
    if($('#userId').val().length == 0) {
      saveUser();
    } else {
      updateUser();
    }
  });

  $('#search').keyup(function() {
    $.ajax({
      type: 'GET',
      url: 'pages/users/UserController.php?action=search',
      data: {
        field: $('#search').val()
      },
      success: function(result) {
        $('#table-users').empty();
        $('#table-users').append(result);
      }
    });
  });

});

 function saveUser() {
   $.ajax({
     type: "POST",
     url: "pages/users/UserController.php?action=insert",
     data: {
       name: $('#username').val(),
       address: $('#address').val(),
       city: $('#city').val(),
       email: $('#email').val()
     },
     success: function(message) {
       $('#modal1').modal('close');
       location.reload();
     }
   })
 }

 function openUserModal() {
   $("#userId").val('');
   $('#modalTitle').empty();
   $('#modalTitle').append('Cadastrar usuário');
   $("input[type='text']").val('');
   $('#modal1').modal('open');
 }

 function updateUser() {
   $.ajax({
     type: "POST",
     url: "pages/users/UserController.php?action=update",
     data: {
       name: $('#username').val(),
       address: $('#address').val(),
       city: $('#city').val(),
       email: $('#email').val(),
       id: $('#userId').val()
     },
     success: function(message) {
       $('#modal1').modal('close');
       location.reload();
     }
   })
 }

 function deleteUser(id) {
   $.ajax({
     type: "POST",
     url: "pages/users/UserController.php?action=delete",
     data: {
       status: 0,
       id: id
     },
     success: function(e) {
        alert("Deletado");
        location.reload();
     }
   });
 }

 function displayUser(id) {
   $.ajax({
     type: "POST",
     url: "pages/users/UserController.php?action=find",
     data: {
       id: id
     },
     success: function(data) {
       const result = JSON.parse(data);

       $('#modalTitle').empty();
       $('#modalTitle').append('Editar usuário');

       $('#username').val(result.name);
       $('#city').val(result.city);
       $('#address').val(result.address);
       $('#email').val(result.email);
       $("#userId").val(result.id);
       M.updateTextFields();
       $('#modal1').modal('open');
     }
   });
 }
</script>
