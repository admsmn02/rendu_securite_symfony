# Soda Site

Soda Site is a web application built with Symfony, used as a school project to learn about website security.

## Prerequisites

- PHP 8.2 or higher
- Composer
- Symfony CLI
- MySQL database

## Installation

1. Clone the repository:
git clone https://github.com/admsmn02/rendu_securite_symfony

2. Navigate to the project directory:
cd soda_site

3. Install dependencies:
composer install

4. Set up the environment variables by copying `.env` to `.env.local` and adjusting the database connection details:
cp .env .env.local

5. Create the database:
```php bin/console doctrine:database:create symfony console doctrine:schema:update --force```


## Database Setup

1. Load the initial data:
```php bin/console doctrine:fixtures:load ```


## Running the Project

1. Start the Symfony development server:
```symfony server:start```

2. Access the application in your web browser at `http://localhost:8000`.


# Maintenance

## For future developers

When making requests, developers should use prepared statements to prevent SQL injection attacks. This ensures that the application is more secure and less vulnerable to attacks. In Symfony, Doctrine ORM automatically uses prepared statements when persisting or removing entities.

When setting data, developers should escape HTML to prevent cross-site scripting (XSS) attacks. This is crucial for maintaining the security of the application and protecting user data. For example, in the `Soda` entity, the `setName` method escapes the input to prevent XSS attacks:

```php
public function setName(string $name): static { $this->name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); return $this; }
```


Additionally, developers should implement CSRF tokens and method control checks when necessary. CSRF tokens help protect against cross-site request forgery attacks by ensuring that requests made to the application are genuinely from the user and not from a malicious third party. Method control checks ensure that only the intended HTTP methods (GET, POST, PUT, DELETE, etc.) are allowed for specific routes, further enhancing the security of the application. For example, in the `SodaController`, the `delete` method uses a CSRF token to ensure the request is genuinely from the user.
Here is an example:

```php
if ($this->isCsrfTokenValid('delete'.$soda->getId(), $request->request->get('_token'))) { $em->remove($soda); $em->flush(); }
```

And the `new` and `edit` methods specify the allowed HTTP methods in their route annotations:

```php
#[Route('/soda/new', name: 'new', methods: ['GET', 'POST'])]
```