var keyword = document.getElementById("keyword");
var tombolCari = document.getElementById("tombol-cari");
var container = document.getElementById("container");

// event / aksi
// addEventListener (lakukan sesuatu jika event dijalankan)
//  munculkan alert jika ter-clik
// tombolCari.addEventListener("click", function () {
//   alert("berhasil!");
// });

// tambhakan event ketika keyword ditulis
keyword.addEventListener("keyup", () => {
  // ajax
  var xhr = new XMLHttpRequest();

  // cek kesiapan ajaz
  xhr.onreadystatechange = function () {
    // 4 sudah ready, 200 sudah ok
    if (xhr.readyState == 4 && xhr.status == 200) {
      container.innerHTML = xhr.responseText;
    }
  };

  // ekseskui ajax
  // (METHOD, sumber data, true)
  xhr.open("GET", "ajax/mahasiswa.php?keyword=" + keyword.value, true);
  xhr.send();
});
