# Simple PHP Application - Contact Form with Validation

## Overview
This PHP application provides a simple contact form. Upon form submission, it validates the email, website URL, and ensures the email is unique in the database. If all validations pass, the contact is saved to a MySQL database. The application also allows you to view a list of all stored contacts.
  
## Tech Stack:
- PHP
- Docker
- MySQL
- FrankenPHP
- Nette Forms

## Installation and Setup

### Requirements:
- Docker Compose

### Steps to Run the Application:

1. Clone this repository to your local machine.
   
2. Open a terminal and navigate to the project directory.

3. Run the following command to build and start the Docker containers:

```bash
docker-compose up --build
```

4. App runs on `https://localhost:8092`

## Optional Improvements

Unfortunately, due to time press, I was unable to improve certain aspects of the application. I would:

- Improve frontend UI.
- Implement Doctrine ORM for better database management.
- Add unit tests for custom validation functions.
- proper DI

You can see these improvements implemented in one of my older projects: https://github.com/xkrejc70/simple-php-api-webnode.