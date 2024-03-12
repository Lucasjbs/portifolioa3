<?php

namespace Portifolio\Workbench\Action;

class Response
{
    private int $code;
    private string $message;
    private array $data;

    public function __construct(
        int $genericCode = 404,
        string $genericMessage = "Unexpected failure!",
        array $genericData = []
    ) {
        $this->code = $genericCode;
        $this->message = $genericMessage;
        $this->data = $genericData;
    }

    public function modifyResponseData(?int $code, ?string $message, ?array $data): void
    {
        $this->code = $code ? $code : $this->code;
        $this->message = $message ? $message : $this->message;
        $this->data = $data ? $data : $this->data;
    }

    public function returnResponse(): void
    {
        $responseArray = [
            'status' => $this->code,
            'message' => $this->message,
            'data' => $this->data
        ];

        echo (json_encode($responseArray));

        http_response_code($this->code);
    }

    public function getCode(): int
    {
        return $this->code;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getData(): array
    {
        return $this->data;
    }
}
