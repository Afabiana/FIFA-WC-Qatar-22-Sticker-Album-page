<?php
require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class StickersView{
    private $smarty;

    function __construct()
    {
        $this->smarty= new Smarty();
    }

    function showFormAdd($teams)
    {
        $this->smarty->assign('teams', $teams);
        $this->smarty->display('addSticker.tpl');
    }

    function showUpdateForm($stickerInfo, $teams, $error=null)
    {
        $this->smarty->assign('stickerinfo',$stickerInfo);
        $this->smarty->assign('teams',$teams);
        $this->smarty->assign('error',$error);
        $this->smarty->display('infoSticker.tpl');
    }
}