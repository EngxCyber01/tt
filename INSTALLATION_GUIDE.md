# Complete Installation & Setup Guide

## Prerequisites

- PHP 8.1 or higher
- Composer
- MySQL 5.7 or higher
- Node.js and npm (for frontend)

## Backend Setup (Laravel)

### Step 1: Create Laravel Project

```bash
composer create-project laravel/laravel college-lectures-api
cd college-lectures-api
```

### Step 2: Install Dependencies

```bash
composer require laravel/sanctum
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
```

### Step 3: Copy All Backend Files

Copy all the provided files into their respective directories:

- `app/Models/*` → Models
- `app/Http/Controllers/Api/*` → Controllers
- `app/Http/Resources/*` → Resources
- `app/Traits/*` → Traits
- `database/migrations/*` → Migration files
- `database/seeders/*` → Seeder files
- `routes/api.php` → Routes

### Step 4: Configure Environment

Create `.env` file from `.env.example`:

```bash
cp .env.example .env
```

Edit `.env` and set:

```env
APP_NAME="College Lectures Portal"
APP_ENV=production
APP_KEY=
APP_DEBUG=false
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=college_lectures
DB_USERNAME=root
DB_PASSWORD=

SANCTUM_STATEFUL_DOMAINS=localhost:3000,127.0.0.1:3000,localhost:8000
CORS_ALLOWED_ORIGINS=http://localhost:3000,http://localhost:8000,http://127.0.0.1:3000
```

### Step 5: Generate Application Key

```bash
php artisan key:generate
```

### Step 6: Create Database

Create a MySQL database:

```bash
mysql -u root -p
CREATE DATABASE college_lectures;
EXIT;
```

### Step 7: Run Migrations & Seeders

```bash
php artisan migrate:fresh --seed
```

This will:
- Create all database tables
- Seed departments, semesters, subjects, and PDF data

### Step 8: Configure CORS

Edit `config/cors.php`:

```php
'paths' => ['api/*', 'sanctum/csrf-cookie'],
'allowed_methods' => ['*'],
'allowed_origins' => explode(',', env('CORS_ALLOWED_ORIGINS')),
'allowed_origins_patterns' => [],
'allowed_headers' => ['*'],
'exposed_headers' => [],
'max_age' => 0,
'supports_credentials' => true,
```

### Step 9: Start Development Server

```bash
php artisan serve
```

The API will be available at `http://localhost:8000/api`

## Frontend Setup

### Step 1: Update HTML File

Replace your current `index.html` with the new frontend file that includes API integration.

### Step 2: Install Axios (Optional, if using fetch instead)

Add to your `<head>`:

```html
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
```

### Step 3: Configure API Base URL

Update the API base URL in your JavaScript (see updated HTML file):

```javascript
const API_BASE_URL = 'http://localhost:8000/api';
```

### Step 4: Update CORS in Backend

Ensure your frontend URL is in `CORS_ALLOWED_ORIGINS` in `.env`

## API Endpoints

### Public Endpoints (No Authentication Required)

**Departments**
- `GET /api/departments` - Get all departments
- `GET /api/departments/{id}` - Get specific department with semesters

**Semesters**
- `GET /api/departments/{departmentId}/semesters` - Get semesters for a department
- `GET /api/departments/{departmentId}/semesters/{number}/subjects` - Get subjects for a semester

**Subjects**
- `GET /api/subjects/{code}` - Get subject by code

**PDFs**
- `GET /api/subjects/{code}/pdfs` - Get all PDFs for a subject
- `GET /api/pdfs/{id}` - Get specific PDF
- `GET /api/pdfs/{id}/preview` - Get PDF preview URL

**Search**
- `GET /api/search?query=keyword` - Search across all data (min 2 characters)

### Protected Endpoints (Authentication Required)

**Authentication**
- `POST /api/auth/register` - Register new user
- `POST /api/auth/login` - Login user
- `POST /api/auth/logout` - Logout user (requires token)
- `GET /api/auth/me` - Get current user (requires token)

**Favorites** (requires token)
- `GET /api/favorites` - Get user's favorite subjects
- `POST /api/favorites/toggle` - Toggle favorite status
- `GET /api/favorites/check/{subjectId}` - Check if subject is favorited

## API Response Format

All responses follow this format:

```json
{
  "success": true/false,
  "message": "Response message",
  "data": {}
}
```

## Frontend API Integration Examples

### Get Departments

```javascript
const API_BASE_URL = 'http://localhost:8000/api';

// Using Fetch
fetch(`${API_BASE_URL}/departments`)
  .then(res => res.json())
  .then(data => {
    console.log(data.data);
    // Render departments
  });

// Using Axios
axios.get(`${API_BASE_URL}/departments`)
  .then(res => console.log(res.data.data))
  .catch(err => console.error(err));
```

