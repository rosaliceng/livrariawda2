<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
<br>
<div class="row">
  <div class="col s3"></div>
  <div class="col s6" style="padding: 10px; border: solid 2px #29b6f6; border-radius: 8px;box-shadow: 3px 3px #e0e0e0">
    <div id="lastRent"></div>
  </div>
</div>
<div class="row">
  <div class="col s3"></div>
  <div class="col s6" style="padding: 10px; border: solid 2px #29b6f6; border-radius: 8px;box-shadow: 3px 3px #e0e0e0">
    <div id="topRent" style="width:100%;max-width:500px"></div>
  </div>
</div>


<script type="text/javascript">
$.ajax({
  type: 'GET',
  url: "pages/rent/RentController.php?action=topRent",
  success: function(data) {
    var result = JSON.parse(data);
    var x = result.topRent.map(item => item.book);
    var y = result.topRent.map(item => item.quantity);

    var data = [{
      x:x,
      y:y,
      type:"bar"
    }];

    var layout = {title:"Livros"};

    Plotly.newPlot("topRent", data, layout);
    $('#lastRent').append('<center><h6>Último livro alugado:</h6><h4 style="font-size: 29px">'+result.lastRent.book+"</h4></center>");
  }
});
</script>
