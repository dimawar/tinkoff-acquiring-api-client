<?php

declare(strict_types=1);

namespace JustCommunication\TinkoffAcquiringAPIClient\API;

class GetQrRequest extends AbstractRequest
{
    const HTTP_METHOD = 'POST';
    const URI = 'GetQr';
    const RESPONSE_CLASS = GetQrResponse::class;
    const DATA_TYPE_PAYLOAD = 'PAYLOAD';
    const DATA_TYPE_IMAGE = 'IMAGE';

    /**
     * @var string|null ID платежа в системе Тинькофф
     */
    private $paymentId;

    /**
     * @var string Тип данных (PAYLOAD - ссылка, IMAGE - изображение)
     */
    private $dataType = self::DATA_TYPE_PAYLOAD;

    public function __construct(string $paymentId, string $dataType = self::DATA_TYPE_PAYLOAD)
    {
        $this->paymentId = $paymentId;
        $this->dataType = $dataType;
    }

    public function buildRequestData(): array
    {
        $data = [
            'PaymentId' => $this->paymentId,
            'DataType' => $this->dataType
        ];

        return $data;
    }

    /**
     * Get payment ID
     *
     * @return string|null
     */
    public function getPaymentId(): ?string
    {
        return $this->paymentId;
    }

    /**
     * Set payment ID
     *
     * @param string $paymentId
     * @return self
     */
    public function setPaymentId(string $paymentId): self
    {
        $this->paymentId = $paymentId;
        return $this;
    }

    /**
     * Get data type
     *
     * @return string
     */
    public function getDataType(): string
    {
        return $this->dataType;
    }

    /**
     * Set data type
     *
     * @param string $dataType
     * @return self
     */
    public function setDataType(string $dataType): self
    {
        $this->dataType = $dataType;
        return $this;
    }

    public function createHttpClientParams()
    {
        return [
            'json' => $this->buildRequestData()
        ];
    }
}