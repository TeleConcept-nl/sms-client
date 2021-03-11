<?php
namespace Teleconcept\Sms\Client\Request\Message\Dcb\Create;

use GuzzleHttp\Exception\GuzzleException;
use Teleconcept\Sms\Client\ClientInterface as SmsClient;
use Teleconcept\Sms\Client\Exception\ValidationException;
use Teleconcept\Sms\Client\Request\Request as BaseRequest;
use Teleconcept\Sms\Client\Response\BaseResponseInterface as Response;
use function filter_var;
use function GuzzleHttp\Psr7\stream_for;
use function json_encode;

/**
 * Class CreateRequest
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
        parent::__construct('POST', '/messages/dcb');
        $this->client = $client;
        $this->options = $options;
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
     * @param int $organizationId
     * @param string $message
     * @param string $originator
     * @param string $recipient
     * @return RequestInterface
     */
    final public function setRequiredParameters(
        int $organizationId,
        string $message,
        string $originator,
        string $recipient
    ): RequestInterface {
        return $this
            ->setOption('organization-id', $organizationId)
            ->setOption('message', $message)
            ->setOption('originator', $originator)
            ->setOption('recipient', $recipient);
    }

    /**
     * @param string $reportUrl
     * @return RequestInterface
     */
    final public function setReportUrl(string $reportUrl): RequestInterface
    {
        return $this->setOption('web-hook', $reportUrl);
    }

    /**
     * @return Response
     * @throws GuzzleException
     * @throws ValidationException
     */
    final public function send(): Response
    {
        $errors = $this->validate();

        if (!empty($errors)) {
            throw new ValidationException($errors);
        }

        $body = stream_for(json_encode($this->options));
        $request = $this->withBody($body);

        foreach ($this->headers as $header => $value) {
            $request = $request->withAddedHeader($header, $value);
        }

        return $this->client->createDcbMessage($request);
    }

    /**
     * @return array
     */
    private function validate(): array
    {
        $options = $this->options;
        $headers = $this->headers;
        $errors = [];

        if ($headers['System-Authorization'] === null) {
            $errors['apiKey'] = 'was not set.';
        }

        if ($options['organization-id'] < 1) {
            $errors['organization-id'] = 'was set but was invalid.';
        }

        if ($options['originator'] === null) {
            $errors['originator'] = 'was not set.';
        }

        if (isset($options['report-url']) && !filter_var($options['report-url'], FILTER_VALIDATE_URL)) {
            $errors['reportUrl'] = 'was set but invalid url was supplied.';
        }

        if (empty($options['recipient'])) {
            $errors['recipient'] = 'was supplied but empty.';
        }

        if (empty($options['message'])) {
            $errors['message'] = 'was supplied but empty.';
        }

        return $errors;
    }
}
