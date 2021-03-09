<?php
namespace Teleconcept\Sms\Client\Response\Message\Normal\Check;

use Teleconcept\Sms\Client\Response\Message\Normal\MessageInterface as Message;
use function json_decode;

/**
 * Class CheckMessageResponse
 * @package Teleconcept\Sms\Client\Response\Message
 */
class Response implements ResponseInterface
{
    private Message $message;

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
     * @return Message
     */
    private function createMessage(array $message): Message
    {
        return new \Teleconcept\Sms\Client\Response\Message\Normal\Message(
            $message['reference'],
            $message['status'],
            $message['originator'],
            $message['recipient'],
            $message['encoding'],
            $message['body'],
            $message['scheduled-at'],
            $message['texts']
        );
    }

    /**
     * @return Message
     */
    final public function message(): Message
    {
        return $this->message;
    }
}
