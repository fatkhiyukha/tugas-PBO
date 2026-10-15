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

    public function hargaSetelahPajak(): int
    {
        return (int) round($this->harga + ($this->harga * self::PAJAK));
    }
}

function rupiah(int $angka): string
{
    return "Rp" . number_format($angka, 0, ",", ".");
}

$produk = new Produk("P001", "Laptop", 10000000, 5);

echo "Produk: " . $produk->nama . PHP_EOL;
echo "Harga: " . rupiah($produk->harga) . PHP_EOL;
echo "Stok: " . $produk->stok . PHP_EOL;
echo "Pajak: " . (Produk::PAJAK * 100) . "%" . PHP_EOL;
echo PHP_EOL;
echo "Total harga setelah pajak: " . rupiah($produk->hargaSetelahPajak()) . PHP_EOL;
