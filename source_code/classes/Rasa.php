<?php

class Rasa extends DB
{
    function getRasa()
    {
        $query = "SELECT * FROM rasa";
        return $this->execute($query);
    }

    function getRasaById($id)
    {
        $query = "SELECT * FROM rasa WHERE id_rasa=$id";
        return $this->execute($query);
    }

    function addRasa($data)
    {
        $nama = $data['nama_rasa'];
        $query = "INSERT INTO rasa VALUES('', '$nama')";
        return $this->executeAffected($query);
    }

    function updateRasa($id, $data)
    {
        $nama = $data['nama_rasa'];
        $query = "UPDATE rasa SET nama_rasa='$nama' WHERE id_rasa=$id";
        return $this->executeAffected($query);
    }

    function deleteRasa($id)
    {
        $query = "DELETE FROM rasa WHERE id_rasa=$id";
        return $this->executeAffected($query);
    }
}
