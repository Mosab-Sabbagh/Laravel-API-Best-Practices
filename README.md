🌟 Laravel API – Best Practices

🚀 Overview

This repository demonstrates how to build a clean, scalable, and production-ready REST API using Laravel 12, following real industry best practices used by senior backend developers.

Includes:

Authentication (Sanctum)

Versioning

Exception handling

Repository & Service pattern

Standardized JSON responses

API Resources

Caching & performance

Postman documentation

Modular folder structure

Perfect reference for:
✔ Backend developers
✔ API-heavy projects
✔ Mobile app backends (Flutter/React Native)
✔ Companies that want clean maintainable code

📂 Folder Structure
app/
 ├── Exceptions/
 │     └── ApiHandler.php
 ├── Http/
 │     ├── Controllers/Api/v1/
 │     ├── Middleware/
 │     ├── Requests/
 │     └── Resources/
 ├── Repositories/
 ├── Services/
 └── Traits/
        └── ApiResponse.php

routes/
 └── api.php

🧱 Features Implemented
🔐 1. Authentication (Sanctum)

Register, Login, Logout

Token-based authentication

Protecting routes with middleware

Profile endpoint

Clean, minimal controller logic

🔄 2. API Versioning

All endpoints are under:
/api/v1/
Allows:

Backward compatibility

Safe updates

Future API versions without breaking old apps

🔧 3. Repository Pattern
Separates data access from logic:
app/Repositories/TaskRepository.php

Benefits:

Testable

Clean

Zero DB logic in controllers

⚙️ 4. Service Layer Pattern

Where business logic lives:
app/Services/TaskService.php

Controllers = very thin
Services = smart

🎁 5. API Resources (Transformers)

Clean JSON formatting:
app/Http/Resources/TaskResource.php
Ensures all responses look consistent across the entire API.

📦 6. Unified JSON Responses

Using a shared trait:
app/Traits/ApiResponse.php

All success/error responses follow one format:
{
  "success": true,
  "message": "",
  "data": {},
  "errors": {}
}


❗ 7. Custom Exception Handler
app/Exceptions/ApiHandler.php

Handles:

404 Not Found

401 Unauthorized

403 Forbidden

405 Method not allowed

422 Validation errors

429 Rate limiting

500 Server errors

With unified JSON output.

⚡ 8. Performance (Caching + Eager Loading)

Query optimization

Eager loading relationships

Ready for cache decorators

🌍 9. CORS Enabled

Allows:

Mobile apps

SPA apps

Web apps
to communicate safely with your API across origins.


📚 10. Postman Documentation

A ready-to-import Postman collection is included for:

Auth endpoints

Task endpoints

Headers

Example responses

Error cases

🧪 Setup & Installation

git clone https://github.com/Mosab-Sabbagh/Laravel-API-Best-Practices
cd Laravel-API-Best-Practices
composer install

cp .env.example .env
php artisan key:generate

php artisan migrate

php artisan serve


🔑 Authentication

Example login:
POST /api/v1/login

Response:
{
  "success": true,
  "data": {
    "token": "12|asd123..."
  }
}


Use in Headers:
Authorization: Bearer <token>


✨ Why this repo exists

To provide a clear, reference-quality structure for Laravel developers who want to build real APIs the right way from day one.

🤝 Contribution

Pull requests are welcome!
If you want to add:

Swagger docs

More examples

More patterns (DTO, CacheRepository)
Let’s do it!