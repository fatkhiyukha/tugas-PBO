<?php

namespace App\Models;

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
