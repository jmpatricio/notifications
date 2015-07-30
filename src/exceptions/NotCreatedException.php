<?php
/**
 * NotCreatedException file
 *
 * @package     Jmpatricio\Notifications\Exceptions
 * @file        NotCreatedException.php
 * @createdby   joao
 * @createdon   2015/07/29
 * @copyright   Copyright (c) UCADEMICS 2015, All rights reserved.
 * @since
 */


namespace Jmpatricio\Notifications\Exceptions;


/**
 * Class NotCreatedException
 * @since
 */
class NotCreatedException extends \Exception
{
    /**
     * Construct the exception
     * @link http://php.net/manual/en/exception.construct.php
     * @param string $message [optional] The Exception message to throw.
     * @param int $code [optional] The Exception code.
     * @param \Exception $previous [optional] The previous exception used for the exception chaining. Since 5.3.0
     */
    public function __construct($message = "", $code = 0, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}