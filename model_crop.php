<?php
    include (__DIR__ . '/model/db.php');

    
    function addCrops ($n, $d, $q) {
        global $db;
        $results = "Not added";

        $stmt = $db->prepare("INSERT INTO crops SET cropname = :cropname, cropplanted = :p, cropqty = :cropqty");

        $binds = array(
            ":cropname" => $n,
            ":p" => $d,
            ":cropqty" => $q
        );
        
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = 'Crop Added!';
        }
        
        return ($results);
    }


    function getCrops () {
        global $db;
        
        $results = [];

        $stmt = $db->prepare("SELECT cropid, cropname, p, cropqty FROM crops ORDER BY cropid"); 
        
        if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
             $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                 
         }
         
         return ($results);
    }

    
    function getCrop ($cropid) {
        global $db;
       
       $results = [];
       
       $stmt = $db->prepare("SELECT cropid, cropname, p, cropqty FROM crops WHERE cropid=:cropid");
       $stmt->bindValue(':cropid', $cropid);
      
       if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
                       
        }
        
        return ($results);
   }

           

    
    function updateCrop ($cropid, $cropname, $cropqty, $p) {
        global $db;

        $results = "";
        
        $stmt = $db->prepare("UPDATE crops SET cropname = :cropname, cropqty = :cropqty, p = :p WHERE cropid =:cropid");
        
        $stmt->bindValue(':cropid', $cropid);
        $stmt->bindValue(':cropname', $cropname);
        $stmt->bindValue(':cropqty', $cropqty);
        $stmt->bindValue(':p', $p);
        
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = 'Crop Updated!';
        }
        
        return ($results);
    }

        
    function deleteCrop ($cropid) {
        global $db;
        
        $results = "Data was not deleted";
    
        $stmt = $db->prepare("DELETE FROM cropsInventory WHERE cropid=:cropid");
        
        $stmt->bindValue(':cropid', $cropid);
            
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = 'Crop Deleted';
        }
        
        return ($results);
    }

 
   function searchCrops ($column, $searchValue) {
    global $db;
      
     $results = [];
      $stmt = $db->prepare("SELECT cropid, cropname, p, cropqty FROM crops WHERE $column LIKE :search");
      $search = '%'.$searchValue.'%';
      
      $stmt->bindValue(':search', $search);
     
      
      if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
           $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

       }

       return ($results);
}

function sortCrops ($column, $order) {
      
    global $db;
     
     $results = [];
     
    
     $stmt = $db->prepare("SELECT cropid, cropname, p, cropqty FROM crops ORDER BY $column $order");
     
     
     if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
          $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                     
      }
      
      return ($results);
}


function getFieldNames () {
    $fieldNames = ['cropname', 'p' ,'cropqty'];
    
    return ($fieldNames);
    
}


/* 
function checkLogin ($userName, $password) {
    global $db;
    $stmt = $db->prepare("SELECT id FROM users WHERE userName =:userName AND userPassword = :password");

    $stmt->bindValue(':userName', $userName);
    $stmt->bindValue(':password', sha1($password));
    
    $stmt->execute ();
   
    return( $stmt->rowCount() > 0);
    
} */