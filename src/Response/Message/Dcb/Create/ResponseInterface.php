<?php
namespace Teleconcept\Sms\Client\Response\Message\Dcb\Create;

use Teleconcept\Sms\Client\Response\Message\Dcb\MessageInterface as DcbMessage;
use Teleconcept\Sms\Client\Response\BaseResponseInterface;

/**
 * Interface ResponseInterface
 * @package Teleconcept\Sms\Client\Response\Message\Normal\Send
 */
interface ResponseInterface extends BaseResponseInterface
{
    /**
     * @return DcbMessage
     */
    public function message(): DcbMessage;
}
