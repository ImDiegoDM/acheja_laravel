$(document).ready(function(){
  $('html').on('drag dragstart dragend dragover dragenter dragleave drop',function(e) {
    e.preventDefault();
    e.stopPropagation();
  })

  $('#photo3Box').on('dragover',function(e) {
    $('#photo3Box').addClass("file-dragOver-green");
  })

  $('#photo3Box').on('dragend dragleave',function(e) {
    $('#photo3Box').removeClass("file-dragOver-green");
  })

  $('#photo3Box').on('drop',function(e) {
    $('#photo3Box').removeClass("file-dragOver-green");
    console.log(e.originalEvent.dataTransfer.files);
    $('#photo3').prop('files',e.originalEvent.dataTransfer.files);
    photo3PreviewFile();
  })

})

function photo3PreviewFile() {
  var preview = document.querySelector('#photo3Preview');
  var file    = document.querySelector('#photo3').files[0];
  var reader  = new FileReader();

  reader.onloadend = function () {
    preview.src = reader.result;
  }

  if (file) {
    document.querySelector('#photo3Preview').style.display='block';
    document.querySelector('#labelphoto3').style.display='block';
    $('#photo3Button').hide();
    reader.readAsDataURL(file);
  } else {
    document.querySelector('#photo3Preview').style.display='none';
    document.querySelector('#labelphoto3').style.display='none';
    $('#photo3Button').show();
    preview.src = "";
  }
}
