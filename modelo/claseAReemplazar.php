<?php
class ClaseAReemplazar {
                    
    public static function BuscarTodas()
    {
        $con  = Database::getInstance();
        $sql = "select * from [tablaAReemplazar]";
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
        $sql = "select * from [tablaAReemplazar] where Id = :p1";
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
        $sql = "insert into [tablaAReemplazar] ([propiedad1],[propiedad2]) values (:p1,:p2)";
        $claseAReemplazar = $con->db->prepare($sql);
        $params = array("p1" => $this->propiedad1, "p2" => $this->propiedad2);     
        $claseAReemplazar->execute($params);
    }

    public function Modificar()
    {
       $con = Database::getInstance();
        $sql = "UPDATE [tablaAReemplazar]
                    SET
                    [propiedad1] = :p1,
                    [propiedad2] = :p2
                    WHERE id = :p3";
        $autor = $con->db->prepare($sql);
        $params = array("p1" => $this->propiedad1,"p2" => $this->propiedad2,"p3" => $this->id);
        $autor->execute($params);
    }

}