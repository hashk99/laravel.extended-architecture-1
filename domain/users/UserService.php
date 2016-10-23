<?php 
/**
 *
 * HASHAN KULASINGHE
 * HASHK99@GMAIL.COM
 * 25 09 2016
 *
 */

namespace Domain\users;
 
use Illuminate\Database\QueryException; 
use App\User;
use Domain\users\UserRepository; 

use Domain\users\exceptions\UserNotFoundException;
use Domain\users\exceptions\UsersNotFoundException;

use Domain\exceptions\AlreadyExistsException;
use Domain\exceptions\UnknownIssueException;

class UserService {
 
 
    private $user_repository; 

    public function __construct(){ 

        /**
         * Create instance of UserRepository 
         * Namespace used.class will import automatically when instiate.
         */

        $this->user_repository = new UserRepository();
   
    }
 
    public function all($request){

        $data = $this->user_repository->allUsers($request);
         
        if($data){  
            return $data->all(); 
        } else {
            throw new UsersNotFoundException();
        } 
    } 
 

    public function getById($request, $user_id, $with_trash = false, $filters=false){
 
        //Find user data
        $data = $this->user_repository->getById($user_id, $with_trash, $filters);

        if($data){
            return $data;
        } else {
            throw new UserNotFoundException();
        } 

    }

    public function getByRoleId($request=false, $role_id, $with_trash = false, $filters){
 
        //Find user data
        $data = $this->user_repository->getByRoleId($role_id, $with_trash, $filters);

        if($data){
            return $data;
        } else {
            throw new UsersNotFoundException();
        } 

    }

   
    public function make($request, $data){
        
        //Find user data
      /*  $existsData = $this->user_repository->getByIds($data['slide_id'], $data['image_id']);*/
        // if($existsData){
        //     throw new AlreadyExistsException; 
        // }
        /*
         * casted model object
         */

        //$user =$this->castToObj($data);
        $user = $data;

        try{
            //Save object  
            $insert_data = $this->create($user);
        }catch(QueryException $ex){
            if($ex->getCode() == 23000)
                throw new AlreadyExistsException;
            else{ 
                throw new UnknownIssueException;    
            }
        }

        return $insert_data;

    }

    public function create($user){
        return $this->user_repository->create($user);
    }
 
    public function update(User $user,$data){ 
          
        try{ 
            //UPDATE THE TB ROW
            $return_data=$this->user_repository->update($user,$data->toArray());
           
        }catch(QueryException $ex){ 
            if($ex->getCode() == 23000)
                throw new AlreadyExistsException;
            else
                throw new UnknownIssueException;    
        }
 
        return $return_data;

    }

    public function updatePassword($user_id, $password){
        try{ 
            //UPDATE THE TB ROW
            $return_data=$this->user_repository->updatePassword($user_id, $password);
           
        }catch(QueryException $ex){   
            throw new UnknownIssueException;    
        }
 
        return $return_data;
    }

    public function delete(User $user,$request){ 
         
        //delete THE TB ROW
        $return_data=$this->user_repository->delete($user);

        return $return_data;

    }

    //HELPERS
    

    /**
     * make the user object
     *
     */

    public function castToObj ($data){

        $user = new User();
        
        if(isset($data['name']))
            $user['name']=$data['name'];
        if(isset($data['email']))
            $user['email']=$data['email'];
        if(isset($data['password']))
            $user['password']=$data['password'];
        if(isset($data['last_name']))
            $user['last_name']=$data['last_name'];
        if(isset($data['tp_number']))
            $user['tp_number']=$data['tp_number'];
        if(isset($data['address']))
            $user['address']=$data['address'];
        if(isset($data['role_id']))
            $user['role_id']=$data['role_id'];
      
        if(isset($data['created_at']))
            $user['created_at']=$data['created_at'];
        if(isset($data['updated_at']))
            $user['updated_at']=$data['updated_at'];
        if(isset($data['deleted_at']))
            $user['deleted_at']=$data['deleted_at']; 

        return $user;

    } 

}  