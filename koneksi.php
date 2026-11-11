<?php
class Kasir {
    public $koneksi;

    function __construct() {
        $this->koneksi = mysqli_connect("localhost", "root", "", "kasir");
    }

    function query($sql) {
        return mysqli_query($this->koneksi, $sql);
    }

    function ambilData($sql) {
        $hasil = mysqli_query($this->koneksi, $sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($hasil)) {
            $data[] = $row;
        }
        return $data;
    }
}

$db = new Kasir();
?>
