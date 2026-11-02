<?php

require_once "Produk.php";
require_once "Helper.php";

use App\Models\Produk;
use function App\Helpers\rupiah;

$produk = new Produk("P001", "Laptop", 10000000, 5);

echo "Produk: " . $produk->nama . PHP_EOL;
echo "Harga: " . rupiah($produk->harga) . PHP_EOL;
echo "Stok: " . $produk->stok . PHP_EOL;
echo "Pajak: " . (Produk::PAJAK * 100) . "%" . PHP_EOL;
echo PHP_EOL;
echo "Total harga setelah pajak: " . rupiah($produk->hargaSetelahPajak()) . PHP_EOL;
