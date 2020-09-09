<?php
namespace Teleconcept\Packages\Sms\Client\Response\Message;

use Psr\Http\Message\ResponseInterface;
use function json_decode;

/**
 * Class CreateResponse
 * @package Teleconcept\Packages\Sms\Client\Response\Message
 */
class SendMessageResponse implements SendMessageResponseInterface
{
    /**
     * @var Message[]
     */
    private $messages = [];

    /**
     * SendMessageResponse constructor.
     * @param ResponseInterface $response
     */
    public function __construct(ResponseInterface $response)
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
     * @return Message[]
     */
    final public function messages(): array
    {
        return $this->messages;
    }
}
