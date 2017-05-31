$(document).ready(function(){
  $('html').on('drag dragstart dragend dragover dragenter dragleave drop',function(e) {
    e.preventDefault();
    e.stopPropagation();
  })

  $('#photo2Box').on('dragover',function(e) {
    $('#photo2Box').addClass("file-dragOver-green");
  })

  $('#photo2Box').on('dragend dragleave',function(e) {
    $('#photo2Box').removeClass("file-dragOver-green");
  })

  $('#photo2Box').on('drop',function(e) {
    $('#photo2Box').removeClass("file-dragOver-green");
    console.log(e.originalEvent.dataTransfer.files);
    $('#photo2').prop('files',e.originalEvent.dataTransfer.files);
    photo2PreviewFile();
  })

})

function photo2PreviewFile() {
  var preview = document.querySelector('#photo2Preview');
  var file    = document.querySelector('#photo2').files[0];
  var reader  = new FileReader();

  reader.onloadend = function () {
    preview.src = reader.result;
  }

  if (file) {
    document.querySelector('#photo2Preview').style.display='block';
    document.querySelector('#labelphoto2').style.display='block';
    $('#photo2Button').hide();
    reader.readAsDataURL(file);
  } else {
    document.querySelector('#photo2Preview').style.display='none';
    document.querySelector('#labelphoto2').style.display='none';
    $('#photo2Button').show();
    preview.src = "";
  }
}
