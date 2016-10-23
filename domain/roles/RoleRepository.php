<?php
/**
 *
 * HASHAN KULASINGHE
 * HASHK99@GMAIL.COM
 * 25 09 2016
 *
 */

namespace Domain\roles;
 
use App\Role;

use Illuminate\Http\Response;

class RoleRepository {
   
    public function allRoles($request)
    {

      $limit = $request->limit?:10;
      $roles = Role::paginate($limit);
      return $roles;
           
    }

    public function create(Role $role){
        return Role::create($role->toArray());
    } 

    public function getById($role_id){
 
      return Role::where('role_id',$role_id) 
                ->first();
    }

    public function getByConst($const){
 
      return Role::where('const',$const) 
                ->first();
    }

    public function update(Role $role,$data){ 
      $role->update($data);
      return $this->getById($role->role_id );
    }
 
}