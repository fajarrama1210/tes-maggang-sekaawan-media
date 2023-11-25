<?php

//PANGGIL KONEKSI DATABASE
include "koneksi.php";

//UJI JIKA TOMBOL SIMPAN DI KLIK
if (isset($_POST['bsimpan'])) {

    //PERSIAPAN SIMPAN DATA BARU
    $simpan = mysqli_query($koneksi, "INSERT INTO tmhs (nim, nama, jenis_kelamin, alamat, prodi)
                        VALUES ('$_POST[tnim]',
                        '$_POST[tnama]',
                        '$_POST[tkelamin]',
                        '$_POST[talamat]',
                        '$_POST[tprodi]')");
    //JIKA SIMPAN SUKSES
    if ($simpan) {
        echo "<script>
        alert('Simpan data Sukses!');
        document.location='index.php';
        </script>";
    } else {
        echo "<script>
        alert('Simpan data Gagal!');
        document.location='index.php';
        </script>";
    }
}


//UJI JIKA TOMBOL UBAH DI KLIK
if (isset($_POST['bubah'])) {

    //PERSIAPAN UBAH DATA 
    $ubah = mysqli_query($koneksi, "UPDATE tmhs SET 
                                nim = '$_POST[tnim]',
                                nama = '$_POST[tnama]',
                                jenis_kelamin = '$_POST[tkelamin]',
                                alamat = '$_POST[talamat]',
                                prodi = '$_POST[tprodi]'
                            WHERE id_mhs = '$_POST[id_mhs]'    
                                ");
    //JIKA UBAH SUKSES
    if ($ubah) {
        echo "<script>
        alert('Ubah data Sukses!');
        document.location='index.php';
        </script>";
    } else {
        echo "<script>
        alert('Ubah data Gagal!');
        document.location='index.php';
        </script>";
    }
}


//UJI JIKA TOMBOL UBAH DI KLIK
if (isset($_POST['bhapus'])) {

    //PERSIAPAN UBAH DATA 
    $hapus = mysqli_query($koneksi, "DELETE FROM tmhs WHERE id_mhs = '$_POST[id_mhs]'");

    //JIKA HAPUS SUKSES
    if ($hapus) {
        echo "<script>
        alert('Hapus data Sukses!');
        document.location='index.php';
        </script>";
    } else {
        echo "<script>
        alert('Hapus data Gagal!');
        document.location='index.php';
        </script>";
    }
}
