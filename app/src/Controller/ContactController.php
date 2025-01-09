<?php

namespace App\Controller;

use App\Service\ContactService;
use Nette\Forms\Form;

class ContactController {
    private ContactService $service;

    public function __construct(ContactService $service) {
        $this->service = $service;
    }

    public function renderForm(?string $message = null): void {
        $form = new Form;

        $form->addText('name', 'Name:')
            ->setRequired('Please enter your name.');

        $form->addText('surname', 'Surname:')
            ->setRequired('Please enter your surname.');

        $form->addEmail('email', 'Email:')
            ->setRequired('Please enter a valid email address.');

        $form->addText('website', 'Website:')
            ->addCondition(Form::FILLED)
            ->addRule(Form::URL, 'Please enter a valid URL.');

        $form->addSubmit('submit', 'Submit');

        if ($form->isSubmitted() && $form->isValid()) {
            $values = $form->getValues('array');

            $result = $this->service->processContact($values);

            if (isset($result['error'])) {
                $message = '<p style="color:red;">' . $result['error'] . '</p>';
            } else {
                $message = '<p style="color:green;">' . $result['success'] . '</p>';
                $form->setValues([], true);
            }
        }
        
        if ($message) {
            echo $message;
        }

        echo $form;        
    }

    public function renderContactList(): void {
        $contacts = $this->service->getAllContacts();
        
        if (empty($contacts)) {
            echo "<p>No contacts found.</p>";
            return;
        }

        echo "<h1>Contact List</h1>";
        echo "<table border='1'>";
        echo "<thead><tr><th>Name</th><th>Surname</th><th>Email</th><th>Website</th></tr></thead>";
        echo "<tbody>";

        foreach ($contacts as $contact) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($contact['name']) . "</td>";
            echo "<td>" . htmlspecialchars($contact['surname']) . "</td>";
            echo "<td>" . htmlspecialchars($contact['email']) . "</td>";
            echo "<td>" . htmlspecialchars($contact['website']) . "</td>";
            echo "</tr>";
        }

        echo "</tbody></table>";
    }
}
