<?php
class FeedBack{
    private $mafb;
    private $mota;
    private $thoigian;

    public function __construct($ma, $mota, $tg)
    {
        $this->mafb = $ma;
        $this->mota = $mota;
        $this->thoigian = $tg;
    }

    public function getMaFb(){
        return $this->mafb;
    }

    public function setMaFb($ma){
        $this->mafb = $ma;
    }

    public function getMota(){
        return $this->mota;
    }

    public function setMota($mota){
        $this->mota = $mota;
    }

    public function getThoiGian(){
        return $this->thoigian;
    }

    public function setThoiGian($tg){
        $this->thoigian = $tg;
    }
}
?>