<?php
$koneksi = new mysqli('localhost', 'root', '', 'db_produk');

// Mengecek apakah koneksi berhasil
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

$nama_produk = $_POST['nama_produk'];
$harga_produk = $_POST['harga_produk'];

// Menyiapkan query SQL untuk memasukkan data ke dalam tabel
$query = "INSERT INTO tb_produk (nama_produk, harga_produk) VALUES ('$nama_produk', '$harga_produk')";

// Eksekusi query
if (mysqli_query($koneksi, $query)) {
    echo json_encode([
        'pesan' => 'Sukses'
    ]);
} else {
    echo json_encode([
        'pesan' => 'Gagal'
    ]);
}

// Menutup koneksi
$koneksi->close();
?>
