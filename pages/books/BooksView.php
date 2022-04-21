<ul class="collection">
  <li class="collection-item">
    <div class="row">
      <div class="col s1">
        <p style="font-size:20px">Livros</p>
      </div>
      <div class="col s3">
        <div class="row">
          <div class="col s12">
            <a class="waves-effect waves-light btn blue darken-1" style="margin-top:14px" onclick="openBookModal()">
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
  <li class="collection-item" id="table-books">

  </li>
  <div id="modal1" class="modal modal-fixed-footer">
      <div class="modal-content">
        <h4 id="modalTitle"></h4>
        <div class="row">
          <form class="col s12">
            <div class="row">
              <div class="input-field col s12">
                <input id="name" type="text" class="validate">
                <label for="name">Nome</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input id="author" type="text" class="validate">
                <label for="author">Autor</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input id="launch" type="date" class="validate">
                <label for="launch">Lançamento</label>
              </div>
            </div>
            <div class="row">
                <input id="bookId" type="hidden">
              <div class="input-field col s12">
                <select id="company_id">
                  <?php include "companies_list.php";?>
                </select>
                <label>Editora</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input id="quantity" type="text" class="validate">
                <label for="quantity">Quantidade</label>
                <input id="bookId" type="hidden">
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" name="button" id="create-book" class="waves-effect waves-light green btn">Salvar</button>
        <button type="button" name="button" class="waves-effect waves-light red btn" onclick="$('#modal1').modal('close')">Fechar</button>
      </div>
    </div>
</ul>

<script type="text/javascript">
$(document).ready(function() {
  $('select').formSelect();
  $('#table-books').load('pages/books/BooksController.php?action=all');

  $("#create-book").click(function() {
    if($('#bookId').val().length == 0) {
      saveBook();
    } else {
      updateBook();
    }
  });

  $('#search').keyup(function() {
    $.ajax({
      type: 'GET',
      url: 'pages/books/BooksController.php?action=search',
      data: {
        field: $('#search').val()
      },
      success: function(result) {
        $('#table-books').empty();
        $('#table-books').append(result);
      }
    });
  });

});

 function saveBook() {
   $.ajax({
     type: "POST",
     url: "pages/books/BooksController.php?action=insert",
     data: {
       name: $('#name').val(),
       author: $('#author').val(),
       launch: $('#launch').val(),
       quantity: $('#quantity').val(),
       company_id: $('#company_id').val()
     },
     success: function(message) {
       $('#modal1').modal('close');
       $('#table-books').load('pages/books/BooksController.php?action=all');
       M.toast({html: 'Livro adicionado!'})
     }
   })
 }

 function openBookModal() {
   $("#bookId").val('');
   $('#modalTitle').empty();
   $('#modalTitle').append('Cadastrar livro');
   $("input[type='text']").val('');
   $('#company_id').val('');
   $('select').formSelect();
   $('#modal1').modal('open');
 }

 function updateBook() {
   $.ajax({
     type: "POST",
     url: "pages/books/BooksController.php?action=update",
     data: {
       name: $('#name').val(),
       author: $('#author').val(),
       launch: $('#launch').val(),
       quantity: $('#quantity').val(),
       company_id: $('#company_id').val(),
       id: $('#bookId').val()
     },
     success: function(message) {
       $('#modal1').modal('close');
       $('#table-books').load('pages/books/BooksController.php?action=all');
       M.toast({html: 'Livro atualizado!'})
     }
   })
 }

 function deleteBooks(id) {
   $.ajax({
     type: "POST",
     url: "pages/books/BooksController.php?action=delete",
     data: {
       status: 0,
       id: id
     },
     success: function(e) {
       $('#table-books').load('pages/books/BooksController.php?action=all');
        M.toast({html: 'Livro removido!'});
     }
   });
 }

 function displayBooks(id) {
   $.ajax({
     type: "POST",
     url: "pages/books/BooksController.php?action=find",
     data: {
       id: id
     },
     success: function(data) {
       const result = JSON.parse(data);

       $('#modalTitle').empty();
       $('#modalTitle').append('Editar livro');

       $('#name').val(result.name);
       $('#author').val(result.author);
       $('#launch').val(result.launch);
       $('#company_id').val(result.company_id);
       $('#quantity').val(result.quantity);
       $("#bookId").val(result.id);
       M.updateTextFields();
       $('select').formSelect();
       $('#modal1').modal('open');
     }
   });
 }
</script>
