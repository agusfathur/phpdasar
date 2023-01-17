<?php

$conn = mysqli_connect("localhost","root","","phpdasar");

function query($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows  = [];
    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data){
    global $conn;
     // ambil data dari tiap elemen dalam form
    $nim = htmlspecialchars($data['nim']);
    $nama = htmlspecialchars($data['nama']);
    $email = htmlspecialchars($data['email']);
    $prodi = htmlspecialchars($data['prodi']);
    
    // UPLPOAD Gambar
    $gambar = upload();
    if ( !$gambar ){
        return false;
    }

     // query insert data
    //  (`id`, `nama`, `nim`, `prodi`, `email`, `gambar`)
    $query = "INSERT INTO mahasiswa
                VALUES ('','$nama','$nim','$prodi','$email','$gambar')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload(){
    $namaFile =$_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    if( $error === 4 ){
        echo"<script>
            alert('pilih gambar terlebih dahulu');
            </script>";
        return false;
    }

    // cekapah yang diupload gambar
    $ekstensiGambarValid = ['jpg','jpeg','png'];
    // explode pemecah string
    $ekstensiGambar = explode('.',$namaFile);
    // end, array terakhir
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    // ada atau tidak jarum, jerami(needle, heystack)
    if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
        echo"<script>
            alert('yang anda upload bukan gambar');
            </script>";
        return false;
    }

    // CEK jika ukuran terlalu besar, dalam byte
    if($ukuranFile > 1000000 ){
        echo"<script>
            alert('gambar terlalu besar!');
            </script>";
        return false;
    }

    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    // LOLOS PENGECEKAN, gambar siap diupload
    // pemindah direktori file
    move_uploaded_file($tmpName,'img/'.$namaFileBaru);

    // return ke query
    return $namaFileBaru;


}


function hapus($id){
    global $conn;
    mysqli_query($conn ,"DELETE FROM mahasiswa WHERE id = $id");
    mysqli_affected_rows($conn);
}

function ubah($data){
    global $conn;
     // ambil data dari tiap elemen dalam form
    $id = $data['id'];
    $nim = htmlspecialchars($data['nim']) ;
    $nama = htmlspecialchars($data['nama']);
    $email = htmlspecialchars($data['email']);
    $prodi = htmlspecialchars($data['prodi']);
    $gambar = htmlspecialchars($data['gambar']);
    $gambarLama = htmlspecialchars($data['gambarLama']);

    // cek apakah user pilih gambar baru atau tidak
    if($_FILES['gambar']['error'] === 4){
        $gambar  = $gambarLama;
    }else {
        $gambar = upload();
    }

     // query update data
    $query = "UPDATE mahasiswa SET
            nim = '$nim', 
            nama = '$nama', 
            email = '$email',
            prodi = '$prodi',
            gambar = '$gambar'
            WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword){
    $query = "SELECT * FROM mahasiswa
                WHERE
            nama LIKE '%$keyword%' OR
            nim LIKE '%$keyword%' OR
            email LIKE '%$keyword%' OR
            prodi LIKE '%$keyword%'
            "; // LIKE , cari seperti
    return query($query);
}

?>