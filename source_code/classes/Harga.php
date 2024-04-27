<?php

class Harga extends DB
{
    function getHarga()
    {
        $query = "SELECT * FROM harga";
        return $this->execute($query);
    }

    function getHargaById($id)
    {
        $query = "SELECT * FROM harga WHERE id_harga=$id";
        return $this->execute($query);
    }

    function addHarga($data)
    {
        $jumlah = $data['jumlah_harga'];
        $query = "INSERT INTO harga VALUES('', '$jumlah')";
        return $this->executeAffected($query);
    }

    function updateHarga($id, $data)
    {
        $jumlah = $data['jumlah_harga'];
        $query = "UPDATE harga SET jumlah_harga='$jumlah' WHERE id_harga=$id";
        return $this->executeAffected($query);
    }

    function deleteHarga($id)
    {
        $query = "DELETE FROM harga WHERE id_harga=$id";
        return $this->executeAffected($query);
    }
}
