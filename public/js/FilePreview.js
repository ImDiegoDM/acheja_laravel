$(document).ready(function(){
  $('html').on('drag dragstart dragend dragover dragenter dragleave drop',function(e) {
    e.preventDefault();
    e.stopPropagation();
  })

  $('#logoBox').on('dragover',function(e) {
    $('#logoBox').addClass("file-dragOver");
  })

  $('#logoBox').on('dragend dragleave',function(e) {
    $('#logoBox').removeClass("file-dragOver");
  })
  
  $('#logoBox').on('drop',function(e) {
    $('#logoBox').removeClass("file-dragOver");
    console.log(e.originalEvent.dataTransfer.files);
    $('#logo').prop('files',e.originalEvent.dataTransfer.files);
    logoPreviewFile();
  })

})

function logoPreviewFile() {
  var preview = document.querySelector('#logoPreview');
  var file    = document.querySelector('#logo').files[0];
  var reader  = new FileReader();

  reader.onloadend = function () {
    preview.src = reader.result;
  }

  if (file) {
    document.querySelector('#logoPreview').style.display='block';
    document.querySelector('#labelLogo').style.display='block';
    $('#logoButton').hide();
    reader.readAsDataURL(file);
  } else {
    document.querySelector('#logoPreview').style.display='none';
    document.querySelector('#labelLogo').style.display='none';
    $('#logoButton').show();
    preview.src = "";
  }
}
