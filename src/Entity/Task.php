<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="task")
 */
class Task
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue()
     *
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     *
     * @var int
     */
    private $userId;

    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    private $title;

    /**
     * @ORM\Column(type="boolean")
     *
     * @var bool
     */
    private $completed;

    public function __construct(int $userId, string $title)
    {
        $this->userId = $userId;
        $this->title = $title;
        $this->completed = false;
    }

    public function changeTitle(string $title): void {
        if($this->completed) {
            throw new \RuntimeException('Title change is allowed only for not completed tasks');
        }

        $this->title = $title;
    }

    public function complete(): void
    {
        $this->completed = true;
    }
}
