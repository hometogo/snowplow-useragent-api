<?php

namespace App\Model\Response;

class Error implements \JsonSerializable
{
    /** @var string */
    private $message = '';

    public function jsonSerialize(): array
    {
        return [
            'success' => false,
            'message' => $this->message,
        ];
    }

    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    public function getMessage(): string
    {
        return $this->message;
    }
}
