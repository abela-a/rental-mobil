$(document).ready(function() {
  // SOPIRCHECK
  $("#sopirCheck").change(function() {
    if (this.checked) {
      $("#showSopir")
        .removeClass("d-none")
        .addClass("d-inline");
    } else {
      $("#showSopir")
        .removeClass("d-inline")
        .addClass("d-none");
    }
  });

  // RANGE DATE
  $("#Tanggal_Kembali").change(function() {
    var tanggalMulai = $("input[name='Tanggal_Pinjam_submit']").val();
    var tanggalAkhir = $("input[name='Tanggal_Kembali_submit']").val();

    var tanggalMulai = moment(tanggalMulai);
    var tanggalAkhir = moment(tanggalAkhir);

    var lamaRental = tanggalAkhir.diff(tanggalMulai, "days");

    $("#LamaRental").val(lamaRental);

    // MATH FUNCTION
    var hargaSewaMobil = parseFloat($("#TarifMobilPerhari").val());
    var lamaRental = parseFloat($("#LamaRental").val());
    var totalBayar = hargaSewaMobil * lamaRental;

    $("#TotalBayar").val(totalBayar);
  });
});
