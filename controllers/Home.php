<?php

class HomeController
{
    public function index()
    {
        $VIEW = "./views/TrangChu.phtml";
        require("./template/template.phtml");
    }

    public function DangNhap()
    {
        $message = "";
        if (isset($_REQUEST["TenTK"])) {
            $TenTK = $_REQUEST["TenTK"];
            $MatKhau = $_REQUEST["MatKhau"];
            $rs = TaiKhoanModel::DangNhap($TenTK, $MatKhau);
            if (empty($rs)) {
                $message = "Tên tài khoản hoặc mật khẩu không chính xác. Vui lòng nhập lại. ";
            } else {
                $_SESSION['user'] = $rs[0];
                header("location: index.php");
            }
        }
        $VIEW = "./views/DangNhap.phtml";
        require("./template/template.phtml");
    }

    public function DangXuat()
    {
        unset($_SESSION['user']);
        header("location: index.php");
    }
}
