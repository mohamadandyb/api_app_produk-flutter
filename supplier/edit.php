<?php
$koneksi = new mysqli(
    'localhost',
    'root',
    '',
    'db_produk'
);

// Mengecek apakah koneksi berhasil
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Mengambil data dari POST
$id_supplier = $_POST['id_supplier'];
$nama_supplier = $_POST['nama_supplier'];
$alamat = $_POST['alamat'];
$no_telepon = $_POST['no_telepon'];

// Menyiapkan query SQL dengan prepared statement
$query = "UPDATE tb_supplier 
          SET nama_supplier = ?, 
              alamat = ?, 
              no_telepon = ? 
          WHERE id_supplier = ?";

$data = $koneksi->prepare($query);

// M
