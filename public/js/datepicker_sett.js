$(document).ready(function() {
  // DATEPICKER
  $(".datepicker").pickadate({
    format: "dddd, dd mmmm yyyy",
    formatSubmit: "yyyy-mm-dd",
    monthsFull: [
      "Januari",
      "Februari",
      "Maret",
      "April",
      "Mei",
      "Juni",
      "Juli",
      "Agustus",
      "September",
      "Oktober",
      "November",
      "Desember"
    ],
    monthsShort: [
      "Jan",
      "Feb",
      "Mar",
      "Apr",
      "Mei",
      "Jun",
      "Jul",
      "Agt",
      "Sep",
      "Okt",
      "Nov",
      "Des"
    ],
    weekdaysFull: [
      "Ahad",
      "Senin",
      "Selasa",
      "Rabu",
      "Kamis",
      "Jumat",
      "Sabtu"
    ],
    weekdaysShort: ["Ahd", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"],
    min: 0,
    today: "Hari ini",
    clear: "Bersihkan",
    close: "Keluar"
  });
});
