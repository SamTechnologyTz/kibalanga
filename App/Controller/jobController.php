
<?php
// php framework by SAM TECHNOLOGY.
// customise as you wish

require "App/Model/job.php"; 


class jobController 
{ 
    //  
    public function index() 
    { 
        //  
    } 

    public function readone($session_id) 
    { 
        $job = new job(); 

        $result = $job->readone($session_id);
 
        if ($result["status"] == "fail") { 
            return $result["message"]; 
        } 
 
        // user info 
        return $result; 
         
    } 

    public function readAll() 
    { 
        $job = new job(); 

        $users = $job->readAll(); 

        //  
        return $users; 

    } 


    public function create($request) 
    { 
        $job = new job();

        $name = $request["name"]; 
        $description = $request["description"]; 
        $extra = $request["extra"]; 

        $result = $job->create($name, $description, $extra); 

        return $result; 
    }

    public function update($request) 
    {
        $job = new job();

        // $item1 = $request["item1"];
        // $item2 = $request["item2"];
        // $item3 = $request["item3"];

        // $result = $job->update($item1, $item2, $item3);

        if ($result["status"] == "success") {
           return "update successful!";
        }
        return $result["message"];
    }
    
    public function delete($request)
    {
        $job = new job();

        $delete = $request["id"];

        $result = $job->delete($delete);

        if ($result["status"] == "success") {
           return $request["message"];
        }
        return $result["message"];
    }
}
