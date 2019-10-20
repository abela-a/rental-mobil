$(document).ready(function() {
  // LOADER
  $(window).on("load", function() {
    $("#mdb-preloader").fadeOut("slow");
  });

  //DATA TABLES
  $("#tolong").DataTable();
  $("select[name='tolong_length']").addClass("d-inline");

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
  objectFitImages();
  jarallax(document.querySelectorAll(".jarallax"));
  jarallax(document.querySelectorAll(".jarallax-keep-img"), {
    keepImg: true
  });

  // SHOWHIDEPASS
  $("#showhidepass a").on("click", function(event) {
    event.preventDefault();
    if ($("#showhidepass input").attr("type") == "text") {
      $("#showhidepass input").attr("type", "Password");
      $("#showhidepass i").addClass("fa-eye");
      $("#showhidepass i").removeClass("fa-eye-slash");
    } else if ($("#showhidepass input").attr("type") == "Password") {
      $("#showhidepass input").attr("type", "text");
      $("#showhidepass i").removeClass("fa-eye");
      $("#showhidepass i").addClass("fa-eye-slash");
    }
  });

  // SWEETALERT HAPUS
  $(".tombol-hapus").on("click", function(e) {
    e.preventDefault();
    const href = $(this).attr("href");
    Swal.fire({
      title: "Apakah Anda yakin?",
      text: "Data ini akan dihapus",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#4285F4",
      cancelButtonColor: "#FF3547",
      confirmButtonText: "Ya, hapus",
      cancelButtonText: "Batal"
    }).then(result => {
      if (result.value) {
        document.location.href = href;
      }
    });
  });
});
