<?php
namespace Teleconcept\Sms\Client\Response\Error;

use Psr\Http\Message\ResponseInterface as Response;
use function json_decode;

/**
 * Class NotFoundResponse
 * @package Teleconcept\Sms\Client\Response\Error
 */
class BadRequestResponse implements BadRequestResponseInterface
{
    /**
     * @var array
     */
    private $detail;

    /**
     * @var string
     */
    private $documentation;

    /**
     * SendMessageResponse constructor.
     * @param Response $response
     */
    public function __construct(Response $response)
    {
        $content = json_decode($response->getBody()->getContents(), true);
        $this->detail = $content['detail'];
        $this->documentation = $content['doc'];
    }

    /**
     * @return array
     */
    final public function detail(): array
    {
        return $this->detail;
    }

    /**
     * @return string
     */
    final public function documentation(): string
    {
        return $this->documentation;
    }
}
