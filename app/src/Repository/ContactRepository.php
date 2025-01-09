<?php

namespace App\Repository;

use App\Entity\Contact;
use PDO;

class ContactRepository {
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function isEmailUnique(string $email): bool {
        $stmt = $this->pdo->prepare('SELECT COUNT(*) FROM contacts WHERE email = :email');
        $stmt->execute(['email' => $email]);
        return $stmt->fetchColumn() == 0;
    }

    public function save(Contact $contact): void {
        $stmt = $this->pdo->prepare(
            'INSERT INTO contacts (name, surname, email, website) VALUES (:name, :surname, :email, :website)'
        );
        $stmt->execute([ 
            'name' => $contact->getName(),
            'surname' => $contact->getSurname(),
            'email' => $contact->getEmail(),
            'website' => $contact->getWebsite(),
        ]);
    }
}
