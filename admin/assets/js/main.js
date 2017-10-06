(function($) {
   "use strict"; // Start of use strict

   // Configure tooltips for collapsed side navigation
   $('.navbar-sidenav [data-toggle="tooltip"]').tooltip({
      template: '<div class="tooltip navbar-sidenav-tooltip" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
   })

   // Toggle the side navigation
   $("#sidenavToggler").click(function(e) {
      e.preventDefault();
      $("body").toggleClass("sidenav-toggled");
      $(".navbar-sidenav .nav-link-collapse").addClass("collapsed");
      $(".navbar-sidenav .sidenav-second-level, .navbar-sidenav .sidenav-third-level").removeClass("show");
   });
   // Force the toggled class to be removed when a collapsible nav link is clicked
   $(".navbar-sidenav .nav-link-collapse").click(function(e) {
      e.preventDefault();
      $("body").removeClass("sidenav-toggled");
   });

   // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
   $('body.fixed-nav .navbar-sidenav, body.fixed-nav .sidenav-toggler, body.fixed-nav .navbar-collapse').on('mousewheel DOMMouseScroll', function(e) {
      var e0 = e.originalEvent,
      delta = e0.wheelDelta || -e0.detail;
      this.scrollTop += (delta < 0 ? 1 : -1) * 30;
      e.preventDefault();
   });

   // Scroll to top button appear
   $(document).scroll(function() {
      var scrollDistance = $(this).scrollTop();
      if (scrollDistance > 100) {
         $('.scroll-to-top').fadeIn();
      } else {
         $('.scroll-to-top').fadeOut();
      }
   });

  // Configure tooltips globally
  $('[data-toggle="tooltip"]').tooltip()

  // Smooth scrolling using jQuery easing
   $(document).on('click', 'a.scroll-to-top', function(event) {
      var $anchor = $(this);
      $('html, body').stop().animate({ scrollTop: ($($anchor.attr('href')).offset().top) }, 1000, 'easeInOutExpo');
      event.preventDefault();
   });
   // Call the dataTables jQuery plugin
   $(document).ready(function() {
      $('#dataTable').DataTable({
         "language": {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar",
            "oPaginate": {
               "sNext": "Próximo",
               "sPrevious": "Anterior",
               "sFirst": "Primeiro",
               "sLast": "Último"
            },
            "oAria": {
               "sSortAscending": ": Ordenar colunas de forma ascendente",
               "sSortDescending": ": Ordenar colunas de forma descendente"
            }
         }
      });
   });
})(jQuery); // End of use strict

$(document).ready(function(){
   //Mascaras Inputs
   $('.cep').mask('00000-000', {placeholder: "_____-___"});
   $('.money').mask('000.000.000.000.000,00', {reverse: true});

   $('.cpf').mask('000.000.000-00', {reverse: true});
   $('.cnpj').mask('00.000.000/0000-00', {reverse: true});

   $('.cpf-cnpj').on('click', function() {
      $('.cpf-cnpj').removeClass("active");
      $(this).addClass("active");

      $('.btn-dados').html($(this).text());

      if($('.btn-dados').text() == 'CPF') {
         $('.cnpj-cpf').removeClass("cnpj");
         $('.cnpj-cpf').addClass("cpf");

         $('.cpf').mask('000.000.000-00', {reverse: true});
      } else if($('.btn-dados').text() == 'CNPJ') {
         $('.cnpj-cpf').removeClass("cpf");
         $('.cnpj-cpf').addClass("cnpj");

         $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
      }
   });
});
