<?php

namespace App\Helpers;

function rupiah(int $angka): string
{
    return "Rp" . number_format($angka, 0, ",", ".");
}
