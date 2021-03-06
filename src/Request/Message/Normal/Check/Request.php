<?php
namespace Teleconcept\Sms\Client\Request\Message\Normal\Check;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Uri;
use Teleconcept\Sms\Client\ClientInterface as SmsClient;
use Teleconcept\Sms\Client\Exception\ValidationException;
use Teleconcept\Sms\Client\Request\Request as BaseRequest;
use Teleconcept\Sms\Client\Response\BaseResponseInterface as Response;
use Teleconcept\Sms\Client\Response\Message\Normal\Check\ResponseInterface as CheckNormalMessageResponse;
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
    /**
     * CreateRequest constructor.
     * @param SmsClient $client
     * @param array $options
     */
    public function __construct(SmsClient $client, array $options = [])
    {
        parent::__construct('GET', '/messages/normal');
        $this->client = $client;
        $this->options = $options;
    }

    /**
     * @param string $authorizationToken
     * @param int $organizationId
     * @return RequestInterface
     */
    final public function setRequiredHeaders(string $authorizationToken, int $organizationId): RequestInterface {
        return $this
            ->setHeader('Authorization', $authorizationToken)
            ->setHeader('Organization', $organizationId);
    }

    /**
     * @inheritDoc
     */
    final public function setReference(string $reference): RequestInterface
    {
        return $this->setOption('reference', $reference);
    }

    /**
     * @return CheckNormalMessageResponse
     * @throws ValidationException
     * @throws GuzzleException
     */
    final public function send(): CheckNormalMessageResponse
    {
        $errors = $this->validate();

        if (!empty($errors)) {
            throw new ValidationException($errors);
        }

        $body = stream_for(json_encode($this->options));
        $uri = new Uri('/messages/normal/'. $this->options['reference']);
        $request = $this
            ->withUri($uri)
            ->withBody($body);

        foreach ($this->headers as $header => $value) {
            $request = $request->withAddedHeader($header, $value);
        }

        return $this->client->checkNormalMessage($request);
    }

    /**
     * @return array
     */
    private function validate(): array
    {
        $options = $this->options;
        $headers = $this->headers;
        $errors = [];

        if (!is_string($headers['Authorization'])) {
            $errors['apiKey'] = 'was not set.';
        }

        if (!is_int($headers['Organization'])) {
            $errors['organization'] = 'was not set.';
        } elseif ($headers['Organization'] < 1) {
            $errors['organization'] = 'was set but was invalid.';
        }

        if (!isset($options['reference'])) {
            $errors['reference'] = 'was not set.';
        }

        return $errors;
    }
}
