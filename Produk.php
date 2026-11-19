<?php

namespace App\Models;

class Produk
{
    const PAJAK = 0.11;

    // Encapsulation: property dibuat private, tidak bisa diubah langsung dari luar class
    private string $kode;
    private string $nama;
    private int $harga;
    private int $stok;

    public function __construct(string $kode, string $nama, int $harga, int $stok)
    {
        // Constructor memakai setter agar validasinya ikut berjalan
        $this->setKode($kode);
        $this->setNama($nama);
        $this->setHarga($harga);
        $this->setStok($stok);
    }

    // ===== Getter: untuk membaca nilai property =====
    public function getKode(): string
    {
        return $this->kode;
    }

    public function getNama(): string
    {
        return $this->nama;
    }

    public function getHarga(): int
    {
        return $this->harga;
    }

    public function getStok(): int
    {
        return $this->stok;
    }

    // ===== Setter: untuk mengubah nilai property (dengan validasi) =====
    public function setKode(string $kode): void
    {
        if (trim($kode) === "") {
            throw new \InvalidArgumentException("Kode produk tidak boleh kosong");
        }
        $this->kode = $kode;
    }

    public function setNama(string $nama): void
    {
        if (trim($nama) === "") {
            throw new \InvalidArgumentException("Nama produk tidak boleh kosong");
        }
        $this->nama = $nama;
    }

    public function setHarga(int $harga): void
    {
        if ($harga < 0) {
            throw new \InvalidArgumentException("Harga tidak boleh negatif");
        }
        $this->harga = $harga;
    }

    public function setStok(int $stok): void
    {
        if ($stok < 0) {
            throw new \InvalidArgumentException("Stok tidak boleh negatif");
        }
        $this->stok = $stok;
    }

    // Method biasa yang memakai property private lewat $this
    public function hargaSetelahPajak(): int
    {
        return (int) round($this->harga + ($this->harga * self::PAJAK));
    }
}
