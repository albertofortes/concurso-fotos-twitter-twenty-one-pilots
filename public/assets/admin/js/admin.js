$(function() {

  /**
  * Modal to remove user
  */
  $(document).on("click", ".open-remove-user-dialog", function () {
     var id = $(this).data('id');
     $("#removeUserButton").attr( 'href', '/delete/' . id );
     $("#removeActions").prepend("<a href='/admin/users/delete/" + id + "' class='btn btn-danger'>Eliminar</a>");
  });

  /**
  * Modal to remove contestant
  */
  $(document).on("click", ".open-remove-contestant-dialog", function () {
     var id = $(this).data('id');
     $("#removeActions").prepend("<a href='/admin/contestants/delete/" + id + "' class='btn btn-danger'>Eliminar</a>");
  });

  /**
  * Modal ver ticket de compra del concursante
  */
  $(document).on("click", ".open-see-contestant-ticket", function () {
     var ticketSrc = $(this).data('ticketsrc');
     $("#ticketImg").prepend("<img src='" + ticketSrc + "' style='width: 100%;' />");
  });

  /**
   *  masonry
   */
  $('.masonry-grid').masonry({
    itemSelector: '.grid-item',
    percentPosition: true,
    gutter: '.gutter-sizer'
  });

});
