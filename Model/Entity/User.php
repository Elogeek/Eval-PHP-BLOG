<?php
namespace App\Entity ;

use Model\Entity\Role;

class User {

    private ?int $id;
    private ?string  $name;
    private ?string $pseudo;
    private ?string $email;
    private ?string  $password;
    private ?int $role;

    /**
     * User constructor.
     * @param int|null $id
     * @param string|null $name
     * @param string|null $pseudo
     * @param string|null $email
     * @param string|null $password
     * @param int|null $role
     */
    public function __construct(int $id = null, string $name = null, string $pseudo = null, string $email = null, string $password = null, int $role = null) {
        $this->id = $id;
        $this->name = $name;
        $this->pseudo = $pseudo;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
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
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): User {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    /**
     * @param string|null $pseudo
     */
    public function setPseudo(?string $pseudo): User {
        $this->pseudo = $pseudo;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): User {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string|null $password
     */
    public function setPassword(?string $password): User {
        $this->password = $password;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getRole(): Role {
        return $this->role;
    }

    /**
     * @param int|null $role
     */
    public function setRole(?int $role): void
    {
        $this->role = $role;
    }

}