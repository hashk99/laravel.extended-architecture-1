<?php
/**
 *
 * HASHAN KULASINGHE
 * HASHK99@GMAIL.COM
 * 25 09 2016
 *
 */

namespace Domain\users;
 
use App\User;
use DB;
use Hash;

use Illuminate\Http\Response;

class UserRepository {
   
    public function allUsers($request)
    {

      $limit = $request->limit?:10;
      $users = User::paginate($limit);
      return $users;
           
    }

    public function create($user){ 
        return User::create($user);
    } 

    public function getById($user_id, $with_trash = false, $filters=false){
 
      return User::where('id',$user_id)
                ->with('user_role')
                ->with('added_devices') 
                ->when($with_trash, function ($query)  { 
                    return $query->withTrashed();
                })
                ->when($filters, function ($query) use ($filters)  { 
                    if(isset($filters['email'])){ 
                      return $query->where('email',$filters['email']);
                    }
                })
                ->first();
    }
    
    public function getByRoleId($role_id, $with_trash, $filters=false){
        
       $query=User::where('role_id',$role_id)
                ->with('user_role')
                
                ->with('user_role')
                ->with('added_devices') 
                ->when($with_trash, function ($query)  { 
                    return $query->withTrashed();
                })
                ->when($filters, function ($query) use ($filters)  { 
                    if(isset($filters['email'])){ 
                      return $query->where('email',$filters['email']);
                    }
                })
                ->get();
                return $query;
                
    }

    public function updatePassword($user_id, $password){
        return User::where('id', $user_id)
                ->update(['password' => Hash::make($password)]); 
    }

    public function update(User $user,$data){ 
      $user->update($data);
      return $this->getById($user->id );
    }

    public function delete(User $user){ 
      $user->delete();
    }
}