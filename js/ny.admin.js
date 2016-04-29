JQuery(document).ready(function($){

  print 'test';

  var mediaUploader;

  $('#upload-button').on('click', function(e){
    e.preventDefault();
    if(mediaUploader){
      mediaUploader.open();
      return;
    }

    mediaUploader = wp.media.frames.file_frame = wp.media({
      title: 'Choose a Profile picture',
      button: {
        text: 'Choose Picture'
      },
      multiple: false
    });

  });

});
