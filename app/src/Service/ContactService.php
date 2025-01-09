<?php

namespace App\Service;

use App\Entity\Contact;
use App\Repository\ContactRepository;
use App\Utils\Validator;

class ContactService {
    private ContactRepository $repository;
    private Validator $validator;

    public function __construct(ContactRepository $repository, Validator $validator) {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function processContact(array $data): array {
        if (!$this->validator->validateEmail($data['email'])) {
            return ['error' => 'Invalid email address.'];
        }

        if (!$this->validator->validateWebsite($data['website'])) {
            return ['error' => 'Invalid website URL.'];
        }

        if (!$this->repository->isEmailUnique($data['email'])) {
            return ['error' => 'Email already exists.'];
        }

        $contact = new Contact($data['name'], $data['surname'], $data['email'], $data['website']);
        $this->repository->save($contact);

        return ['success' => 'Contact saved successfully!'];
    }
}
