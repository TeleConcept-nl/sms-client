<?php
namespace Teleconcept\Sms\Client\Response\Message\Dcb\Check;

use Teleconcept\Sms\Client\Response\BaseResponseInterface;
use Teleconcept\Sms\Client\Response\Message\Dcb\MessageInterface as DcbMessage;

/**
 * Interface CheckMessageResponseInterface
 * @package Teleconcept\Sms\Client\Response\Message
 */
interface ResponseInterface extends BaseResponseInterface
{
    /**
     * @return DcbMessage
     */
    public function message(): DcbMessage;
}
