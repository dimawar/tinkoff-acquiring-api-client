<?php

declare(strict_types=1);

namespace JustCommunication\TinkoffAcquiringAPIClient\API;

class GetQrResponse extends AbstractResponse
{
    /**
     * @var string|null ID заказа
     */
    private $orderId;

    /**
     * @var string|null ID платежа
     */
    private $paymentId;

    /**
     * @var string|null QR-код (ссылка или изображение в base64)
     */
    private $data;

    /**
     * @var string|null Код ошибки
     */
    private $errorCode;

    /**
     * @var string|null Сообщение об ошибке
     */
    private $message;

    /**
     * @var string|null Детали ошибки
     */
    private $details;

    /**
     * @var string|null Идентификатор запроса
     */
    private $requestKey;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->orderId = $data['OrderId'] ?? null;
        $this->paymentId = $data['PaymentId'] ?? null;
        $this->data = $data['Data'] ?? null;
        $this->errorCode = $data['ErrorCode'] ?? null;
        $this->message = $data['Message'] ?? null;
        $this->details = $data['Details'] ?? null;
        $this->requestKey = $data['RequestKey'] ?? null;
    }

    /**
     * Фабричный метод для создания объекта из данных ответа
     *
     * @param array $data
     * @return self
     */
    public static function createFromResponseData(array $data): self
    {
        return new self($data);
    }

    /**
     * Получить ID заказа
     *
     * @return string|null
     */
    public function getOrderId(): ?string
    {
        return $this->orderId;
    }

    /**
     * Получить ID платежа
     *
     * @return string|null
     */
    public function getPaymentId(): ?string
    {
        return $this->paymentId;
    }

    /**
     * Получить QR-код
     * Для PAYLOAD - ссылка на оплату
     * Для IMAGE - изображение в base64
     *
     * @return string|null
     */
    public function getData(): ?string
    {
        return $this->data;
    }

    /**
     * Получить код ошибки
     *
     * @return string|null
     */
    public function getErrorCode(): ?string
    {
        return $this->errorCode;
    }

    /**
     * Получить сообщение об ошибке
     *
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * Получить детали ошибки
     *
     * @return string|null
     */
    public function getDetails(): ?string
    {
        return $this->details;
    }

    /**
     * Получить идентификатор запроса
     *
     * @return string|null
     */
    public function getRequestKey(): ?string
    {
        return $this->requestKey;
    }

    /**
     * Проверить успешность запроса
     *
     * @return bool
     */
    public function isSuccess(): bool
    {
        return $this->success && $this->errorCode === '0' && $this->data !== null;
    }
}