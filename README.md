# 🌟 Laravel API – Best Practices

A production-ready REST API built with Laravel 12, following industry best practices for scalable and maintainable backend development.

## 🚀 Overview

This repository demonstrates how to build a clean, scalable, and production-ready REST API using Laravel 12, following real industry best practices used by senior backend developers.

### ✨ Includes:

- ✅ **Authentication** (Sanctum)
- ✅ **API Versioning**
- ✅ **Exception Handling**
- ✅ **Repository & Service Pattern**
- ✅ **Standardized JSON Responses**
- ✅ **API Resources**
- ✅ **Caching & Performance**
- ✅ **Postman Documentation**
- ✅ **Modular Folder Structure**

### 🎯 Perfect Reference For:

- ✔ Backend Developers
- ✔ API-Heavy Projects
- ✔ Mobile App Backends (Flutter/React Native)
- ✔ Companies that want clean maintainable code

## 📂 Folder Structure
app/
├── Exceptions/
│ └── ApiHandler.php
├── Http/
│ ├── Controllers/Api/v1/
│ ├── Middleware/
│ ├── Requests/
│ └── Resources/
├── Models/
├── Policies/
├── Repositories/
├── Services/
└── Traits/
└── ApiResponse.php
routes/
└── api.php


## 🧱 Features Implemented

### 🔐 1. Authentication (Sanctum)
- Register, Login, Logout
- Token-based authentication
- Protecting routes with middleware
- Profile endpoint
- Clean, minimal controller logic

### 🔄 2. API Versioning
All endpoints are under: `/api/v1/`

**Benefits:**
- Backward compatibility
- Safe updates
- Future API versions without breaking old apps

### 🔧 3. Repository Pattern
Separates data access from logic in `app/Repositories/`

**Benefits:**
- Testable
- Clean architecture
- Zero DB logic in controllers

### ⚙️ 4. Service Layer Pattern
Business logic lives in `app/Services/`
- Controllers = very thin
- Services = smart business logic

### 🎁 5. API Resources (Transformers)
Clean JSON formatting with `app/Http/Resources/`
- Consistent response structure across entire API

### 📦 6. Unified JSON Responses
Using shared trait: `app/Traits/ApiResponse.php`

**Standard Response Format:**
```json
{
  "success": true,
  "message": "Operation successful",
  "data": {},
  "errors": {}
}


❗ 7. Custom Exception Handler
app/Exceptions/ApiHandler.php handles:

404 Not Found

401 Unauthorized

403 Forbidden

422 Validation errors

500 Server errors

⚡ 8. Performance Optimization
Query optimization

Eager loading relationships

Ready for cache decorators

🌍 9. CORS Enabled
Allows secure cross-origin communication for:

Mobile apps

SPA applications

Web applications

📚 10. Postman Documentation
Ready-to-import Postman collection including:

Auth endpoints

Task endpoints

Headers configuration

Example responses

Error cases

🧪 Setup & Installation
# Clone repository
git clone https://github.com/Mosab-Sabbagh/Laravel-API-Best-Practices
cd Laravel-API-Best-Practices

# Install dependencies
composer install

# Environment setup
cp .env.example .env
php artisan key:generate

# Database setup
php artisan migrate

# Start development server
php artisan serve


🔑 Authentication
Example Login:
POST /api/v1/login
Content-Type: application/json

{
  "email": "user@example.com",
  "password": "password"
}
Response:
{
  "success": true,
  "data": {
    "token": "12|asd123...",
    "user": {
      "id": 1,
      "name": "John Doe",
      "email": "user@example.com"
    }
  }
}

Usage in Headers:

Authorization: Bearer <your_token>

📋 API Endpoints
Tasks Management

Method	Endpoint	Description	Auth Required
GET	/api/v1/tasks	Get all tasks	✅
POST	/api/v1/tasks	Create new task	✅
GET	/api/v1/tasks/{id}	Get single task	✅
PUT	/api/v1/tasks/{id}	Update task	✅
DELETE	/api/v1/tasks/{id}	Delete task	✅
🛡️ Security Features
Sanctum token-based authentication

Policy-based authorization

Form Request validation

CORS configuration

Rate limiting ready

SQL injection protection

🚀 Deployment Ready
Environment-based configuration

Optimized for production

Error logging setup

Health check endpoints

✨ Why This Repo Exists
To provide a clear, reference-quality structure for Laravel developers who want to build real APIs the right way from day one.

🤝 Contribution
Pull requests are welcome! If you want to add:

Swagger/OpenAPI documentation

More examples and patterns

DTO implementation

CacheRepository pattern

Testing examples

Let's build something amazing together!

📄 License
This project is open-sourced software licensed under the MIT license.


