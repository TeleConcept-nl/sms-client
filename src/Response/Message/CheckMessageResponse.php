<?php
namespace Teleconcept\Sms\Client\Response\Message;

use Psr\Http\Message\ResponseInterface;
use function json_decode;

/**
 * Class CheckMessageResponse
 * @package Teleconcept\Sms\Client\Response\Message
 */
class CheckMessageResponse implements CheckMessageResponseInterface
{
    /**
     * @var Message
     */
    private $message;

    /**
     * SendMessageResponse constructor.
     * @param ResponseInterface $response
     */
    public function __construct(ResponseInterface $response)
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
        return new Message(
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
