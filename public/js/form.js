$(document).ready(function() {
   if ($('#datepub').length>0) {
      $('#datepub').datepicker({
          format: 'dd-mm-yyyy',
          startDate: 'd'
      });
   }
   if ($('#birthday').length>0) {
   $('#birthday').datepicker({
       format: 'dd-mm-yyyy',
       endDate: '-18y'
   });
   }
   if ($('#biographie').length>0) {
   $('#biographie').wysihtml5();
   }
   // var selector = $("#phone");
   // var im = new Inputmask('99-99-99-99-99');
   // im.mask(selector);
   if ($('#url').length>0) {
   $("#url").fileinput({
      overwriteInitial: true,
      maxFileSize: 1500,
      showUpload: false,
      showClose: false,
      showCaption: false,
      browseLabel: '',
      removeLabel: '',
      browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
      removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
      removeTitle: 'Cancel or reset changes',
      elErrorContainer: '#kv-avatar-errors-1',
      msgErrorClass: 'alert alert-block alert-danger',
      defaultPreviewContent: '<img src="'+$("#url").attr('data-url')+'" alt="Your Avatar" class="imagePreview">',
   });
}

});
