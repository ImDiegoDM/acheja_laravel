$(document).ready(function(){
  $('html').on('drag dragstart dragend dragover dragenter dragleave drop',function(e) {
    e.preventDefault();
    e.stopPropagation();
  })

  $('#photo1Box').on('dragover',function(e) {
    $('#photo1Box').addClass("file-dragOver-green");
  })

  $('#photo1Box').on('dragend dragleave',function(e) {
    $('#photo1Box').removeClass("file-dragOver-green");
  })

  $('#photo1Box').on('drop',function(e) {
    $('#photo1Box').removeClass("file-dragOver-green");
    console.log(e.originalEvent.dataTransfer.files);
    $('#photo1').prop('files',e.originalEvent.dataTransfer.files);
    photo1PreviewFile();
  })

})

function photo1PreviewFile() {
  var preview = document.querySelector('#photo1Preview');
  var file    = document.querySelector('#photo1').files[0];
  var reader  = new FileReader();

  reader.onloadend = function () {
    preview.src = reader.result;
  }

  if (file) {
    document.querySelector('#photo1Preview').style.display='block';
    document.querySelector('#labelphoto1').style.display='block';
    $('#photo1Button').hide();
    reader.readAsDataURL(file);
  } else {
    document.querySelector('#photo1Preview').style.display='none';
    document.querySelector('#labelphoto1').style.display='none';
    $('#photo1Button').show();
    preview.src = "";
  }
}
