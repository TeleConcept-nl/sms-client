<?php
namespace Teleconcept\Sms\Client\Response\Error;

use Teleconcept\Sms\Client\Response\BaseResponseInterface;

/**
 * Interface BadRequestResponseInterface
 * @package Teleconcept\Sms\Client\Response\Error
 */
interface BadRequestResponseInterface extends BaseResponseInterface
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
