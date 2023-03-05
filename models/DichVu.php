<?php

class DichVuModel
{
    public $MaDV;
    public $TenDV;
    public $LoaiDV;
    public $DonGia;

    function __construct()
    {
        $this->MaDV = "";
        $this->TenDV = "";
        $this->LoaiDV = "";
        $this->DonGia = "";
    }

    public static function listAll()
    {
        $mysqli = connect();
        $mysqli->query("SET NAMES utf8");
        $query = "SELECT * FROM DICHVU";
        $result = $mysqli->query($query);
        $listService = array();
        if ($result) {
            foreach ($result as $row) {
                $servie = new DichVuModel();
                $servie->MaDV = $row["MaDV"];
                $servie->TenDV = $row["TenDV"];
                $servie->LoaiDV = $row["LoaiDV"];
                $servie->DonGia = $row["DonGia"];
                $listService[] = $servie; //add an item into array
            }
        }
        $mysqli->close();
        return $listService;
    }
    public static function find($DonGia)
    {
        $mysqli = connect();

        $mysqli->query("SET NAMES utf8");
        $query = "SELECT * FROM DICHVU WHERE DonGia = '$DonGia'";
        $result = $mysqli->query($query);
        $listService = array();
        if ($result) {
            foreach ($result as $row) {
                $servie = new DichVuModel();
                $servie->MaDV = $row["MaDV"];
                $servie->TenDV = $row["TenDV"];
                $servie->LoaiDV = $row["LoaiDV"];
                $servie->DonGia = $row["DonGia"];
                $listService[] = $servie; //add an item into array
            }
        }
        $mysqli->close();
        return $listService;
    }

    public static function findByMaDV($MaDV)
    {
        $mysqli = connect();

        $mysqli->query("SET NAMES utf8");
        $query = "SELECT * FROM DICHVU WHERE MaDV = '$MaDV'";
        $result = $mysqli->query($query);
        $listService = array();
        if ($result) {
            foreach ($result as $row) {
                $servie = new DichVuModel();
                $servie->MaDV = $row["MaDV"];
                $servie->TenDV = $row["TenDV"];
                $servie->LoaiDV = $row["LoaiDV"];
                $servie->DonGia = $row["DonGia"];
                $listService[] = $servie; //add an item into array
            }
        }
        $mysqli->close();
        return $listService;
    }

    // public static function add($club)
    // {
    //     $mysqli = connect();

    //     $mysqli->query("SET NAMES utf8");

    //     $ClubID = $club->CLUBID;
    //     $ClubName = $club->CLUBNAME;
    //     $ShortName = $club->SHORTNAME;
    //     $StadiumID = $club->STADIUMID;
    //     $CoachID = $club->COACHID;

    //     $query = "INSERT INTO Club values ($ClubID, '$ClubName', '$ShortName', '$StadiumID', $CoachID)";
    //     if ($mysqli->query($query))
    //         return 1;
    //     return 0;
    // }

    // public static function update($club)
    // {
    //     $mysqli = connect();

    //     $mysqli->query("SET NAMES utf8");

    //     $ClubID = $club->CLUBID;
    //     $ClubName = $club->CLUBNAME;
    //     $ShortName = $club->SHORTNAME;
    //     $StadiumID = $club->STADIUMID;
    //     $CoachID = $club->COACHID;

    //     $query = "UPDATE Club SET ClubName = '$ClubName', Shortname = '$ShortName' ,StadiumID = '$StadiumID', CoachID = $CoachID Where ClubID = $ClubID";
    //     if ($mysqli->query($query))
    //         return 1;
    //     return 0;
    // }

    // public static function get($mssv) {
    //     $mysqli = connect();

    //     $mysqli->query("SET NAMES utf8");
    //     $query = "SELECT * FROM SinhVien WHERE MSSV='$mssv'";
    //     $result = $mysqli->query($query);

    //     if  ($row = $result->fetch_object() ) {
    //         $sv = new SinhVienModel();
    //         $sv->HOTEN = $row->HoTen;
    //         $sv->MSSV = $row->MSSV;     
    //         $sv->NGAYSINH = $row->NgaySinh;
    //         $sv->DIACHI = $row->DiaChi;   
    //         $sv->DIENTHOAI = $row->DienThoai;   
    //         $sv->MAKHOA = $row->MaKhoa;   

    //     }

    //     $mysqli->close();
    //     return $sv;
    // }

    // public static function delete($mssv)
    // {
    //     $mysqli = connect();
    //     $mysqli->query("SET NAMES utf8");
    //     $query = "DELETE FROM SINHVIEN WHERE MSSV=$mssv";
    //     $r = 0;
    //     if ($mysqli->query($query))       
    //         $r = 1;
    //     $mysqli->close();
    //     return $r;

    // }
}
