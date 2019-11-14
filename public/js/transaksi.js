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

  // MOBIL
  $("#Mobil").change(function() {
    var harga = $("option:selected", this).attr("harga");
    $("#TarifMobilPerhari").val(harga);
    total();
  });

  // SOPIR
  $("#Sopir").change(function() {
    var harga = $("option:selected", this).attr("harga");
    $("#TarifSopirPerhari").val(harga);
    total();
  });

  // RANGE DATE
  $("#Tanggal_Kembali").change(function() {
    var tanggalMulai = $("input[name='Tanggal_Pinjam_submit']").val();
    var tanggalAkhir = $("input[name='Tanggal_Kembali_submit']").val();

    var tanggalMulai = moment(tanggalMulai);
    var tanggalAkhir = moment(tanggalAkhir);

    var lamaRental = tanggalAkhir.diff(tanggalMulai, "days");

    $("#LamaRental").val(lamaRental);

    total();
  });

  function total() {
    var hargaSewaMobil = $("#TarifMobilPerhari").val();
    var lamaRental = $("#LamaRental").val();
    var tarifSopir = $("#TarifSopirPerhari").val();

    var bayarMobil = hargaSewaMobil * lamaRental;
    var bayarSopir = tarifSopir * lamaRental;

    var totalBayar = bayarMobil + bayarSopir;

    if (!isNaN(totalBayar)) {
      $("#TotalBayar").val(totalBayar);
    }
  }

  $("#Tanggal_Kembali, #LamaRental, #Tanggal_Pinjam").change(function() {
    total();
  });

  $(".tombol_selesai").on("click", function() {
    $(".selesai").on("show.bs.modal", function() {
      var tanggalRencana = $(
        "input[name='Tanggal_Kembali_selesai_submit']",
        this
      ).val();
      var tanggalSebenarnya = $(
        "input[name='Tanggal_Sebenarnya_submit']",
        this
      ).val();

      var tanggalRencana = moment(tanggalRencana);
      var tanggalSebenarnya = moment(tanggalSebenarnya);

      var JatuhTempo = tanggalSebenarnya.diff(tanggalRencana, "days");
      $("#JatuhTempo", this).val(JatuhTempo);

      var Denda = JatuhTempo * 50000;
      $("#Denda", this)
        .val(Denda)
        .mask("0.000.000.000", { reverse: true });

      var totalSementara = parseFloat(
        $("#TotalBayar_selesai", this)
          .val()
          .replace(/\D/g, "")
      );

      var hasilDenda = Denda + totalSementara;
      $("#TotalBayar_selesai", this)
        .val(hasilDenda)
        .mask("0.000.000.000", { reverse: true });

      $("#BiayaKerusakan", this).keyup(function() {
        window.BiayaKerusakan = parseFloat(
          $(this)
            .val()
            .replace(/\D/g, "")
        );
        TotalAkhir();
        TotalAkhirPelanggan();
      });

      $("#BiayaBBM", this).keyup(function() {
        window.BiayaBBM = parseFloat(
          $(this)
            .val()
            .replace(/\D/g, "")
        );
        TotalAkhir();
        TotalAkhirPelanggan();
      });

      function TotalAkhir() {
        totalAkhirBayar = parseFloat(
          totalSementara + Denda + BiayaKerusakan + BiayaBBM
        );

        $("#TotalBayar_selesai", ".selesai")
          .val(totalAkhirBayar)
          .mask("0.000.000.000", { reverse: true });
      }

      function TotalAkhirPelanggan() {
        totalAkhirBayar = parseFloat(
          $("#TotalBayar_selesai", ".selesai").val()
        );

        totalPelanggan = JumlahBayar - totalAkhirBayar;

        if (!isNaN(totalPelanggan)) {
          $("#Kembalian", ".selesai")
            .val(totalPelanggan)
            .mask("0.000.000.000", { reverse: true });
        }
      }

      $("#JumlahBayar", this).keyup(function() {
        TotalAkhir();

        JumlahBayar = parseFloat(
          $(this)
            .val()
            .replace(/\D/g, "")
        );

        TotalAkhirPelanggan();
      });
    });
  });
});
