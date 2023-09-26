<?php
class cphanloai extends controller
{
    private $phanloai;
    public function __construct()
    {
        $this->phanloai = $this->model("mphanloai");
    }
    public function getPhanloai()
    {
        echo json_encode($this->phanloai->getPhanloai());
    }
}
