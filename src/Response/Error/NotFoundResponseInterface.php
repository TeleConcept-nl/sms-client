<?php
namespace Teleconcept\Sms\Client\Response\Error;

use Teleconcept\Sms\Client\Response\BaseResponseInterface;

/**
 * Interface NotFoundResponseInterface
 * @package Teleconcept\Sms\Client\Response\Error
 */
interface NotFoundResponseInterface extends BaseResponseInterface
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
