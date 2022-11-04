$(document).ready(function () {
  $(".fancybox").fancybox({
    openEffect: "none",
    closeEffect: "none",
  });

  $(".zoom").hover(
    function () {
      $(this).addClass("transition");
    },
    function () {
      $(this).removeClass("transition");
    }
  );
});
load_images();

$("#upload_fotos").submit(function (e) {
  e.preventDefault();
  $.ajax({
    url: "processos/CXAMZ001GRAV.php",
    method: "POST",
    processData: false,
    contentType: false,
    cache: false,
    data: new FormData(this),
    success: function (response) {
      $("#result").html("Status: " + response);
       load_images();
    },
  });
});
function delete_images() {
  var file = $(".file").attr("id");

  $.ajax({
    url: "processos/CXAMZ001DEL.php",
    method: "POST",
    data: {file:file},
    success: function (response) {
      alert(response);
    //  window.location.reload();
      return false;
    },
   
  });
  return false;
}
function load_images() {
  $.ajax({
    url: "processos/CXAMZ001LOAD.php",
    method: "get",
    success: function (data) {
      $("#images_preview").html(data);
      magnific();
    },
  });
}
function magnific() {
  
    $(".parent-container").magnificPopup({
      
      delegate: ".fancybox",
      type: "image",
      tLoading: "Loading image ...",
      gallery: { enabled: true },
      
   
    
  });
}
