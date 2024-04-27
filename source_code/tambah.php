<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Harga.php');
include('classes/Rasa.php');
include('classes/Makanan.php');
include('classes/Template.php');

// buat instance pengurus
$listMakanan = new Makanan($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

// buka koneksi
$listMakanan->open();
// tampilkan data pengurus
$listMakanan->getMakananJoin();

// cari pengurus
if (isset($_POST['btn-cari'])) {
    // methode mencari data pengurus
    $listMakanan->searchMakanan($_POST['cari']);
} else {
    // method menampilkan data pengurus
    $listMakanan->getMakananJoin();
}

$data = null;

// ambil data pengurus
// gabungkan dgn tag html
// untuk di passing ke skin/template
while ($row = $listMakanan->getResult()) {
    $data .= '<div class="col gx-2 gy-3 justify-content-center">' .
        '<div class="card pt-4 px-2 pengurus-thumbnail">
        <a href="detail.php?id=' . $row['pengurus_id'] . '">
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
