
    <?php
    // php framework by SAM TECHNOLOGY
    // Edit as you wish according to Documentation

    require "core/Database.php";
    
    class job
    {
        public function readone($id) 
        {
           $sam = new Database();
           $kibalanga = $sam->connect();
    
           try {
    
               $sql = "SELECT * FROM `jobs` WHERE id=:id";
               $stmt = $kibalanga->prepare($sql);
               $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    
               if ($stmt->execute()) {
                  $data = $stmt->fetch(PDO::FETCH_ASSOC);
                  
                  if (empty($data)) {
                     return "No data found!";
                  }
    
                  return $data;
               }
               
            } catch (PDOException $e){
               return "Error: " . $e->getMessage();
            }
        }
    
        public function readall()
        {
           $sam = new Database();
           $kibalanga = $sam->connect();
    
           try {
               $sql = "SELECT * FROM `jobs` ";
               $stmt = $kibalanga->prepare($sql);
    
               if ($stmt->execute()) {
                  $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                  
                  if (empty($data)) {
                     return "No data found!";
                  }
    
                  return $data;
               }
               
            } catch (PDOException $e){
               return "Error: " . $e->getMessage();
            }
        }
    
        public function create($name, $description, $extra) 
        {
            $sam = new Database();
            $kibalanga = $sam->connect();
    
            try {
                // Edit according to your database
                $sql = "INSERT INTO `jobs` SET name=:name, description=:description, extra=:extra";
                $stmt = $kibalanga->prepare($sql);
                $stmt->bindParam(":name", $name, PDO::PARAM_STR);
                $stmt->bindParam(":description", $description, PDO::PARAM_STR);
                $stmt->bindParam(":extra", $extra, PDO::PARAM_STR);
    
                if ($stmt->execute()) {
                   return [
                      "status" => "success",
                      "message" => "create successful!"
                   ];
                } else {
                   return [
                      "message" => "Error: ".$stmt->execute()
                   ];
                }
    
            } catch(PDOException $e) {
                return "Error: ".$e->getMessage();
            }
        }
    
        public function update($name, $description, $extra)
        {
          $sam = new Database();
          $kibalanga = $sam->connect();
    
          try {
             $sql = "UPDATE FROM `jobs` SET name=:name, description=:description, extra=:extra";
             $stmt = $kibalanga->prepare($sql);
             $stmt->bindParam(":name", $name, PDO::PARAM_STR);
             $stmt->bindParam(":descrption", $description, PDO::PARAM_STR);
             $stmt->bindParam(":extra", $extra, PDO::PARAM_STR);
    
             if ($stmt->execute()) {
                return [
                   "status" => "success",
                   "message" => "update successful!"
                ];
             } else {
                return ["message" => "upadte fail!"];
             }
    
          } catch (PDOException $e) {
             return $e->getMessage();
          }
        }
    
        public function delete($id)
        {
          $sam = new Database();
          $kibalanga = $sam->connect();
    
          try {
             $sql = "DELETE FROM `jobs` WHERE id=:id";
             $stmt = $kibalanga->prepare($sql);
             $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    
             if ($stmt->execute()) {
                return [
                   "status" => "success",
                   "message" => "Delete successful!"
                ];
             } else {
                return [
                   "message" => "Delete fail!"
                ];
             }
    
          } catch (\Throwable $e) {
             return $e->getMessage();
          }
        }
    }
    ?>
        
?>
    