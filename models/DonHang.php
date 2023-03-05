<?php

class DonHangModel
{
    public $MaDH;
    public $TenKH;
    public $DienThoai;
    public $DiaChi;
    public $ThoiGianBD;
    public $TrangThai;
    public $ThoiGianKT;
    public $MaDV;
    public $SoLuong;
    public $ThanhTien;
    public $GhiChu;
    public $MaDangKy;

    function __construct()
    {
        $this->MaDH = "";
        $this->TenKH = "";
        $this->DienThoai = "";
        $this->DiaChi = "";
        $this->ThoiGianBD = "";
        $this->TrangThai = "";
        $this->ThoiGianKT = "";
        $this->MaDV = "";
        $this->SoLuong = "";
        $this->ThanhTien = "";
        $this->GhiChu = "";
        $this->MaDangKy = "";
    }

    public static function listAll()
    {
        $mysqli = connect();
        $mysqli->query("SET NAMES utf8");
        $query = "SELECT * FROM DONHANG";
        $result = $mysqli->query($query);
        $listDH = array();
        if ($result) {
            foreach ($result as $row) {
                $DH = new DonHangModel();
                $DH->MaDH = $row["MaDH"];
                $DH->TenKH = $row["TenKH"];
                $DH->DienThoai = $row["DienThoai"];
                $DH->DiaChi = $row["DiaChi"];
                $DH->ThoiGianBD = $row["ThoiGianBD"];
                $DH->TrangThai = $row["TrangThai"];
                $DH->ThoiGianKT = $row["ThoiGianKT"];
                $DH->SoLuong = $row["SoLuong"];
                $DH->ThanhTien = $row["ThanhTien"];
                $DH->GhiChu = $row["GhiChu"];
                $DH->MaDV = $row["MaDV"];
                $DH->MaDangKy = $row["MaDangKy"];
                $listDH[] = $DH; //add an item into array
            }
        }
        $mysqli->close();
        return $listDH;
    }

    public static function add($DonHang)
    {
        $mysqli = connect();

        $mysqli->query("SET NAMES utf8");

        $TenKH = $DonHang->TenKH;
        $DienThoai = $DonHang->DienThoai;
        $DiaChi = $DonHang->DiaChi;
        $ThoiGianBD = $DonHang->ThoiGianBD;
        $TrangThai = $DonHang->TrangThai;
        $ThoiGianKT = $DonHang->ThoiGianKT;
        $MaDV = $DonHang->MaDV;
        $SoLuong = $DonHang->SoLuong;
        $ThanhTien = $DonHang->ThanhTien;
        $GhiChu = $DonHang->GhiChu;
        $MaDangKy = $DonHang->MaDangKy;

        $query = "INSERT INTO DonHang(`TenKH`,`DienThoai`,`DiaChi`,`ThoiGianBD`,`TrangThai`,`ThoiGianKT`,`MaDV`,`SoLuong`,`ThanhTien`,`GhiChu`,`MaDangKy`) 
        values ('$TenKH', '$DienThoai', '$DiaChi', '$ThoiGianBD', '$TrangThai', '$ThoiGianKT', '$MaDV', '$SoLuong', '$ThanhTien', '$GhiChu', '$MaDangKy')";
        if ($mysqli->query($query))
            return 1;
        return 0;
    }

    public static function find($MaKhachHang)
    {
        $mysqli = connect();

        $mysqli->query("SET NAMES utf8");
        $query = "SELECT * FROM DONHANG WHERE MaDangKy = '$MaKhachHang'";
        $result = $mysqli->query($query);
        $listDH = array();
        if ($result) {
            foreach ($result as $row) {
                $DH = new DonHangModel();
                $DH->MaDH = $row["MaDH"];
                $DH->TenKH = $row["TenKH"];
                $DH->DienThoai = $row["DienThoai"];
                $DH->DiaChi = $row["DiaChi"];
                $DH->ThoiGianBD = $row["ThoiGianBD"];
                $DH->TrangThai = $row["TrangThai"];
                $DH->ThoiGianKT = $row["ThoiGianKT"];
                $DH->SoLuong = $row["SoLuong"];
                $DH->ThanhTien = $row["ThanhTien"];
                $DH->GhiChu = $row["GhiChu"];
                $DH->MaDV = $row["MaDV"];
                $DH->MaDangKy = $row["MaDangKy"];
                $listDH[] = $DH; //add an item into array
            }
        }
        $mysqli->close();
        return $listDH;
    }

    public static function delete($MaDangKy)
    {
        $mysqli = connect();

        $mysqli->query("SET NAMES utf8");
        $query = "delete from DONHANG where MaDangKy = '$MaDangKy'";
        $result = $mysqli->query($query);
        $mysqli->close();
    }

    public static function update($TrangThai, $MaDangKy)
    {
        $mysqli = connect();

        $mysqli->query("SET NAMES utf8");
        $query = "update DONHANG set TrangThai = '$TrangThai' where MaDangKy = '$MaDangKy'";
        $result = $mysqli->query($query);
        $mysqli->close();
    }
}
