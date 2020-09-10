<?php
namespace Teleconcept\Packages\Sms\Client\Response\Error;

use Psr\Http\Message\ResponseInterface as Response;
use function json_decode;

/**
 * Class UnauthorizedResponse
 * @package Teleconcept\Packages\Sms\Client\Response\Error
 */
class UnauthorizedResponse implements UnauthorizedResponseInterface
{
    /**
     * @var string
     */
    private $detail;

    /**
     * SendMessageResponse constructor.
     * @param Response $response
     */
    public function __construct(Response $response)
    {
        $content = json_decode($response->getBody()->getContents(), true);
        $this->detail = $content['message'];
    }

    /**
     * @return string
     */
    final public function detail(): string
    {
        return $this->detail;
    }
}
