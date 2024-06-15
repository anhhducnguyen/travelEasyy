(function($) {
  'use strict';
  $(function() {
      $('.file-upload-browse').on('click', function() {
          var file = $(this).parent().parent().parent().find('.file-upload-default');
          file.trigger('click');
      });
      $('.file-upload-default').on('change', function() {
          var input = $(this).parent().find('.form-control');
          var fileName = $(this).val().replace(/C:\\fakepath\\/i, '');
          input.val(fileName);

          // Update the image preview
          var reader = new FileReader();
          reader.onload = function(e) {
              $('#imgPrev').attr('src', e.target.result).show();
          };
          reader.readAsDataURL(this.files[0]);

          // Update the hidden input with the full path
          var pathInput = $('#imagePath');
          pathInput.val('assets/images/' + fileName);
      });
  });
})(jQuery);