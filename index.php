<?php

require_once("config/dbconnect.php");
require_once("./include/rdString.php");
require_once('./models/DichVu.php');
require_once('./models/DonHang.php');
require_once('./models/TaiKhoan.php');
require_once('./controllers/Home.php');
require_once('./controllers/DatDichVu.php');
require_once('./controllers/admin.php');
session_start();


$action = "";
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
}

switch ($action) {
    case "DatDichVu":
        $controller = new DatDichVuController();
        $controller->DatDichVu();
        break;
    case "XemVaCapNhapDonHang":
        $controller = new DatDichVuController();
        $controller->TraCuu();
        break;
    case "HuyDonHang":
        $controller = new DatDichVuController();
        $controller->HuyDonHang();
        break;
    case "DangNhap":
        $controller = new HomeController();
        $controller->DangNhap();
        break;
    case "DangXuat":
        $controller = new HomeController();
        $controller->DangXuat();
        break;
    case "XemDanhSachDatHang":
        $controller = new AdminController();
        $controller->XemDanhSachDatHang();
        break;
    case "XemChiTietDonHang":
        $controller = new AdminController();
        $controller->XemChiTietDonHang();
        break;
    case "ThongBaoCapNhapTrangThai":
        $controller = new AdminController();
        $controller->ThongBao();
        break;
    default:
        $controller = new HomeController();
        $controller->index();
        break;
}
