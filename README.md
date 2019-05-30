# Simple Blog
1.Only admin can add articles.
2.Admin should assign a category to each article they add.
3.Visitors can list the published articles.
4.Visitors can add comments on the published articles.
5.Visitors can filter articles by category.

## Requirement

```
  1. [Laravel 5.5.*](https://laravel.com/docs/5.5)
  2. [PHP >= 7.0] (http://php.net/downloads.php)
  3. [Composer](https://getcomposer.org/)
```

## Installation
1. Clone the repo via this url 
  ```
      https://github.com/abeer93/Blog.git
  ```

2. Create a `.env` file by running the following command 
  ```
      cp .env.example .env
  ```
3. Install various packages and dependencies: 
  ```
      composer install
  ```
5. Update database information in the .env file.

6. Run migrations and seeds:
    ```bash
      php artisan migrate --seed
    ```
7. Generate an encryption key for the app:
  ```
      php artisan key:generate
  ```
8. Run Servers
  ```
      php artisan serve
      or
      php artisan serve --port={port-number}
  ```

Now, open your web browser and got `http://localhost:8000` .

### Docs & Help

- [Laravel 5.5 Documentation](https://laravel.com/docs/5.5)