<?php
use OpenApi\Annotations as OA;
/**
 * @OA\Schema(@OA\Xml(name="Home"))
 */
class ModelHome {
    /**
     * @OA\Property(example="Welcome to kawa api")
     *
     * @var string
     */
    private string $message;
    function __construct()
    {
        $this->setMessage("Welcome to kawa api");
    }


    private function setMessage(string $message): void
    {
        $this->message = $message;
    }

    public function getMessage(): string
    {
        return $this->message;
    }
}