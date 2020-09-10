<?php
namespace Teleconcept\Packages\Sms\Client\Response\Error;

use Teleconcept\Packages\Sms\Client\Response\ResponseInterface as Response;

/**
 * Class UnauthorizedResponse
 * @package Teleconcept\Packages\Sms\Client\Response\Error
 */
interface UnauthorizedResponseInterface extends Response
{
    /**
     * @return string
     */
    public function detail(): string;
}
