<?php  
/**
 *
 * HASHAN KULASINGHE
 * HASHK99@GMAIL.COM
 * 25 09 2016
 *
 */

namespace Infrastructure\facades;
 
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\ServiceProvider;

/**
 * Class UserDetailFacade
 * @package \Facades
 */
class FilterFacade extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Infrastructure\services\FilterService';
    } 

} 