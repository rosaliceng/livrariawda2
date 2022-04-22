<ul class="collection">
  <li class="collection-item">
    <div class="row">
      <div class="col s1">
        <p style="font-size:20px">Editora</p>
      </div>
      <div class="col s3">
        <div class="row">
          <div class="col s12">
            <a class="waves-effect waves-light btn blue darken-1" style="margin-top:14px" onclick="openCompanyModal()">
              <i class="material-icons right">add</i>Nova
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
  <li class="collection-item" id="table-company">

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
                <input id="companyId" type="hidden">
              </div>
            </div>
            </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" name="button" id="create-company" class="waves-effect waves-light green btn">Salvar</button>
        <button type="button" name="button" class="waves-effect waves-light red btn" onclick="$('#modal1').modal('close')">Fechar</button>
      </div>
    </div>
</ul>
    <script type="text/javascript">
    $(document).ready(function() {
      $('#table-company').load('pages/company/CompanyController.php?action=all');

      $("#create-company").click(function() {
        if($('#companyId').val().length == 0) {
          saveCompany();
        } else {
          updateCompany();
        }
      });

      $('#search').keyup(function() {
        $.ajax({
          type: 'GET',
          url: 'pages/company/CompanyController.php?action=search',
          data: {
            field: $('#search').val()
          },
          success: function(result) {
            $('#table-company').empty();
            $('#table-company').append(result);
          }
        });
      });

    });

     function saveCompany() {
       $.ajax({
         type: "POST",
         url: "pages/company/CompanyController.php?action=insert",
         data: {
           name: $('#username').val(),
           city: $('#city').val(),
         },
         success: function(message) {
           $('#modal1').modal('close');
           $('#table-company').load('pages/company/CompanyController.php?action=all');
         }
       })
     }

     function openCompanyModal() {
       $("#companyId").val('');
       $('#modalTitle').empty();
       $('#modalTitle').append('Cadastrar editora');
       $("input[type='text']").val('');
       $('#modal1').modal('open');
     }

     function updateCompany() {
       $.ajax({
         type: "POST",
         url: "pages/company/CompanyController.php?action=update",
         data: {
           name: $('#username').val(),
           city: $('#city').val(),
           id: $('#companyId').val()
         },
         success: function(message) {
           $('#modal1').modal('close');
           $('#table-company').load('pages/company/CompanyController.php?action=all');
         }
       })
     }

     function deleteCompany(id) {
       $.ajax({
         type: "POST",
         url: "pages/company/CompanyController.php?action=delete",
         data: {
           avaible: 0,
           id: id
         },
         success: function(e) {
            M.toast({html: 'Deletado'})
            $('#table-company').load('pages/company/CompanyController.php?action=all');
         }
       });
     }

     function displayCompany(id) {
       $.ajax({
         type: "POST",
         url: "pages/company/CompanyController.php?action=find",
         data: {
           id: id
         },
         success: function(data) {
           const result = JSON.parse(data);

           $('#modalTitle').empty();
           $('#modalTitle').append('Editar editora');

           $('#username').val(result.name);
           $('#city').val(result.city);
           $("#companyId").val(result.id);
           M.updateTextFields();
           $('#modal1').modal('open');
         }
       });
     }
    </script>
