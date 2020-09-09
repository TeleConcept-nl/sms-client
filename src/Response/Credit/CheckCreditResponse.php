<?php
namespace Teleconcept\Packages\Sms\Client\Response\Credit;

use Psr\Http\Message\ResponseInterface;
use function json_decode;

/**
 * Class CheckMessageResponse
 * @package Teleconcept\Packages\Sms\Client\Response\Message
 */
class CheckCreditResponse implements CheckCreditResponseInterface
{
    /**
     * @var Purchase[]
     */
    private $purchases = [];

    /**
     * @var int
     */
    private $available;

    /**
     * @var int
     */
    private $total;

    /**
     * SendMessageResponse constructor.
     * @param ResponseInterface $response
     */
    public function __construct(ResponseInterface $response)
    {
        $content = json_decode($response->getBody()->getContents(), true);

        foreach ($content['data']['purchases'] as $purchase) {
            $this->purchases[] = $this->createMessage($purchase);
        }

        $this->total = $content['data']['total'];
        $this->available = $content['data']['available'];
    }

    /**
     * @param array $message
     * @return Purchase
     */
    private function createMessage(array $message): Purchase
    {
        return new Purchase(
            $message['reference'],
            $message['total'],
            $message['available'],
            $message['created-at']
        );
    }

    /**
     * @return Purchase[]
     */
    final public function purchases(): array
    {
        return $this->purchases;
    }

    /**
     * @return int
     */
    final public function total(): int
    {
        return $this->total;
    }

    /**
     * @return int
     */
    final public function available(): int
    {
        return $this->available;
    }
}
