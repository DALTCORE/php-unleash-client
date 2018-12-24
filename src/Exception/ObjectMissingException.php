<?php

namespace DALTCORE\Exception;

use Exception;
use Throwable;
use function sprintf;

class ObjectMissingException extends Exception implements Throwable
{
    /**
     * ObjectMissingException constructor.
     *
     * @param string         $variable
     * @param int            $code
     * @param Exception|null $previous
     */
    public function __construct($variable, $code = 0, Exception $previous = null)
    {
        $message = sprintf("The %s object does not exist", $variable);
        parent::__construct($message, $code, $previous);
    }

    /**
     * Magic toString helper
     *
     * @return string
     */
    public function __toString(): string
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}
