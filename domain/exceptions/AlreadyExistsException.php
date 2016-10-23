<?php
/**
 *
 * HASHAN KULASINGHE
 * HASHK99@GMAIL.COM
 * 25 09 2016
 *
 */

namespace domain\exceptions;

use Exception;

class AlreadyExistsException extends Exception{

    protected $title;

    public function __construct($title='Already Exists', $message='This data already added to database ! please try again', $code = 0, Exception $previous = null) {

        $this->title = $title;

        parent::__construct($message, $code, $previous);

    }

    public function getTitle(){
        return $this->title;
    }

}