<?php

namespace App\Entity;
use App\Entity\User;
use App\Entity\Article;

class Comment {

    private ?int $id;
    private ?string $content;
    private ?int $userFk;
    private ?int $articleFK;

    public function __construct(int $id=null, string $content = null, int $userFk = null, int $articleFK = null) {
        $this->id = $id;
        $this->content = $content;
        $this->userFk = $userFk;
        $this->articleFK = $articleFK;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * @param string|null $content
     */
    public function setContent(?string $content): void
    {
        $this->content = $content;
    }

    /**
     * @return int|null
     */
    public function getUserFk(): ?int
    {
        return $this->userFk;
    }

    /**
     * @param int|null $userFk
     */
    public function setUserFk(?int $userFk): void
    {
        $this->userFk = $userFk;
    }

    /**
     * @return int|null
     */
    public function getArticleFK(): ?int
    {
        return $this->articleFK;
    }

    /**
     * @param int|null $articleFK
     */
    public function setArticleFK(?int $articleFK): void
    {
        $this->articleFK = $articleFK;
    }

}