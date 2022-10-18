<?php

class StickersModel{
    private $db;

    function __construct()
    {
        $this->db= new PDO('mysql:host=localhost;'.'dbname=db_stickers;charset=utf8', 'root', '');
    }

    function getTeams()
    {
        $query=$this->db->prepare("SELECT * FROM selecciones");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    function insert($nombre, $apellido, $numero, $img_dir, $id_pais)
    {
        $pathimg= $this->uploadImage($img_dir);
        $query=$this->db->prepare("INSERT INTO figuritas (numero, nombre, apellido, image_dir, id_pais) VALUES (?,?,?,?,?)");
        $query->execute([$numero, $nombre, $apellido, $pathimg, $id_pais]);
    }

    private function uploadImage($image_dir)
    {
        $target='images/figuritas/'. uniqid() .'.png';
        move_uploaded_file($image_dir,$target);
        return $target;
    }

    function delete($nombre, $apellido)
    {
        $query=$this->db->prepare("DELETE FROM figuritas WHERE nombre=? && apellido=?");
        $query->execute([$nombre,$apellido]);
    }

    function getIndividualInfo($nombre,$apellido)
    {
        $all= new stdClass();
        $query=$this->db->prepare("SELECT b.pais, a.* FROM figuritas a INNER JOIN selecciones b ON a.id_pais=b.id_pais WHERE nombre=? && apellido=?");
        $query->execute([$nombre, $apellido]);
        $all->StickerInfo=$query->fetchAll(PDO::FETCH_OBJ);
        $query=$this->db->prepare("SELECT * FROM selecciones");
        $all->teams=$query->fetchAll(PDO::FETCH_OBJ);
        return $all;
    }

    public function getNamesById($id)
    {
        $query=$this->db->prepare("SELECT figuritas.nombre, figuritas.apellido FROM figuritas WHERE numero=?");
        $query->execute([$id]);
        $names=$query->fetchAll(PDO::FETCH_OBJ);
        return $names;
    }
    //SETTERS
    public function setNamebyId($id, $nombre)
    {
        $query=$this->db->prepare("UPDATE figuritas SET nombre=? WHERE numero=?");
        $query->execute([$nombre, $id]);
    }

    public function setApellidobyId($id, $apellido)
    {
        $query=$this->db->prepare("UPDATE figuritas SET apellido=? WHERE numero=?");
        $query->execute([$apellido, $id]);
    }

    public function setSeleccionbyId($id,$seleccion)
    {
        $query=$this->db->prepare("UPDATE figuritas SET id_pais=? WHERE numero=?");
        $query->execute([$seleccion, $id]);
    }

    public function setImageDirbyId($id,$image_dir)
    {
        $pathimg= $this->uploadImage($image_dir);
        $query=$this->db->prepare("UPDATE figuritas SET image_dir=? WHERE numero=?");
        $query->execute([$pathimg, $id]);
    }

    public function setNumerobyId($id,$numero)
    {
        $query=$this->db->prepare("UPDATE figuritas SET numero=? WHERE numero=?");
        $query->execute([$numero, $id]);
    }

    public function alreadyExists($numero)
    {
        $query=$this->db->prepare("SELECT * FROM figuritas WHERE numero=?");
        $query->execute([$numero]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }


}