# Counter POS

Counter POS is a four-page Laravel application for IT0049 TFA5, **From Zero to Four Pages, Again**. It has a Home page, an About page, a Customer Accounts page, and a User Accounts page. The two account pages display sample PHP arrays through Blade `@foreach` loops.

This activity builds the foundation of a POS application. Account editing, sign-in, sales, and payment processing are outside its scope.

## Requirements

- PHP 8.2 or newer, with Composer 2 installed.
- PHP extensions: Ctype, cURL, DOM, Fileinfo, Filter, Hash, Mbstring, OpenSSL, PCRE, PDO, Session, Tokenizer, and XML.
- VS Code and a web browser.
- PDO SQLite only if you want to run the optional database setup or database tests.

The project uses Laravel 12 so it works with PHP 8.2 installations such as XAMPP. The activity references Laravel 13 documentation but does not require a particular Laravel version. If your professor specifically requires Laravel 13, confirm that requirement before changing the dependencies; Laravel 13 requires PHP 8.3 or newer.

The interface uses a local CSS file. **You do not need Node.js, npm, or a Vite server to run it.**

## Run in VS Code on Windows

For the quickest setup, open the extracted project folder and run `setup.bat` once. When setup finishes, run `start.bat` and open **http://127.0.0.1:8000**. These scripts use PHP and Composer already installed on your computer, with a fallback for PHP in `C:\xampp\php`.

If you prefer to enter the commands yourself, follow these steps:

1. Extract the downloaded ZIP. Open the **laravel-pos-tfa5** folder in VS Code using **File > Open Folder**. Open the folder containing `artisan` and `composer.json`.
2. Select **Terminal > New Terminal**. Use the terminal dropdown to choose **Command Prompt**. You can use Command Prompt for all commands below.
3. Check that PHP and Composer work:

   ```bat
   php -v
   composer --version
   ```

4. Install the project dependencies:

   ```bat
   composer install
   ```

5. Create your local settings file. Skip the `copy` command if you already have a configured `.env` file:

   ```bat
   copy .env.example .env
   php artisan key:generate
   ```

6. Start the Laravel development server:

   ```bat
   php artisan serve
   ```

7. Open **http://127.0.0.1:8000** in your browser. Keep the terminal running. Press **Ctrl+C** when you want to stop the server.

The four pages work without starting MySQL or creating a database. The default settings use file sessions, file caching, and synchronous queues. The account controllers supply the records directly from static arrays.

### If PHP or Composer is not recognized

If you use XAMPP, first check PHP with:

```bat
C:\xampp\php\php.exe -v
```

For the current Command Prompt session, add XAMPP's PHP folder to the path:

```bat
set "PATH=C:\xampp\php;%PATH%"
```

