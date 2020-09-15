<?php
namespace Teleconcept\Sms\Client\Response\Error;


use Teleconcept\Sms\Client\Response\ResponseInterface;

/**
 * Class NotFoundResponse
 * @package Teleconcept\Sms\Client\Response\Error
 */
interface NotFoundResponseInterface extends ResponseInterface
{
    /**
     * @return string
     */
    public function detail(): string;

    /**
     * @return string
     */
    public function documentation(): string;
}
