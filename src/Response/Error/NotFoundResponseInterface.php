<?php
namespace Teleconcept\Packages\Sms\Client\Response\Error;


use Teleconcept\Packages\Sms\Client\Response\ResponseInterface;

/**
 * Class NotFoundResponse
 * @package Teleconcept\Packages\Sms\Client\Response\Error
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
