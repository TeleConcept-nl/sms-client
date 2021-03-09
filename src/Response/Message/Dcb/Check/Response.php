<?php
namespace Teleconcept\Sms\Client\Response\Message\Dcb\Check;

use Teleconcept\Sms\Client\Response\Message\Dcb\MessageInterface as DcbMessage;
use function json_decode;

/**
 * Class CheckMessageResponse
 * @package Teleconcept\Sms\Client\Response\Message
 */
class Response implements ResponseInterface
{
    private DcbMessage $message;

    /**
     * Response constructor.
     * @param \Psr\Http\Message\ResponseInterface $response
     */
    public function __construct(\Psr\Http\Message\ResponseInterface $response)
    {
        $content = json_decode($response->getBody()->getContents(), true);
        $this->message = $this->createMessage($content['data']);
    }

    /**
     * @param array $message
     * @return DcbMessage
     */
    private function createMessage(array $message): DcbMessage
    {
        return new \Teleconcept\Sms\Client\Response\Message\Dcb\Message(
            $message['reference'],
            $message['status'],
            $message['originator'],
            $message['recipient'],
            $message['operator'],
            $message['body']
        );
    }

    /**
     * @return DcbMessage
     */
    final public function message(): DcbMessage
    {
        return $this->message;
    }
}
