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
      $("#Sopir").val("SPR000");
      $("#TarifSopirPerhari").val(0);
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
    var hargaSewaMobil = $("#TarifMobilPerhari").val();
    var lamaRental = $("#LamaRental").val();
    var totalBayar = hargaSewaMobil * lamaRental;

    $("#TotalBayar").val(totalBayar);
  });

  // MOBIL
  $("#Mobil").change(function() {
    var harga = $("option:selected", this).attr("harga");
    $("#TarifMobilPerhari").val(harga);
  });

  // SOPIR
  $("#Sopir").change(function() {
    var harga = $("option:selected", this).attr("harga");
    $("#TarifSopirPerhari").val(harga);

    var hargaSewaMobil = $("#TarifMobilPerhari").val();
    var lamaRental = $("#LamaRental").val();
    var tarifSopir = $("#TarifSopirPerhari").val();

    var bayarMobil = hargaSewaMobil * lamaRental;
    var bayarSopir = tarifSopir * lamaRental;

    var totalBayar = bayarMobil + bayarSopir;

    $("#TotalBayar").val(totalBayar);
  });
});
