<?php
namespace Teleconcept\Sms\Client\Response\Error;

use Teleconcept\Sms\Client\Response\ResponseInterface as Response;

/**
 * Class UnauthorizedResponse
 * @package Teleconcept\Sms\Client\Response\Error
 */
interface UnauthorizedResponseInterface extends Response
{
    /**
     * @return string
     */
    public function detail(): string;
}
