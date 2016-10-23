<?php 
/**
 *
 * HASHAN KULASINGHE
 * HASHK99@GMAIL.COM
 * 25 09 2016
 *
 */

namespace Domain\roles;
 
use Illuminate\Database\QueryException; 
use App\Role;
use Domain\roles\RoleRepository; 

use Domain\roles\exceptions\RoleNotFoundException;
use Domain\roles\exceptions\RolesNotFoundException;

use Domain\exceptions\AlreadyExistsException;
use Domain\exceptions\UnknownIssueException;

class RoleService {
 
 
    private $role_repository; 

    public function __construct(){ 

        /**
         * Create instance of RoleRepository 
         * Namespace used.class will import automatically when instiate.
         */

        $this->role_repository = new RoleRepository();
   
    }
 
    public function all($request){

        $data = $this->role_repository->allRoles($request);
         
        if($data){  
            return $data->all(); 
        } else {
            throw new RolesNotFoundException();
        } 
    } 
 

    public function getById($request, $role_id){
 
        //Find role data
        $data = $this->role_repository->getById($role_id);

        if($data){
            return $data;
        } else {
            throw new RoleNotFoundException();
        } 

    }

    public function getByConst($request, $const){
 
        //Find role data
        $data = $this->role_repository->getByConst($const);

        if($data){
            return $data;
        } else {
            throw new RoleNotFoundException();
        } 

    }
   
    public function make($request, $data){
        
        //Find role data
      /*  $existsData = $this->role_repository->getByIds($data['slide_id'], $data['image_id']);*/
        // if($existsData){
        //     throw new AlreadyExistsException; 
        // }
        /*
         * casted model object
         */

        $role =$this->castToObj($data);
    
        try{
            //Save object  
            $insert_data = $this->create($role);
        }catch(QueryException $ex){
            if($ex->getCode() == 23000)
                throw new AlreadyExistsException;
            else
                throw new UnknownIssueException;    
        }

        return $insert_data;

    }

    public function create(Role $role){
        return $this->role_repository->create($role);
    }
 
    public function update(Role $role,$data){ 
          
        try{ 
            //UPDATE THE TB ROW
            $return_data=$this->role_repository->update($role,$data->toArray());
           
        }catch(QueryException $ex){ 
            if($ex->getCode() == 23000)
                throw new AlreadyExistsException;
            else
                throw new UnknownIssueException;    
        }
 
        return $return_data;

    }

    public function delete(Role $role,$request){ 
         
        //delete THE TB ROW
        $return_data=$this->role_repository->delete($role);

        return $return_data;

    }

    //HELPERS
    

    /**
     * make the role object
     *
     */

    public function castToObj ($data){

        $role = new Role();
        
        if(isset($data['role_id']))
            $role['role_id']=$data['role_id'];
        if(isset($data['name']))
            $role['name']=$data['name'];
        if(isset($data['const']))
            $role['const']=$data['const'];
        if(isset($data['description']))
            $role['description']=$data['description'];
        
      
        if(isset($data['created_at']))
            $role['created_at']=$data['created_at'];
        if(isset($data['updated_at']))
            $role['updated_at']=$data['updated_at'];
        if(isset($data['deleted_at']))
            $role['deleted_at']=$data['deleted_at']; 

        return $role;

    } 
 
}  