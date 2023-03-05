<?php

class DatDichVuController
{
    public function DatDichVu()
    {
        $message = "";
        if (isset($_REQUEST["TenKH"])) {
            $DonHang = new DonHangModel();
            $DonHang->TenKH = $_REQUEST["TenKH"];
            $DonHang->DienThoai = $_REQUEST["DienThoai"];
            $DonHang->DiaChi = $_REQUEST["DiaChi"];
            $DonHang->ThoiGianBD = date("Y-m-d h:i:s", time());
            $DonHang->TrangThai = "DAKHOITAO";
            $DonHang->ThoiGianKT = date("Y-m-d h:i:s", time());
            $DonHang->MaDV = DichVuModel::find($_REQUEST["TenDV"])[0]->MaDV;
            $DonHang->SoLuong = $_REQUEST["SoLuong"];
            $DonHang->ThanhTien = $_REQUEST["ThanhTien"];
            $DonHang->GhiChu = $_REQUEST["GhiChu"];
            $DonHang->MaDangKy = generateRandomString();
            $result = DonHangModel::add($DonHang);
            if ($result == 1)
                $message = "Đặt dịch vụ thành công. Đây là mã đăng kí của bạn: " . $DonHang->MaDangKy .  "hãy ghi nhớ mã này để tra cứu thông tin đơn hàng";
            else
                $message = "Đặt dịch vụ bị lỗi";
        }
        $ListDichVu = DichVuModel::listAll();
        $VIEW = "./views/DatDichVu.phtml";
        require("./template/template.phtml");
    }

    public function TraCuu()
    {
        $message = "";
        if (isset($_REQUEST["MaKH"])) {
            $MaKhachHang = $_REQUEST["MaKH"];
            $data = DonHangModel::find($MaKhachHang);
            if (empty($data)) {
                $message = "Mã khách hàng không hợp lệ. Vui lòng nhập lại.";
                $VIEW = "./views/TraCuu.phtml";
                require("./template/template.phtml");
            } else {
                $DV = DichVuModel::findByMaDV($data[0]->MaDV);
                $VIEW = "./views/ChiTietDonHang.phtml";
                require("./template/template.phtml");
            }
        } else {
            $VIEW = "./views/TraCuu.phtml";
            require("./template/template.phtml");
        }
    }

    public function HuyDonHang()
    {
        $message = "";
        if ($_REQUEST["TrangThai"] != "DAKHOITAO") {
            $data = array();
            $DonHang = new DonHangModel();
            $DonHang->TenKH = $_REQUEST["TenKH"];
            $DonHang->DienThoai = $_REQUEST["DienThoai"];
            $DonHang->DiaChi = $_REQUEST["DiaChi"];
            $DonHang->ThoiGianBD = $_REQUEST["ThoiGianBD"];
            $DonHang->ThoiGianKT = $_REQUEST["ThoiGianKT"];
            $DonHang->TrangThai = $_REQUEST["TrangThai"];
            $DonHang->SoLuong = $_REQUEST["SoLuong"];
            $DonHang->GhiChu = $_REQUEST["GhiChu"];
            $DonHang->ThanhTien = $_REQUEST["ThanhTien"];
            $DonHang->MaDangKy = $_REQUEST["MaDangKy"];
            $data[] = $DonHang;
            $DV = array();
            $DichVu = new DichVuModel();
            $DichVu->TenDV = $_REQUEST["TenDV"];
            $DichVu->DonGia = $_REQUEST["DonGia"];
            $DV[] = $DichVu;
            $message = "Vi trang thai don hang la " . $_REQUEST["TrangThai"] . " nen khong the huy don hang duoc";
            $VIEW = "./views/ChiTietDonHang.phtml";
            require("./template/template.phtml");
        } else {
            $tt = "HUY";
            DonHangModel::update($tt, $_REQUEST["MaDangKy"]);
            header("location: index.php?action=XemVaCapNhapDonHang");
        }
    }
}
