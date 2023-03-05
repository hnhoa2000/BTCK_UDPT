<?php

class TaiKhoanModel
{
    public $TenTK;
    public $MatKhau;
    public $LoaiTK;
    public $TinhTrang;

    function __construct()
    {
        $this->TenTK = "";
        $this->MatKhau = "";
        $this->LoaiTK = "";
        $this->TinhTrang = "";
    }

    public static function DangNhap($TenTK, $MatKhau)
    {
        $mysqli = connect();

        $mysqli->query("SET NAMES utf8");
        $query = "SELECT * FROM TAIKHOAN WHERE TenTK = '$TenTK' and MatKhau = '$MatKhau'";
        $result = $mysqli->query($query);
        $listTaiKhoan = array();
        if ($result) {
            foreach ($result as $row) {
                $TaiKhoan = new TaiKhoanModel();
                $TaiKhoan->TenTK = $row["TenTK"];
                $TaiKhoan->MatKhau = $row["MatKhau"];
                $TaiKhoan->LoaiTK = $row["LoaiTK"];
                $TaiKhoan->TinhTrang = $row["TinhTrang"];
                $listTaiKhoan[] = $TaiKhoan; //add an item into array
            }
        }
        $mysqli->close();
        return $listTaiKhoan;
    }
}
