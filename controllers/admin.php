<?php

class AdminController
{
    public function XemDanhSachDatHang()
    {
        $DichVu = array();
        $DanhSachDonHang = DonHangModel::listAll();
        foreach ($DanhSachDonHang as $DonHang) {
            $DichVu[] = DichVuModel::findByMaDV($DonHang->MaDV)[0];
        }
        $VIEW = "./views/DanhSachDatHang.phtml";
        require("./template/template.phtml");
    }

    public function XemChiTietDonHang()
    {
        $message = "";
        if (isset($_REQUEST['TrangThai'])) {
            if ($_REQUEST['TrangThai'] == "DAXACNHAN" || $_REQUEST['TrangThai'] == "TIENHANH" || $_REQUEST['TrangThai'] == "HOANTAT" || $_REQUEST['TrangThai'] == "HUY") {
                DonHangModel::update($_REQUEST['TrangThai'], $_REQUEST['MaDangKy']);
                header("location: index.php?action=ThongBaoCapNhapTrangThai&MaDangKy=" . $_REQUEST['MaDangKy']);
            } else {
                $message = "Trang thai khong hop le. Trang thai gom DAXACNHAN,TIENHANH,HOANTAT,HUY";
            }
        }
        $data = DonHangModel::find($_REQUEST['MaDangKy']);
        $DV = DichVuModel::findByMaDV($data[0]->MaDV);
        $VIEW = "./views/ChiTietDonHangAdmin.phtml";
        require("./template/template.phtml");
    }

    public function ThongBao()
    {
        $MaDangKy = $_REQUEST['MaDangKy'];
        $VIEW = "./views/ThongBao.phtml";
        require("./template/template.phtml");
    }
}
