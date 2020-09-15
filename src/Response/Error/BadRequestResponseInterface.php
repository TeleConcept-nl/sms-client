<?php
namespace Teleconcept\Sms\Client\Response\Error;


use Teleconcept\Sms\Client\Response\ResponseInterface;

/**
 * Class NotFoundResponse
 * @package Teleconcept\Sms\Client\Response\Error
 */
interface BadRequestResponseInterface extends ResponseInterface
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
