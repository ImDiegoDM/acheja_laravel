Dropzone.autoDiscover = false;

var process = function () {
  console.log('submited');
}

$(document).ready(function(){
  var previewNode = document.querySelector("#template");
  previewNode.id = "";
  var previewTemplate = previewNode.parentNode.innerHTML;
  previewNode.parentNode.removeChild(previewNode);

  var token = $('input[name="_token"]').val();
  console.log(token);

  var dzOptions={
    url: "./file",
    autoProcessQueue: false,
    paramName:"logo",
    thumbnailWidth: 150,
    thumbnailHeight: 150,
    headers : {"X-CSRF-TOKEN": token},
    previewTemplate: previewTemplate,
    clickable: "#fileinput-button",
    init: function() {
      this.on("addedfile", function() {
        if (this.files[1]!=null){
          this.removeFile(this.files[0]);
        }
      });
      this.on("thumbnail", function(file, dataUrl) {
            $('.preview').last().find('img').attr({width: '100%', height: '100%'});
            console.log(file);
        }),
        this.on("success", function(file) {
            $('.preview').css({"width":"100%", "height":"auto"});
            console.log(file);
        })
    },
    success: function(file, response){
      console.log(response);
    },
  };

  var dzLogo = new Dropzone("div#my-awesome-dropzone",dzOptions);
  dzOptions.clickable="#photo_1-button";
  var dzPhoto_1 = new Dropzone("div#photo_1",dzOptions);
  dzOptions.clickable="#photo_2-button";
  var dzPhoto_2 = new Dropzone("div#photo_2",dzOptions);
  dzOptions.clickable="#photo_3-button";
  var dzPhoto_3 = new Dropzone("div#photo_3",dzOptions);
  dzOptions.clickable="#photo_4-button";
  var dzPhoto_4 = new Dropzone("div#photo_4",dzOptions);

  dzLogo.on("addedfile", function(file) {
    // Hookup the start button
    $("#fileinput-button").hide();
  });

  dzPhoto_1.on("addedfile", function(file) {
    // Hookup the start button
    $("#photo_1-button").hide();
  });

  dzPhoto_2.on("addedfile", function(file) {
    // Hookup the start button
    $("#photo_2-button").hide();
  });

  dzPhoto_3.on("addedfile", function(file) {
    // Hookup the start button
    $("#photo_3-button").hide();
  });

  dzPhoto_4.on("addedfile", function(file) {
    // Hookup the start button
    $("#photo_4-button").hide();
  });


});
