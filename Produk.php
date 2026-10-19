<?php

class Produk
{
    const PAJAK = 0.11;

    public string $kode;
    public string $nama;
    public int $harga;
    public int $stok;

    public function __construct(string $kode, string $nama, int $harga, int $stok)
    {
        $this->kode = $kode;
        $this->nama = $nama;
        $this->harga = $harga;
        $this->stok = $stok;
    }

    public static function hitungHargaSetelahPajak(int $harga): int
    {
        return (int) round($harga + ($harga * self::PAJAK));
    }

    public static function rupiah(int $angka): string
    {
        return "Rp" . number_format($angka, 0, ",", ".");
    }

    public static function tampilkanProduk(Produk $produk): void
    {
        echo "Produk: " . $produk->nama . PHP_EOL;
        echo "Harga: " . self::rupiah($produk->harga) . PHP_EOL;
        echo "Stok: " . $produk->stok . PHP_EOL;
        echo "Pajak: " . (self::PAJAK * 100) . "%" . PHP_EOL;
        echo PHP_EOL;
        echo "Total harga setelah pajak: " . self::rupiah(self::hitungHargaSetelahPajak($produk->harga)) . PHP_EOL;
    }
}

$produk = new Produk("P001", "Laptop", 10000000, 5);

Produk::tampilkanProduk($produk);
