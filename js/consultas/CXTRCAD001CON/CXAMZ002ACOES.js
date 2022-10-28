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
    //   load_images();
    },
  });
});
function delete_images() {
  var file = $(this).attr("href");

  $.ajax({
    url: "processos/CXAMZ001DEL.php",
    method: "POST",
    data: file,
    success: function (response) {
      console.log(response);
      window.location.reload();
    },
  });
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
  $(".parent-container .fancybox").click(function (e) {
    var file = $(this).attr("href");

    $(".parent-container").magnificPopup({
      delegate: ".fancybox",
      type: "image",
      image: {
        markup:
        '<div class="mfp-figure">' +
        '<div class="mfp-close"></div>' +
        '<div class="mfp-img"></div>' +
        '<div class="mfp-bottom-bar" style="text-align:center;">' +
        '<div class="mfp-title"></div>' +
        '<div class="mfp-counter"></div>' +       
        "</div>" +
        "</div>",
      },
      tLoading: "Loading image ...",
      gallery: { enabled: true },
    });
  });
}
