<?php
namespace Teleconcept\Sms\Client\Request\Message\Normal\Create;

use DateTimeImmutable;
use GuzzleHttp\Exception\GuzzleException;
use Teleconcept\Sms\Client\ClientInterface as SmsClient;
use Teleconcept\Sms\Client\Exception\ValidationException;
use Teleconcept\Sms\Client\Request\Request as BaseRequest;
use Teleconcept\Sms\Client\Response\BaseResponseInterface as Response;
use function filter_var;
use function GuzzleHttp\Psr7\stream_for;
use function is_array;
use function is_int;
use function json_encode;

/**
 * Class CreateRequest
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
        parent::__construct('POST', '/messages/normal');
        $this->client = $client;
        $this->options = $options;
    }

    /**
     * @param string $message
     * @param string $originator
     * @param array $recipients
     * @return RequestInterface
     */
    final public function setRequiredParameters(
        string $message,
        string $originator,
        array $recipients
    ): RequestInterface {
        return $this
            ->setOption('message', $message)
            ->setOption('originator', $originator)
            ->setOption('recipients', $recipients);
    }

    /**
     * @param DateTimeImmutable $scheduledAt
     * @return RequestInterface
     */
    final public function setScheduledAt(DateTimeImmutable $scheduledAt): RequestInterface
    {
        return $this->setOption('scheduled-at', $scheduledAt->format('Y-m-d H:i:s'));
    }

    /**
     * @param string $webhook
     * @return RequestInterface
     */
    final public function setWebHook(string $webhook): RequestInterface
    {
        return $this->setOption('web-hook', $webhook);
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

        return $this->client->createNormalMessage($request);
    }

    /**
     * @return array
     */
    private function validate(): array
    {
        $options = $this->options;
        $headers = $this->headers;
        $errors = [];

        if ($headers['Authorization'] === null) {
            $errors['apiKey'] = 'was not set.';
        }

        if (!is_int($headers['Organization'])) {
            $errors['organization'] = 'was not set.';
        } elseif ($headers['Organization'] < 1) {
            $errors['organization'] = 'was set but was invalid.';
        }

        if ($options['originator'] === null) {
            $errors['originator'] = 'was not set.';
        }

        if (isset($options['web-hook']) && !filter_var($options['report-url'], FILTER_VALIDATE_URL)) {
            $errors['webHook'] = 'was set but invalid url was supplied.';
        }

        if (!is_array($options['recipients'])) {
            $errors['recipients'] = 'was not supplied.';
        } elseif (empty($options['recipients'])) {
            $errors['recipients'] = 'was supplied but empty.';
        }

        return $errors;
    }
}
