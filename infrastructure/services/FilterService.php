<?php 
/**
 *
 * HASHAN KULASINGHE
 * HASHK99@GMAIL.COM
 * 25 09 2016
 *
 */

namespace Infrastructure\services;
 
use Illuminate\Database\QueryException;   
  

class FilterService {
    
    public function get ($request){

        $filters = array();
        
        if(isset($request->email)){
        	if($request->email != null)
            	$filters['email']=$request->email;
        }
        
        if(isset($request->date)){
        	if($request->date != null)
            	$filters['date']=$request->date;
        }
        if(isset($request->location_date)){
            if($request->location_date != null)
                $filters['location_date']=$request->location_date;
        }
        
        return $filters;

    } 
 
}  