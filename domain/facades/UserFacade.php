<?php  
/**
 *
 * HASHAN KULASINGHE
 * HASHK99@GMAIL.COM
 * 25 09 2016
 *
 */

namespace domain\facades;
 
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\ServiceProvider;

/**
 * Class UserDetailFacade
 * @package \Facades
 */
class UserFacade extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Domain\users\UserService';
    } 

} 