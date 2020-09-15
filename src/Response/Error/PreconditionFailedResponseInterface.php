<?php
namespace Teleconcept\Sms\Client\Response\Error;


use Teleconcept\Sms\Client\Response\ResponseInterface as Response;

/**
 * Class PreconditionFailedResponse
 * @package Teleconcept\Sms\Client\Response\Error
 */
interface PreconditionFailedResponseInterface extends Response
{
    /**
     * @return array
     */
    public function detail(): array;

    /**
     * @return string
     */
    public function documentation(): string;
}
