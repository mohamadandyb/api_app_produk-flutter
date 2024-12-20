<?php
$koneksi = new mysqli('localhost', 'root', '', 'db_produk');

// Mengecek apakah koneksi berhasil
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

$id_produk = $_POST['id_produk'];
$nama_produk = $_POST['nama_produk'];
$harga_produk = $_POST['harga_produk'];

// Menyiapkan query SQL untuk memasukkan data ke dalam tabel dengan prepared statement
$data = $koneksi->prepare("UPDATE tb_produk SET nama_produk = '$nama_produk', harga_produk = '$harga_produk' WHERE id_produk = '$id_produk'");


// Eksekusi query
if ($data->execute()) {
    echo json_encode([
        'pesan' => 'Sukses ubah data'
    ]);
} else {
    echo json_encode([
        'pesan' => 'Gagal ubah data'
    ]);
}

// Menutup koneksi
$koneksi->close();
?>
