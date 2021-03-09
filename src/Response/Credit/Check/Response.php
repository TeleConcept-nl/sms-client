<?php
namespace Teleconcept\Sms\Client\Response\Credit\Check;

use Teleconcept\Sms\Client\Response\Credit\PurchaseInterface as Purchase;
use function json_decode;

/**
 * Class Response
 * @package Teleconcept\Sms\Client\Response\Credit\Check
 */
class Response implements ResponseInterface
{
    private array $purchases = [];
    private int $available;
    private int $total;

    /**
     * Response constructor.
     * @param \Psr\Http\Message\ResponseInterface $response
     */
    public function __construct(\Psr\Http\Message\ResponseInterface $response)
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
        return new \Teleconcept\Sms\Client\Response\Credit\Purchase(
            $message['reference'],
            $message['total'],
            $message['available'],
            $message['created-at']
        );
    }

    /**
     * @return Purchase[]|array
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
