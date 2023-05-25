$(document).ready(function(){
    $.ajax({
     url: ('cargar_region.php'),
    method: 'POST'
     
    })
    .done(function(regiones){
      $('#region').html(regiones)
    })
    .fail(function(){
      alert('Hubo un errror al cargar las regiones')
    })
  
    $('#region').on('change', function(){
      var id = $('#region').val()
      $.ajax({
        url: ('cargar_comuna.php'),
        method: 'POST',
        data: {'id': id}
      })
      .done(function(regiones){
        $('#comuna').html(regiones)
      })
      .fail(function(){
        alert('Hubo un errror al cargar las comunas')
      });
    });
  });