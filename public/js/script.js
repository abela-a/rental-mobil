$(document).ready(function() {
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
});