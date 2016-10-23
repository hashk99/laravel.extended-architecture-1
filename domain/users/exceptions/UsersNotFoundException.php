<?php
/**
 *
 * HASHAN KULASINGHE
 * HASHK99@GMAIL.COM
 * 25 09 2016
 *
 */

namespace domain\users\exceptions;

use Exception;

class UsersNotFoundException extends Exception{

    protected $title;

    public function __construct($title='Users Not Found', $message='Users Not Found ! please try again', $code = 0, Exception $previous = null) {

        $this->title = $title;

        parent::__construct($message, $code, $previous);

    }

    public function getTitle(){
        return $this->title;
    }

}