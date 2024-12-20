<?php
$koneksi = new mysqli('localhost', 'root', '', 'db_produk');

// Mengecek apakah koneksi berhasil
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

$id_produk = $_POST['id_produk'];

// Menyiapkan query SQL untuk memasukkan data ke dalam tabel dengan prepared statement
$data = $koneksi->prepare("DELETE FROM tb_produk WHERE id_produk = '$id_produk'");


// Eksekusi query
if ($data->execute()) {
    echo json_encode([
        'pesan' => 'Sukses hapus data'
    ]);
} else {
    echo json_encode([
        'pesan' => 'Gagal hapus data'
    ]);
}

// Menutup koneksi
$koneksi->close();
?>
