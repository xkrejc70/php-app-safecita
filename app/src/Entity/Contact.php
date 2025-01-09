<?php

namespace App\Entity;

class Contact {
    private ?int $id = null;
    private string $name;
    private string $surname;
    private string $email;
    private string $website;

    public function __construct(string $name, string $surname, string $email, ?string $website = null) {
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->website = $website;
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function setId(?int $id): void {
        $this->id = $id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function getSurname(): string {
        return $this->surname;
    }

    public function setSurname(string $surname): void {
        $this->surname = $surname;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function getWebsite(): string {
        return $this->website;
    }

    public function setWebsite(string $website): void {
        $this->website = $website;
    }

}
