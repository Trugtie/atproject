<?php

class KhachHang{
    private $makh;
    private $email;
    private $username;
    private $password;
    private $ho;
    private $ten;
    private $sdt;
    private $diachi;
    
    public function __construct($ma, $email, $user, $pw, $ho, $ten, $sdt, $dc)
    {
        $this->makh = $ma;
        $this->email = $email;
        $this->username = $user;
        $this->password = $pw;
        $this->ho = $ho;
        $this->ten = $ten;
        $this->sdt = $sdt;
        $this->diachi = $dc;
    }

    public function get_makh(){
        return $this->makh;
    }

    public function get_email(){
        return $this->email;
    }

    public function get_username(){
        return $this->username;
    }

    public function get_password(){
        return $this->password;
    }

    public function get_ho(){
        return $this->ho;
    }

    public function get_ten(){
        return $this->ten;
    }

    public function get_sdt(){
        return $this->sdt;
    }

    public function get_diachi(){
        return $this->diachi;
    }

}
