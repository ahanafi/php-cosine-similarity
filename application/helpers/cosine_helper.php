<?php

/**
 * @param string $letter : Kalimat yang akan di split (pisah) menjadi per kata
 * @return array
 */
function tokenize(string $letter): array
{
    $pemisah = " ";
    return explode($pemisah, trim($letter));
}

/**
 * Referensi:
 * @link: https://dosenbahasa.com/jenis-jenis-tanda-baca
 * Fungsi ini untuk menghapus semua tanda baca yang terdapat pada kata
 */
function cleanStopLists(string $kata): string
{
    // Daftar tanda baca
    $arrStopLists = [
        '.', // Titik
        ',', // Koma
        '(', // Buka kurung
        ')', // Tutup kurung
        "'", // Tanda Petik tunggal
        '"', // Tanda petik dua
        '!', // Tanda seru
        '?', // Tanda tanya
        '-', // Strip
        '_', // Garis bawah (underscore)
        ':', // Titik dua
        '...', // Elipsis
        '[', // Buka kurung siku
        ']', // Tutup kurung siku
        '`', // Apostrop
        "/", // Garis miring,
        '@', // At
        '*', // Bintang
        '+', // Tambah
    ];

    return str_replace($arrStopLists, '', $kata);
}

/**
 * @param string $letter
 * @return string
 */
function cleanLetterFromStopList(string $letter): string
{
    $tokenize = tokenize($letter);
    $cleanedLetter = '';
    foreach ($tokenize as $word) {
        $cleanedLetter .= cleanStopLists($word) . ' ';
    }

    return trim($cleanedLetter);
}

/**
 * Validate whether the term/word is exist in array of conjunction word or not
 * @param string $term
 * @return string
 */
function isStopWords(string $term): string
{
    $arrConjunctions = [
        // Menggabungkan biasa
        'dan', 'dengan', 'serta',

        // Menggabungkan memilih
        'atau',

        // Menggabungkan mempertentangkan
        'tetapi', 'namun', 'sedangkan', 'sebaliknya',

        // Menggabungkan membetulkan
        'melainkan', 'hanya',

        // Menggabungkan menegaskan
        'bahkan', 'malah', 'malahan', 'lagipula', 'apalagi', 'jangankan',

        // Menggabungkan membatasi
        'kecuali', 'hanya',

        // Menggabungkan mengurutkan
        'lalu', 'kemudian', 'selanjutnya', 'berikutnya', 'setelah', 'setelahnya',

        // Menggabungkan menyamakan
        'yaitu', 'yakni', 'bahwa', 'adalah', 'ialah',

        // Menggabungkan menyimpulkan
        'jadi', 'karena', 'itu', 'oleh sebab itu', 'oleh karena itu',

        // Menyatakan sebab
        'sebab', 'karena',

        // Menyatakan syarat
        'kalau', 'jikalau', 'jika', 'bila', 'apalagi', 'apabila', 'asal',

        // Menyatakan tujuan
        'agar', 'supaya',

        // Menyatakan waktu
        'ketika', 'sewaktu', 'sebelum', 'sesudah', 'tatkala',

        // Menyatakan akibat
        'sampai', 'hingga', 'sehingga',

        // Menyatakan sasaran
        'untuk', 'guna', 'biar',

        // Menyatakan perbandingan
        'seperti', 'sebagai', 'laksana', 'sebagaimana',

        // Menyatakan tempat
        'tempat', 'pada'
    ];

    return in_array($term, $arrConjunctions);
}