<?php

require_once "Produk.php";
require_once "Helper.php";

use App\Models\Produk;
use function App\Helpers\rupiah;

$produk = new Produk("P001", "Laptop", 10000000, 5);

// Property private dibaca lewat getter
echo "Produk: " . $produk->getNama() . PHP_EOL;
echo "Harga: " . rupiah($produk->getHarga()) . PHP_EOL;
echo "Stok: " . $produk->getStok() . PHP_EOL;
echo "Pajak: " . (Produk::PAJAK * 100) . "%" . PHP_EOL;
echo PHP_EOL;
echo "Total harga setelah pajak: " . rupiah($produk->hargaSetelahPajak()) . PHP_EOL;
echo PHP_EOL;

// Mengubah nilai lewat setter
$produk->setStok(10);
echo "Stok setelah diubah: " . $produk->getStok() . PHP_EOL;

// Setter menolak nilai yang tidak valid
try {
    $produk->setHarga(-500);
} catch (InvalidArgumentException $e) {
    echo "Error: " . $e->getMessage() . PHP_EOL;
}

// Akses langsung ke property private akan error
try {
    echo $produk->harga;
} catch (Error $e) {
    echo "Error: " . $e->getMessage() . PHP_EOL;
}
