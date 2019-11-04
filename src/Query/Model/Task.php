<?php

namespace App\Query\Model;

final class Task implements \JsonSerializable
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $userId;

    /**
     * @var string
     */
    private $title;

    /**
     * @var bool
     */
    private $completed;

    public function __construct(int $id, int $userId, string $title, bool $completed)
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->title = $title;
        $this->completed = $completed;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['user_id'],
            $data['title'],
            $data['completed']
        );
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'userId' => $this->userId,
            'title' => $this->title,
            'completed' => $this->completed
        ];
    }


}
