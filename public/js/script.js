$(document).ready(function() {
  // LOADER
  $(window).on("load", function() {
    $("#mdb-preloader").fadeOut("slow");
  });

  //DATA TABLES
  $("#tolong").DataTable();

  // TOOLTIPS
  $("[data-toggle=tooltip]").tooltip();

  //INPUT GAMBAR FIX LABEL
  $(".custom-file-input").on("change", function() {
    let filename = $(this)
      .val()
      .split("\\")
      .pop();
    $(this)
      .next(".custom-file-label")
      .addClass("selected")
      .html(filename);
  });

  // MASK UANG
  $(".uang").mask("0.000.000.000", { reverse: true });
  // MASK NO TELP
  $(".telp").mask("0000-0000-00000");

  // JARALLAX
  // object-fit polyfill run
  objectFitImages();

  /* init Jarallax */
  jarallax(document.querySelectorAll(".jarallax"));

  jarallax(document.querySelectorAll(".jarallax-keep-img"), {
    keepImg: true
  });

  // MATERIAL SELECT
  $(".mdb-select").material_select();
});
