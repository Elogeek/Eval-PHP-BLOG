<?php
namespace App\Entity;

class Article {

    private ?int $id;
    private ?string $title;
    private ?string $content;
    private ?int $author;

    /**
     * Article constructor.
     * @param int|null $id
     * @param string|null $title
     * @param string|null $content
     * @param int|null $author
     */
    public function __construct(int $id = null, string $title = null, string $content = null, int $author = null) {
            $this->id = $id;
            $this->title = $title;
            $this->content = $content;
            $this->author = $author;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string {
        return $this->title;
    }

    /**
     * @param string|null $title
     */
    public function setTitle(?string $title): void {
        $this->title = $title;
    }

    /**
     * @return string|null
     */
    public function getContent(): ?string {
        return $this->content;
    }

    /**
     * @param string|null $content
     */
    public function setContent(?string $content): void {
        $this->content = $content;

    }

    /**
     * @return int|null
     */
    public function getAuthor(): ?int {
        return $this->author;
    }

    /**
     * @param int|null $author
     */
    public function setAuthor(?int $author): User {
        $this->author = $author;
    }

}