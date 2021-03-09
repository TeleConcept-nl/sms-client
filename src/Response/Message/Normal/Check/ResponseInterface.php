<?php
namespace Teleconcept\Sms\Client\Response\Message\Normal\Check;

use Teleconcept\Sms\Client\Response\BaseResponseInterface;
use Teleconcept\Sms\Client\Response\Message\Normal\MessageInterface as NormalMessage;

/**
 * Interface CheckMessageResponseInterface
 * @package Teleconcept\Sms\Client\Response\Message
 */
interface ResponseInterface extends BaseResponseInterface
{
    /**
     * @return NormalMessage
     */
    public function message(): NormalMessage;
}
