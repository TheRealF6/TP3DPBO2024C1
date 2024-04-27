<?php

include('config/db.php');
include('classes/DB.php');
include('classes/Harga.php');
include('classes/Rasa.php');
include('classes/Makanan.php');
include('classes/Template.php');

$makanan = new Makanan($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$makanan->open();

$data = null;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($id > 0) {
        $makanan->getMakananById($id);
        $row = $makanan->getResult();

        $data .= '<div class="card-header text-center">
        <h3 class="my-0">Detail ' . $row['nama_makanan'] . '</h3>
        </div>
        <div class="card-body text-end">
            <div class="row mb-5">
                <div class="col-3">
                    <div class="col-9">
                        <div class="card px-3">
                            <table border="0" class="text-start">
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td>' . $row['nama_makanan'] . '</td>
                                </tr>
                                <tr>
                                    <td>Rasa</td>
                                    <td>:</td>
                                    <td>' . $row['nama_rasa'] . '</td>
                                </tr>
                                <tr>
                                    <td>Harga</td>
                                    <td>:</td>
                                    <td>' . $row['jumlah_harga'] . '</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <a href="#"><button type="button" class="btn btn-success text-white">Ubah Data</button></a>
                <a href="#"><button type="button" class="btn btn-danger">Hapus Data</button></a>
            </div>';
    }
}

$makanan->close();
$detail = new Template('templates/skindetail.html');
$detail->replace('DATA_DETAIL_MAKANAN', $data);
$detail->write();
