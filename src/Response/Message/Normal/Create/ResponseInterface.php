<?php
namespace Teleconcept\Sms\Client\Response\Message\Normal\Create;

use Teleconcept\Sms\Client\Response\Message\Normal\MessageInterface as NormalMessage;
use Teleconcept\Sms\Client\Response\BaseResponseInterface;

/**
 * Interface ResponseInterface
 * @package Teleconcept\Sms\Client\Response\Message\Normal\Send
 */
interface ResponseInterface extends BaseResponseInterface
{
    /**
     * @return NormalMessage[]|array
     */
    public function messages(): array;
}
