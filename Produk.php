<?php

class Produk
{
    const PAJAK = 0.11;

    public string $kode;
    public string $nama;
    public int $harga;
    public int $stok;

    // Constructor: dipanggil otomatis saat objek dibuat dengan "new"
    public function __construct(string $kode, string $nama, int $harga, int $stok)
    {
        $this->kode = $kode;
        $this->nama = $nama;
        $this->harga = $harga;
        $this->stok = $stok;

        echo "Constructor: produk " . $this->nama . " dibuat" . PHP_EOL . PHP_EOL;
    }

    // Destructor: dipanggil otomatis saat objek dihapus / program selesai
    public function __destruct()
    {
        echo PHP_EOL . "Destructor: produk " . $this->nama . " dihapus dari memori" . PHP_EOL;
    }

    // Memakai data dari constructor ($this->harga), jadi tidak perlu parameter lagi
    public function hitungHargaSetelahPajak(): int
    {
        return (int) round($this->harga + ($this->harga * self::PAJAK));
    }

    public static function rupiah(int $angka): string
    {
        return "Rp" . number_format($angka, 0, ",", ".");
    }

    public function tampilkanProduk(): void
    {
        echo "Produk: " . $this->nama . PHP_EOL;
        echo "Harga: " . self::rupiah($this->harga) . PHP_EOL;
        echo "Stok: " . $this->stok . PHP_EOL;
        echo "Pajak: " . (self::PAJAK * 100) . "%" . PHP_EOL;
        echo PHP_EOL;
        echo "Total harga setelah pajak: " . self::rupiah($this->hitungHargaSetelahPajak()) . PHP_EOL;
    }
}

$produk = new Produk("P001", "Laptop", 10000000, 5);

$produk->tampilkanProduk();
