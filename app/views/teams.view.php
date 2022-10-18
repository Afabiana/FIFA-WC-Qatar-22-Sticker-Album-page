<?php
require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class TeamsView{
    private $smarty;

    function __construct()
    {
        $this->smarty= new Smarty();
    }

    function showTeams($teams){
        $this->smarty->assign('teams',$teams);
        $this->smarty->display('teamsSection.tpl');
    }

    function ShowAll($teams, $stickers)
    {
        $this->smarty->assign('teams', $teams);
        $this->smarty->assign('stickers', $stickers);
        $this->smarty->display('home.tpl');
    }

    function showFormAdd()
    {
        $this->smarty->display('addTeam.tpl');
    }

    function showIndividualInfo($info)
    {
        $this->smarty->assign('info', $info);
        $this->smarty->display('infoTeam.tpl');
    }

    function showStickersByTeam($pais, $stickers)
    {
        $this->smarty->assign('pais', $pais);
        $this->smarty->assign('stickers', $stickers);
        $this->smarty->display('fullTeam.tpl');
    }

}