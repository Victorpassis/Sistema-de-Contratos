$(function() {
   $('.cadastro').submit(function(ev) {
      ev.preventDefault();
      var formData = $('.cadastro').serialize();

      $('.btn-cadastro').attr('disabled','disabled').css('cursor', 'wait');
      $('.icon-load').show();

      $.ajax({
         type: 'POST',
         url: $('.cadastro').attr('action'),
         data: formData
      })
      .done(function(response) {
         var result = JSON.parse(response);

         $('.cadastro')[0].reset();

         $(".alerta-cadastro").addClass(result.alert);
         $(".alerta-cadastro").append(result.msg);
         $(".alerta-cadastro").fadeIn();

         $('.btn-cadastro').removeAttr('disabled','disabled').css('cursor', 'pointer');
         $('.icon-load').hide();
      })
      .fail(function(data) {
         $(".teste").html(data);
         $('.btn-cadastro').removeAttr('disabled','disabled').css('cursor', 'pointer');
         $('.icon-load').hide();
      });
   });
   $('.excluir').on('click',function(ev) {
      ev.preventDefault();

      var formData = $(this).attr('data-fucao');

      $.ajax({
         type: 'POST',
         url: $(this).attr('href'),
         data: formData
      })
      .done(function(response) {
         window.location.reload();
      });
   });


   //Contratos
   $('.clienteContrato').on('change',function(ev) {
      var formData = "id=" + $(this).val() + "&function=listarCliente";

      $.ajax({
         type: 'POST',
         url: 'view/php/novo-cliente.php',
         data: formData
      })
      .done(function(response) {
         var cliente = JSON.parse(response);

         $('.cpf-cnpf').val(cliente.dados);
         $('.cidade').val(cliente.cidade);
         $('.cep').val(cliente.cep);
         $('.estado').val(cliente.estado);
         $('.endereco').val(cliente.endereco);
         $('.numero').val(cliente.numero);
         $('.bairro').val(cliente.bairro);
      });
   });
   $('#listaproduto').multiSelect({
      afterSelect: function(values){
         var formData = "id=" + values + "&function=listarProduto";

         $.ajax({
            type: 'POST',
            url: 'view/php/novo-produto.php',
            data: formData
         })
         .done(function(response) {
            var produto = JSON.parse(response);

            $('.descricao').html(produto.descricao);
         });
      },
      afterDeselect: function(values){
         $('.valor').val('');
         $('.descricao').html('');
      }
   });
});
