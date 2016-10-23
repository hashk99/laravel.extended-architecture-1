<?php
/**
 *
 * HASHAN KULASINGHE
 * HASHK99@GMAIL.COM
 * 25 09 2016
 *
 */

namespace domain\roles\exceptions;

use Exception;

class RoleNotFoundException extends Exception{

    protected $title;

    public function __construct($title='Role Not Found', $message='Role Not Found ! please try again', $code = 0, Exception $previous = null) {

        $this->title = $title;

        parent::__construct($message, $code, $previous);

    }

    public function getTitle(){
        return $this->title;
    }

}