// jquery(document)
$(document).ready(function () {
  //  hilangkan tombol cari
  $("#tombol-cari").hide();

  // event kwyword ditulis
  //ajax
  $("#keyword").on("keyup", function () {
    // munculkan icon loading
    $(".loader").show();
    // ajax-load
    // $("#container").load("ajax/mahasiswa.php?keyword=" + $("#keyword").val());

    // ajax  $.get()
    $.get("ajax/mahasiswa.php?keyword=" + $("#keyword").val(), function (data) {
      $("#container").html(data);
      $(".loader").hide();
    });
  });
});
