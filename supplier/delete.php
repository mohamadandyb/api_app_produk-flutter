<?php
$koneksi = new mysqli('localhost', 'root', '', 'db_produk');

// Mengecek apakah koneksi berhasil
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

$id_supplier = $_POST['id_supplier'];

// Menyiapkan query SQL untuk memasukkan data ke dalam tabel dengan prepared statement
$data = $koneksi->prepare("DELETE FROM tb_supplier WHERE id_supplier = '$id_supplier'");


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