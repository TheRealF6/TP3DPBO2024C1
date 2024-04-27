<?php

class Makanan extends DB
{
    function getMakananJoin()
    {
        $query = "SELECT * FROM makanan JOIN harga ON makanan.id_harga=harga.id_harga JOIN rasa ON makanan.id_rasa=rasa.id_rasa ORDER BY makanan.id_makanan";

        return $this->execute($query);
    }

    function getMakanan()
    {
        $query = "SELECT * FROM makanan";
        return $this->execute($query);
    }

    function getMakananById($id)
    {
        $query = "SELECT * FROM makanan JOIN harga ON makanan.id_harga=harga.id_harga JOIN rasa ON makanan.id_rasa=rasa.id_rasa WHERE id_makanan=$id";
        return $this->execute($query);
    }

    function searchMakanan($keyword)
    {
        $query = "SELECT * FROM makanan WHERE nama_makanan LIKE '%$keyword%'";
        return $this->execute($query);
    }

    function addData($data, $file)
    {
        $nama = $data['nama_makanan'];
        $rasaId = $data['id_rasa'];
        $hargaId = $data['id_harga'];
        $query = "INSERT INTO makanan(nama_makanan, id_rasa, id_harga) VALUES('$nama', '$rasaId', '$hargaId')";
        return $this->executeAffected($query);
    }

    function updateData($id, $data, $file)
    {
        $nama = $data['nama_makanan'];
        $rasaId = $data['id_rasa'];
        $hargaId = $data['id_harga'];
        $query = "UPDATE makanan SET nama_makanan='$nama', id_rasa='$rasaId', id_harga='$hargaId' WHERE id_makanan=$id";
        return $this->executeAffected($query);
    }

    function deleteData($id)
    {
        $query = "DELETE FROM makanan WHERE id_makanan=$id";
        return $this->executeAffected($query);
    }
}
