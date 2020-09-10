<?php
namespace Teleconcept\Packages\Sms\Client\Request\Pincode;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Uri;
use Teleconcept\Packages\Sms\Client\Exception\ValidationException;
use Teleconcept\Packages\Sms\Client\Request\Request;
use Teleconcept\Packages\Sms\Client\Response\Pincode\CheckPincodeResponse;
use Teleconcept\Packages\Sms\Client\Response\Pincode\CheckPincodeResponseInterface;
use function is_int;
use function is_string;
use function sprintf;

/**
 * Class CheckPincodeRequest
 * @package Teleconcept\Packages\Sms\Client\Request\Pincode
 */
class CheckPincodeRequest extends Request implements CheckPincodeRequestInterface
{
    /**
     * @param string $outletId
     * @param string $shortCode
     * @param string $country
     * @param string $keyword
     * @param string $pincode
     * @return CheckPincodeRequestInterface
     */
    final public function setRequiredParameters(
        string $outletId,
        string $shortCode,
        string $country,
        string $pincode,
        string $keyword
    ): CheckPincodeRequestInterface {
        return $this
            ->setOption('outlet', $outletId)
            ->setOption('shortCode', $shortCode)
            ->setOption('country', $country)
            ->setOption('pincode', $pincode)
            ->setOption('keyword', $keyword);
    }

    /**
     * @return CheckPincodeResponseInterface
     * @throws GuzzleException
     * @throws ValidationException
     */
    final public function send(): CheckPincodeResponseInterface
    {
        $errors = $this->validate();

        if (!empty($errors)) {
            throw new ValidationException($errors);
        }
        $url = sprintf(
            '/pincodes/outlet/%s/short-code/%s/country/%s/pincode/%s/keyword/%s',
            $this->options['outlet'],
            $this->options['shortCode'],
            $this->options['country'],
            $this->options['pincode'],
            $this->options['keyword']
        );
        $request = $this->withUri(new Uri($url));

        foreach ($this->headers as $header => $value) {
            $request = $request->withAddedHeader($header, $value);
        }

        $response = $this->client->send($request);

        return new CheckPincodeResponse($response);
    }

    /**
     * @return array
     */
    private function validate(): array
    {
        $headers = $this->headers;
        $options = $this->options;
        $errors = [];

        if (!is_string($headers['Authorization'])) {
            $errors['apiKey'] = 'was not set.';
        }

        if (!is_int($headers['Organization'])) {
            $errors['organization'] = 'was not set.';
        } elseif ($headers['Organization'] < 1) {
            $errors['organization'] = 'was set but was invalid.';
        }

        if (!isset($options['outlet'])) {
            $errors['outlet'] = 'was not set.';
        } elseif (!is_int($options['outlet']) || $options['outlet'] < 1) {
            $errors['outlet'] = 'was set but was invalid.';
        }

        if (!isset($options['shortCode'])) {
            $errors['shortCode'] = 'was not set.';
        } elseif (!is_string($options['shortCode']) || $options['shortCode'] === '') {
            $errors['shortCode'] = 'was set but was invalid.';
        }

        if (!isset($options['country'])) {
            $errors['country'] = 'was not set.';
        } elseif (!is_string($options['country']) || $options['country'] === '') {
            $errors['country'] = 'was set but was invalid.';
        }

        if (!isset($options['pincode'])) {
            $errors['pincode'] = 'was not set.';
        } elseif (!is_string($options['pincode']) || $options['pincode'] === '') {
            $errors['pincode'] = 'was set but was invalid.';
        }

        if (!isset($options['keyword'])) {
            $errors['keyword'] = 'was not set.';
        } elseif (!is_string($options['keyword']) || $options['keyword'] === '') {
            $errors['keyword'] = 'was set but was invalid.';
        }

        return $errors;
    }
}
