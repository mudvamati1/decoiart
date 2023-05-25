$(document).ready(function(){  
    $('#regionesEdit').on('change', function(){
      var id = $('#regionesEdit').val()
      $.ajax({
        url: ('cargar_comunaEdit.php'),
        method: 'POST',
        data: {'id': id}
      })
      .done(function(comunaEdit){
        $('#comunaEdit').html(comunaEdit)
      })
      .fail(function(){
        alert('Hubo un error al cargar las comunas')
      });
    });
  });