<?php
namespace Teleconcept\Sms\Client\Request\Message\Dcb\Check;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Uri;
use Teleconcept\Sms\Client\ClientInterface as SmsClient;
use Teleconcept\Sms\Client\Exception\ValidationException;
use Teleconcept\Sms\Client\Request\Request as BaseRequest;
use Teleconcept\Sms\Client\Response\BaseResponseInterface as Response;
use function GuzzleHttp\Psr7\stream_for;
use function is_int;
use function is_string;
use function json_encode;

/**
 * Class CheckRequest
 * @package Teleconcept\Sms\Client\Request\Message
 */
class Request extends BaseRequest implements RequestInterface
{
    protected array $headers = [
        'Content-Type' => 'application/json',
        'System-Authorization' => null
    ];

    /**
     * CreateRequest constructor.
     * @param SmsClient $client
     * @param array $options
     */
    public function __construct(SmsClient $client, array $options = [])
    {
        parent::__construct('GET', '/messages/dcb');
        $this->client = $client;
        $this->options = $options;
    }

    /**
     * @inheritDoc
     */
    final public function setReference(string $reference): RequestInterface
    {
        return $this->setOption('reference', $reference);
    }

    /**
     * @param string $authorizationToken
     * @return RequestInterface
     */
    final public function setRequiredHeaders(string $authorizationToken): RequestInterface
    {
        return $this->setHeader('System-Authorization', $authorizationToken);
    }


    /**
     * @return Response
     * @throws ValidationException
     * @throws GuzzleException
     */
    final public function send(): Response
    {
        $errors = $this->validate();

        if (!empty($errors)) {
            throw new ValidationException($errors);
        }

        $body = stream_for(json_encode($this->options));
        $uri = new Uri('/messages/dcb/'. $this->options['reference']);
        $request = $this
            ->withUri($uri)
            ->withBody($body);

        foreach ($this->headers as $header => $value) {
            $request = $request->withAddedHeader($header, $value);
        }

        return $this->client->checkDcbMessage($request);
    }

    /**
     * @return array
     */
    private function validate(): array
    {
        $options = $this->options;
        $headers = $this->headers;
        $errors = [];

        if (!is_string($headers['System-Authorization'])) {
            $errors['apiKey'] = 'was not set.';
        }

        if (!isset($options['reference'])) {
            $errors['reference'] = 'was not set.';
        }

        return $errors;
    }
}