### Get Subjects for Semester

```javascript
const departmentId = 1; // from department selection
const semesterNumber = 1;

fetch(`${API_BASE_URL}/departments/${departmentId}/semesters/${semesterNumber}/subjects`)
  .then(res => res.json())
  .then(subjects => renderSubjects(subjects.data));
```

### Search

```javascript
const query = 'programming';

fetch(`${API_BASE_URL}/search?query=${query}`)
  .then(res => res.json())
  .then(results => renderResults(results.data));
```

### Register & Login

```javascript
// Register
fetch(`${API_BASE_URL}/auth/register`, {
  method: 'POST',
  headers: {'Content-Type': 'application/json'},
  body: JSON.stringify({
    name: 'John Doe',
    email: 'john@example.com',
    password: 'password123',
    password_confirmation: 'password123'
  })
})
.then(res => res.json())
.then(data => {
  localStorage.setItem('token', data.data.token);
  localStorage.setItem('user', JSON.stringify(data.data.user));
});

// Login
fetch(`${API_BASE_URL}/auth/login`, {
  method: 'POST',
  headers: {'Content-Type': 'application/json'},
  body: JSON.stringify({
    email: 'john@example.com',
    password: 'password123'
  })
})
.then(res => res.json())
.then(data => {
  localStorage.setItem('token', data.data.token);
});
```

### Toggle Favorite (Authenticated)

```javascript
const token = localStorage.getItem('token');

fetch(`${API_BASE_URL}/favorites/toggle`, {
  method: 'POST',
  headers: {
    'Content-Type': 'application/json',
    'Authorization': `Bearer ${token}`
  },
  body: JSON.stringify({
    subject_id: 1
  })
})
.then(res => res.json())
.then(data => console.log(data.data.is_favorited));
```

### Get User's Favorites (Authenticated)

```javascript
const token = localStorage.getItem('token');

fetch(`${API_BASE_URL}/favorites`, {
  headers: {
    'Authorization': `Bearer ${token}`
  }
})
.then(res => res.json())
.then(favorites => renderFavorites(favorites.data));
```

## Database Schema

### Departments Table
- id (primary key)
- code (unique, e.g., 'se', 'ce')
- name
- description
- timestamps

### Semesters Table
- id (primary key)
- department_id (foreign key)
- number (1-10)
- description
- timestamps
- unique(department_id, number)

### Subjects Table
- id (primary key)
- semester_id (foreign key)
- code (unique)
- name
- instructor
- schedule (longtext for complex schedules)
- description
- timestamps

### PDF Files Table
- id (primary key)
- subject_id (foreign key)
- title
- url (Google Drive or local path)
- file_path (for local uploads)
- date
- size
- type (Lecture, Lab, Assignment, etc.)
- timestamps

### Favorites Table
- id (primary key)
- user_id (foreign key)
- subject_id (foreign key)
- timestamps
- unique(user_id, subject_id)

### Users Table
- id (primary key)
- name
- email (unique)
- password
- is_admin (boolean)
- timestamps

## Security Features Implemented

1. **Laravel Sanctum** - API token authentication
2. **CORS Protection** - Configurable allowed origins
3. **Rate Limiting** - Can be added via middleware
4. **CSRF Protection** - Built into Sanctum
5. **Password Hashing** - Using bcrypt via Laravel
6. **SQL Injection Protection** - Via Eloquent ORM
7. **XSS Protection** - Via JSON responses

## Production Deployment Checklist

- [ ] Set `APP_ENV=production` in `.env`
- [ ] Set `APP_DEBUG=false` in `.env`
- [ ] Generate secure `APP_KEY`
- [ ] Configure production database
- [ ] Set `CORS_ALLOWED_ORIGINS` to production domain
- [ ] Update `SANCTUM_STATEFUL_DOMAINS` for production
- [ ] Enable HTTPS
- [ ] Set up proper logging
- [ ] Configure file storage (S3, etc.)
- [ ] Run `php artisan optimize`
- [ ] Set up SSL certificates
- [ ] Configure PHP-FPM and Nginx/Apache
- [ ] Enable query caching
- [ ] Set up database backups

## Troubleshooting

**CORS Errors**
- Check `CORS_ALLOWED_ORIGINS` in `.env`
- Ensure frontend URL matches exactly

**401 Unauthorized**
- Include `Authorization: Bearer {token}` header
- Verify token is stored correctly in localStorage

**Database Connection**
- Verify MySQL is running
- Check database credentials in `.env`
- Ensure database exists

**Migrations Failed**
- Drop all tables: `php artisan migrate:reset`
- Re-run: `php artisan migrate:fresh --seed`

## Support

For issues or questions, check:
1. Laravel documentation: https://laravel.com/docs
2. Laravel Sanctum: https://laravel.com/docs/sanctum
3. API response format in responses

