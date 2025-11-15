# Laravel Backend Setup Guide

## Project Structure Overview

```
college-lectures-api/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Api/
│   │   │   │   ├── DepartmentController.php
│   │   │   │   ├── SemesterController.php
│   │   │   │   ├── SubjectController.php
│   │   │   │   ├── PdfController.php
│   │   │   │   ├── SearchController.php
│   │   │   │   ├── FavoriteController.php
│   │   │   │   └── AuthController.php
│   │   │   └── Admin/
│   │   │       ├── AdminController.php
│   │   │       └── AdminPdfController.php
│   │   ├── Middleware/
│   │   │   ├── VerifyApiKey.php
│   │   │   └── RateLimitApi.php
│   │   └── Resources/
│   │       ├── DepartmentResource.php
│   │       ├── SemesterResource.php
│   │       ├── SubjectResource.php
│   │       └── PdfResource.php
│   ├── Models/
│   │   ├── Department.php
│   │   ├── Semester.php
│   │   ├── Subject.php
│   │   ├── PdfFile.php
│   │   ├── Favorite.php
│   │   └── User.php
│   └── Traits/
│       └── ApiResponse.php
├── database/
│   ├── migrations/
│   ├── seeders/
│   │   ├── DepartmentSeeder.php
│   │   ├── SemesterSeeder.php
│   │   ├── SubjectSeeder.php
│   │   └── PdfSeeder.php
│   └── factories/
├── routes/
│   ├── api.php
│   └── web.php
├── config/
│   ├── app.php
│   ├── database.php
│   └── cors.php
└── .env.example
```

## Installation Steps

1. **Create new Laravel project:**
```bash
composer create-project laravel/laravel college-lectures-api
cd college-lectures-api
```

2. **Copy all provided files into their respective directories**

3. **Configure environment:**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Configure Database in .env:**
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=college_lectures
DB_USERNAME=root
DB_PASSWORD=
```

5. **Run migrations and seeders:**
```bash
php artisan migrate:fresh --seed
```

6. **Install dependencies:**
```bash
composer require laravel/sanctum
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
```

7. **Start development server:**
```bash
php artisan serve
```

The API will be available at `http://localhost:8000/api`

## API Endpoints

- `GET /api/departments` - List all departments
- `GET /api/departments/{id}/semesters` - Get semesters by department
- `GET /api/departments/{id}/semesters/{number}/subjects` - Get subjects by semester
- `GET /api/subjects/{code}/pdfs` - Get PDFs for a subject
- `GET /api/search?query=` - Search across all data
- `GET /api/favorites` - Get user's favorites (authenticated)
- `POST /api/favorites/toggle` - Toggle favorite (authenticated)
- `POST /api/auth/register` - Register new user
- `POST /api/auth/login` - Login user
- `POST /api/auth/logout` - Logout user

## Admin Endpoints

- `POST /api/admin/login` - Admin login
- `GET /api/admin/departments` - List departments (admin)
- `POST /api/admin/departments` - Create department (admin)
- `PUT /api/admin/departments/{id}` - Update department (admin)
- `DELETE /api/admin/departments/{id}` - Delete department (admin)

