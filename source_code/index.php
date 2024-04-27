<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Harga.php');
include('classes/Rasa.php');
include('classes/Makanan.php');
include('classes/Template.php');

// buat instance makanan
$listMakanan = new Makanan($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

// buka koneksi
$listMakanan->open();
// tampilkan data makanan
$listMakanan->getMakananJoin();

// cari makanan
if (isset($_POST['btn-cari'])) {
    // methode mencari data makanan
    $listMakanan->searchMakanan($_POST['cari']);
} else {
    // method menampilkan data makanan
    $listMakanan->getMakananJoin();
}

$data = null;

// ambil data makanan
// gabungkan dgn tag html
// untuk di passing ke skin/template
while ($row = $listMakanan->getResult()) {
    $data .= '<div class="col gx-2 gy-3 justify-content-center">' .
        '<div class="card pt-4 px-2 makanan-thumbnail">
        <a href="detail.php?id=' . $row['id_makanan'] . '">
        <div class="card-body">
            <p class="card-text makanan-nama my-0">' . $row['nama_makanan'] . '</p>
            <p class="card-text rasa-nama">' . $row['nama_rasa'] . '</p>
            <p class="card-text harga-nama my-0">' . $row['jumlah_harga'] . '</p>
        </div>
        </a>
    </div>    
    </div>';
}

// tutup koneksi
$listMakanan->close();

// buat instance template
$home = new Template('templates/skin.html');

// simpan data ke template
$home->replace('DATA_MAKANAN', $data);
$home->write();
