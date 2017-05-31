$(document).ready(function(){
  $('html').on('drag dragstart dragend dragover dragenter dragleave drop',function(e) {
    e.preventDefault();
    e.stopPropagation();
  })

  $('#photo4Box').on('dragover',function(e) {
    $('#photo4Box').addClass("file-dragOver-green");
  })

  $('#photo4Box').on('dragend dragleave',function(e) {
    $('#photo4Box').removeClass("file-dragOver-green");
  })

  $('#photo4Box').on('drop',function(e) {
    $('#photo4Box').removeClass("file-dragOver-green");
    console.log(e.originalEvent.dataTransfer.files);
    $('#photo4').prop('files',e.originalEvent.dataTransfer.files);
    photo4PreviewFile();
  })

})

function photo4PreviewFile() {
  var preview = document.querySelector('#photo4Preview');
  var file    = document.querySelector('#photo4').files[0];
  var reader  = new FileReader();

  reader.onloadend = function () {
    preview.src = reader.result;
  }

  if (file) {
    document.querySelector('#photo4Preview').style.display='block';
    document.querySelector('#labelphoto4').style.display='block';
    $('#photo4Button').hide();
    reader.readAsDataURL(file);
  } else {
    document.querySelector('#photo4Preview').style.display='none';
    document.querySelector('#labelphoto4').style.display='none';
    $('#photo4Button').show();
    preview.src = "";
  }
}
