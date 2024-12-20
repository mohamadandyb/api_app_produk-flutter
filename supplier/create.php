<?php
$koneksi = new mysqli('localhost', 'root', '', 'db_produk');

// Mengecek apakah koneksi berhasil
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

$nama_supplier = $_POST['nama_supplier'];
$alamat = $_POST['alamat'];
$no_telepon = $_POST['no_telepon'];


// Menyiapkan query SQL untuk memasukkan data ke dalam tabel
$query = "INSERT INTO tb_supplier (nama_supplier, alamat, no_telepon) VALUES ('$nama_supplier', '$alamat', '$no_telepon')";

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