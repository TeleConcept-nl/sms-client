<?php
namespace Teleconcept\Sms\Client\Response\Message\Normal\Create;

use Teleconcept\Sms\Client\Response\Message\Normal\MessageInterface as Message;
use function json_decode;

/**
 * Class SendMessageResponse
 * @package Teleconcept\Sms\Client\Response\Message\Normal\Send
 */
class Response implements ResponseInterface
{
    private array $messages = [];

    /**
     * Response constructor.
     * @param \Psr\Http\Message\ResponseInterface $response
     */
    public function __construct(\Psr\Http\Message\ResponseInterface $response)
    {
        $content = json_decode($response->getBody()->getContents(), true);
        foreach ($content['data']['messages'] as $message) {
            $this->messages[] = $this->createMessage($message);
        }
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
     * @return Message[]
     */
    final public function messages(): array
    {
        return $this->messages;
    }
}
