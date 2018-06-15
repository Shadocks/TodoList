<?php

namespace AppBundle\DTO\Task;

/**
 * Class NewTaskDTO.
 */
class NewTaskDTO
{
    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $content;

    /**
     * NewTaskDTO constructor.
     *
     * @param string $title
     * @param string $content
     */
    public function __construct(
        string $title,
        string $content
    ) {
        $this->title = $title;
        $this->content = $content;
    }
}