Run `php -v` again. If Composer is still missing, install Composer from [getcomposer.org](https://getcomposer.org/download/), select `C:\xampp\php\php.exe` during setup, and reopen VS Code afterward. Use the actual PHP location if XAMPP is installed elsewhere.

If Composer reports a missing extension, run `php --ini`, open the listed `php.ini`, enable the extension named in the error, and retry `composer install`. Do not bypass platform requirements.

## Pages and activity requirements

| URL | Controller method | Blade view | Purpose |
| --- | --- | --- | --- |
| `/` | `PageController@index` | `home.blade.php` | Landing page |
| `/about` | `PageController@about` | `about.blade.php` | Application overview |
| `/customers` | `CustomerController@index` | `customers/index.blade.php` | Customer records from a static array |
| `/users` | `UserController@index` | `users/index.blade.php` | User records from a static array |

`routes/web.php` connects each URL to its controller method. Each account controller defines at least five sample records in `sampleRecords()` and passes them to its view. The views use `@foreach` to build the table rows and `{{ ... }}` to escape displayed values. A shared layout provides navigation between all four pages.

The sample names and contact details are fictional. The User Accounts page is a listing, so it does not display passwords or provide a login form.

## Optional database setup

Migrations and seeders are included to satisfy the submission requirement. They save copies of the sample records; the two account pages continue to read the controller arrays. Updating the database alone will not change those pages.

For SQLite, keep `DB_CONNECTION=sqlite` in `.env`, then run:

```bat
php -r "file_exists('database/database.sqlite') || touch('database/database.sqlite');"
php artisan migrate --seed
```

The seeders can be run again with `php artisan db:seed`. They update existing sample records rather than adding duplicates.

For MySQL instead, create a database named `laravel_pos_tfa5` in phpMyAdmin, start MySQL, and set these values in `.env`:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_pos_tfa5
DB_USERNAME=root
DB_PASSWORD=
```

Use your actual database username and password. After changing `.env`, run:

```bat
php artisan config:clear
php artisan migrate --seed
```

## Verify before submission

Open each page and check the following:

- Home and About load successfully.
- Customer Accounts displays at least five sample records.
- User Accounts displays at least five sample records.
- Navigation reaches all four pages from every page.
- The layout remains readable on a narrow browser window.

Use Artisan to inspect the routes and compile the views:

```bat
php artisan route:list --except-vendor
php artisan view:cache
```

Feature tests are provided in `tests/Feature/PagesTest.php` and `tests/Feature/SeedersTest.php`. After installing the development dependencies, run:

```bat
php artisan test
```

The database tests use an in-memory SQLite database. They require PDO SQLite and do not use your normal application database. Run these checks on your computer and resolve any errors before submitting.

Verification status of this download: the project files were checked for consistency, but PHP and Composer were unavailable in the creation workspace. The Laravel server, Blade compiler, dependency installation, and PHPUnit tests must still be run on a computer with PHP and Composer. The `vendor` folder and `composer.lock` are generated by the first successful `composer install`.

## Important project files

| Location | What to find there |
| --- | --- |
| `routes/web.php` | The four page routes |
| `app/Http/Controllers/` | Page logic and static sample arrays |
| `app/Models/` | Eloquent models used by the optional seeders |
| `resources/views/` | Shared layout and four page views |
| `public/` | Browser entry point and local assets |
| `database/migrations/` | Database table definitions |
| `database/seeders/` | Optional sample database records |
| `tests/Feature/` | Page and seeder tests |
| `.env.example` | Safe example settings to copy locally |

To change the displayed customers or users, edit the appropriate controller's `sampleRecords()` method. To change the page content, edit its Blade view.

## GitHub submission

Create a GitHub repository and upload the extracted project files. Upload the raw files and folders, rather than just the ZIP. Include `artisan`, `composer.json`, `app`, `bootstrap`, `config`, `database`, `public`, `resources`, `routes`, `storage`, `tests`, and this README. Keep the included `.gitignore` and `.env.example`.

Do not upload your real `.env`, the `vendor` folder, logs, or your local SQLite database. After `composer install` generates `composer.lock`, commit that lock file so the same dependency versions can be installed on the host.

The included migration and seeder files satisfy the activity's **database export or migration and seeder files** requirement. A separate SQL export is unnecessary unless your professor asks for one.

## Host the working application

Use a PHP host that supports the project's PHP version and required extensions. GitHub Pages cannot execute Laravel. Configure the website's document root to the project's **`public` directory**; do not expose the project root as the public website.

1. Upload or clone the project onto the host.
2. Run `composer install --no-dev --optimize-autoloader`. If the host has no terminal or Composer support, install production dependencies locally in a separate deployment copy and upload its `vendor` folder too.
3. Copy `.env.example` to `.env` on the host and set:

   ```dotenv
   APP_ENV=production
   APP_DEBUG=false
   APP_URL=https://your-real-domain.example
   SESSION_DRIVER=file
   CACHE_STORE=file
   QUEUE_CONNECTION=sync
   ```

   Replace the example domain with your real hosted address.

4. Generate a fresh host-specific key with `php artisan key:generate`. If the host has no terminal, generate the key in your separate deployment copy before uploading its `.env`. Keep that file out of GitHub.
5. Make `storage` and `bootstrap/cache` writable by the web server.
6. If the host provides a terminal, run `php artisan optimize:clear` and `php artisan view:cache`.
7. Visit the hosted `/`, `/about`, `/customers`, and `/users` pages and test every navigation link.

No database is required to host the four pages with the default settings. If you choose to seed a hosted database, configure its real credentials and run `php artisan migrate --seed --force` after reviewing the target database.

Your final submission needs both a **real GitHub repository URL** and a **live hosted application URL**. Creating the project files does not create either URL; publish them using your own GitHub and hosting accounts, then submit the working links.

## References

- [Laravel 12 installation](https://laravel.com/docs/12.x/installation)
- [Laravel 12 routing](https://laravel.com/docs/12.x/routing)
- [Laravel 12 controllers](https://laravel.com/docs/12.x/controllers)
- [Laravel 12 Blade templates](https://laravel.com/docs/12.x/blade)
- [Laravel 12 database migrations](https://laravel.com/docs/12.x/migrations)
- [Laravel 12 database seeding](https://laravel.com/docs/12.x/seeding)
- [Laravel 12 deployment](https://laravel.com/docs/12.x/deployment)
