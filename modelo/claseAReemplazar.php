<?php
class ClaseAReemplazar {
                    
    public static function BuscarTodas()
    {
        $con  = Database::getInstance();
        $sql = "select * from [ClaseAReemplazar]";
        $queryClaseAReemplazar = $con->db->prepare($sql);
        $queryClaseAReemplazar->execute();
        $queryClaseAReemplazar->setFetchMode(PDO::FETCH_CLASS, '[ClaseAReemplazar]');

        $claseAReemplazarADevolver = array();
        
        foreach ($queryClaseAReemplazar as $m) {
            $claseAReemplazarADevolver[] = $m;
        }

        return $claseAReemplazarADevolver;
    }

    public static function Buscar($id)
    {
        $con  = Database::getInstance();
        $sql = "select * from [ClaseAReemplazar] where Id = :p1";
        $queryClaseAReemplazar = $con->db->prepare($sql);
        $params = array("p1" => $id);   
        $queryClaseAReemplazar->execute($params);
        $queryClaseAReemplazar->setFetchMode(PDO::FETCH_CLASS, '[ClaseAReemplazar]');                
        foreach ($queryClaseAReemplazar as $m) {
            return $m;
        }
        
    }

    public function Agregar()
    {
        $con  = Database::getInstance();
        $sql = "insert into [ClaseAReemplazar] ([propiedad1],[propiedad2]) values (:p1,:p2)";
        $claseAReemplazar = $con->db->prepare($sql);
        $params = array("p1" => $this->propiedad1, "p2" => $this->propiedad2);     
        $claseAReemplazar->execute($params);
    }

}