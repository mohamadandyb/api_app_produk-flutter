<?php
$koneksi = new mysqli('localhost', 'root', '', 'db_produk');

// Mengecek apakah koneksi berhasil
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Menjalankan query untuk mengambil data
$query = $koneksi->query("SELECT * FROM tb_supplier");

// Mengecek apakah query berhasil dijalankan
if ($query) {
    // Mengambil semua data dalam bentuk array asosiatif
    $data = $query->fetch_all(MYSQLI_ASSOC);

    // Menampilkan data dalam format JSON
    echo json_encode($data);
} else {
    // Jika query gagal, tampilkan error
    echo json_encode([
        'pesan' => 'Gagal mengambil data'
    ]);
}

// Menutup koneksi
$koneksi->close();
?>