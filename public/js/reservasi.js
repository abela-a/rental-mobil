$(document).ready(function() {
  // RESERVASI
  $(".tombol-reservasi").on("click", function() {
    $(".reservasi").on("show.bs.modal", function() {
      $("#sopirCheck", this).change(function() {
        console.log("sopir");
        if (this.checked) {
          $("#showSopir", ".reservasi")
            .removeClass("d-none")
            .addClass("d-inline");
        } else {
          $("#showSopir", ".reservasi")
            .removeClass("d-inline")
            .addClass("d-none");
          $("#Sopir", ".reservasi").val("SPR000");
          $("#TarifSopirPerhari", ".reservasi").val(0);
        }
      });
      // SOPIR
      $("#Sopir", this).change(function() {
        var harga = $("option:selected", this).attr("harga");
        $("#TarifSopirPerhari", ".reservasi").val(harga);
        total();
      });
      // RANGE DATE
      $("#Tanggal_Kembali", ".reservasi").change(function() {
        var tanggalMulai = $(
          "input[name='Tanggal_Pinjam_submit']",
          ".TP",
          this
        ).val();
        var tanggalAkhir = $(
          "input[name='Tanggal_Kembali_submit']",
          ".TK",
          this
        ).val();
        console.log(tanggalMulai);
        console.log(tanggalAkhir);
        var tanggalMulai = moment(tanggalMulai);
        var tanggalAkhir = moment(tanggalAkhir);

        var lamaRental = tanggalAkhir.diff(tanggalMulai, "days");

        $("#LamaRental", ".reservasi").val(lamaRental);

        total();
      });

      function total() {
        var hargaSewaMobil = $("#TarifMobilPerhari", ".reservasi").val();
        var lamaRental = $("#LamaRental", ".reservasi").val();
        var tarifSopir = $("#TarifSopirPerhari", ".reservasi").val();

        var bayarMobil = hargaSewaMobil * lamaRental;
        var bayarSopir = tarifSopir * lamaRental;

        var totalBayar = bayarMobil + bayarSopir;

        if (!isNaN(totalBayar)) {
          $("#TotalBayar", ".reservasi").val(totalBayar);
        }
      }

      $("#Tanggal_Kembali, #LamaRental, #Tanggal_Pinjam", ".reservasi").change(
        function() {
          total();
        }
      );
    });
  });
});
