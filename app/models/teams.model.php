<?php

class TeamsModel{
    private $db;

    function __construct()
    {
        $this->db= new PDO ('mysql:host=localhost;'.'dbname=db_stickers;charset=utf8','root','');
    }

    function getAllTeams()
    {
        $query=$this->db->prepare("SELECT * FROM selecciones");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function getAll()
    {
        $all= new stdClass();
        $query=$this->db->prepare('SELECT * FROM selecciones');
        $query->execute();
        $all->teams= $query->fetchAll(PDO::FETCH_OBJ);
        $query=$this->db->prepare('SELECT * FROM figuritas');
        $query->execute();
        $all->stickers=$query->fetchAll(PDO::FETCH_OBJ);
        return $all;
    }

    function insert($pais, $tmp_name)
    {
        $newpath=$this->uploadImage($tmp_name);
        $query=$this->db->prepare("INSERT INTO selecciones (pais, bandera_dir) VALUES (?,?)");
        $query->execute([$pais, $newpath]);
    }

    private function uploadImage($image_dir)
    {
        $target='images/banderas/'. uniqid() .'.png';
        move_uploaded_file($image_dir,$target);
        return $target;
    }

    function delete($pais){
        $query=$this->db->prepare("DELETE FROM selecciones WHERE pais=?");
        $query->execute([$pais]);
    }

    function getIndividualInfo($pais)
    {
        $query=$this->db->prepare("SELECT * FROM selecciones WHERE pais=?");
        $query->execute([$pais]);
        $Info=$query->fetchAll(PDO::FETCH_OBJ);
        return $Info;
    }

    function getPaisById($id)
    {
        $query=$this->db->prepare("SELECT pais FROM selecciones WHERE id_pais=?");
        $query->execute([$id]);
        $pais=$query->fetch(PDO::FETCH_OBJ);
        return $pais->pais;
    }

    function getStickersByTeam($pais)
    {
        $query=$this->db->prepare("SELECT b.* FROM selecciones a INNER JOIN figuritas b ON a.id_pais=b.id_pais WHERE a.pais=?");
        $query->execute([$pais]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    //SETTERS
    function setBanderaDirById($id,$bandera_dir)
    {
        $pathimg= $this->uploadImage($bandera_dir);
        $query=$this->db->prepare("UPDATE selecciones SET bandera_dir=? WHERE id_pais=?");
        $query->execute([$pathimg,$id]);
    }

    function setPaisById($id,$pais)
    {
        $query=$this->db->prepare("UPDATE selecciones SET pais=? WHERE id_pais=?");
        $query->execute([$pais,$id]);
    }
}