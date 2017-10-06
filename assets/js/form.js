$(function() {
   $('#confirmar').on('click',function(ev) {
      ev.preventDefault();

      $.ajax({
         url: $(this).attr('data-Confirm')
      })
      .done(function(response) {
         window.location.reload();
      });
   });
});
