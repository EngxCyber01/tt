# College Lectures Portal - Full Stack Application

A complete, production-ready full-stack application for managing college lecture materials, PDFs, and subjects across multiple departments.

## 📁 Project Structure

```
college-lectures-api/
├── app/
│   ├── Http/
│   │   ├── Controllers/Api/
│   │   │   ├── DepartmentController.php
│   │   │   ├── SemesterController.php
│   │   │   ├── SubjectController.php
│   │   │   ├── PdfController.php
│   │   │   ├── SearchController.php
│   │   │   ├── FavoriteController.php
│   │   │   └── AuthController.php
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
│   │   ├── 2024_01_01_000001_create_departments_table.php
│   │   ├── 2024_01_01_000002_create_semesters_table.php
│   │   ├── 2024_01_01_000003_create_subjects_table.php
│   │   ├── 2024_01_01_000004_create_pdf_files_table.php
│   │   └── 2024_01_01_000005_create_favorites_table.php
│   └── seeders/
│       ├── DepartmentSeeder.php
│       ├── SemesterSeeder.php
│       ├── SubjectSeeder.php
│       └── PdfSeeder.php
├── routes/
│   └── api.php
├── .env.example
└── INSTALLATION_GUIDE.md
```

## ✨ Features

✅ **RESTful API** with 20+ endpoints  
✅ **Database-backed** data (no hardcoded data)  
✅ **User Authentication** with Laravel Sanctum  
✅ **Favorites System** with user-based storage  
✅ **Advanced Search** across subjects and PDFs  
✅ **CORS Protection** for secure cross-origin requests  
✅ **Rate Limiting** ready middleware  
✅ **Multi-language** support (English, Kurdish, Arabic)  
✅ **Dark/Light Theme** toggle  
✅ **RTL Support** for Arabic content  
✅ **Responsive Design** for all devices  
✅ **PDF Preview** with Google Drive integration  

## 🚀 Quick Start

### Backend Setup

1. **Create Laravel project:**
   ```bash
   composer create-project laravel/laravel college-lectures-api
   cd college-lectures-api
   ```

2. **Install Sanctum:**
   ```bash
   composer require laravel/sanctum
   php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
   ```

3. **Copy backend files** into their respective directories

4. **Configure .env:**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Set database credentials in .env:**
   ```
   DB_DATABASE=college_lectures
   DB_USERNAME=root
   DB_PASSWORD=
   ```

6. **Run migrations and seeders:**
   ```bash
   php artisan migrate:fresh --seed
   ```

7. **Start server:**
   ```bash
   php artisan serve
   ```

Backend will be at: `http://localhost:8000`

### Frontend Setup

1. **Use the provided `index-with-api.html`** instead of your original file

2. **Update API endpoint** in the HTML if needed:
   ```javascript
   const API_BASE_URL = 'http://localhost:8000/api';
   ```

3. **Open in browser** or deploy to your web server

## 📊 Database Schema

### Departments
```
id, code (unique), name, description, timestamps
```

### Semesters
```
id, department_id, number, description, timestamps
unique(department_id, number)
```

### Subjects
```
id, semester_id, code (unique), name, instructor, schedule, description, timestamps
```

### PDF Files
```
id, subject_id, title, url, file_path, date, size, type, timestamps
```

### Favorites (User-based)
```
id, user_id, subject_id, timestamps
unique(user_id, subject_id)
```

### Users
```
id, name, email (unique), password, is_admin, timestamps
```

## 🔌 API Endpoints

### Public Endpoints

```
GET    /api/departments                                      - List all departments
GET    /api/departments/{id}                                 - Get department with semesters
GET    /api/departments/{deptId}/semesters                   - Get semesters for department
GET    /api/departments/{deptId}/semesters/{num}/subjects    - Get subjects for semester
GET    /api/subjects/{code}                                  - Get subject by code
GET    /api/subjects/{code}/pdfs                             - Get PDFs for subject
GET    /api/pdfs/{id}                                        - Get specific PDF
GET    /api/pdfs/{id}/preview                                - Get PDF preview URL
GET    /api/search?query=keyword                             - Search all data
```

### Authentication

```
POST   /api/auth/register                                    - Register new user
POST   /api/auth/login                                       - Login user
POST   /api/auth/logout                    (protected)       - Logout user
GET    /api/auth/me                        (protected)       - Get current user
```

### Favorites (Protected)

```
GET    /api/favorites                                        - Get user's favorites
POST   /api/favorites/toggle                                 - Toggle favorite
GET    /api/favorites/check/{subjectId}                      - Check if favorited
```

## 🔐 Security Features

- **Laravel Sanctum** - Token-based API authentication
- **CORS Protection** - Configurable allowed origins
- **Password Hashing** - bcrypt encryption
- **SQL Injection Protection** - Eloquent ORM parameterization
- **XSS Protection** - JSON response escaping
- **CSRF Protection** - Built-in Sanctum
- **Rate Limiting** - Middleware ready
- **Secure Headers** - Recommended configuration

## 📱 Frontend Features

- **Responsive Design** - Works on mobile, tablet, desktop
- **Dark Mode** - Toggle theme
- **RTL Support** - Automatic for Arabic/Kurdish
- **Multi-language** - English, Kurdish, Arabic
- **Real-time Search** - Instant results
- **Favorites System** - Personal bookmarks (requires login)
- **PDF Preview** - Google Drive integration
- **Smooth Animations** - Fade-in and slide-in effects

## 🛠️ Development

### Adding New Departments

1. Create migration/seeder or use admin API
2. Seeders auto-create semesters and subjects
3. Use PDF seeder for content

### Customization

**Update Logo:**
```html
<div class="logo">
    <i class='bx bxs-graduation'></i>
    <span>Your Portal Name</span>
</div>
```

**Change Colors (CSS Variables):**
```css
:root {
    --primary-color: #4f46e5;
    --dark-color: #1f2937;
    /* etc */
}
```

**Add New Semester:**
```php
Semester::create([
    'department_id' => $department->id,
    'number' => 8,
    'description' => 'Semester 8'
]);
```

## 📦 Deployment

### Production Checklist

- [ ] Set `APP_ENV=production`
- [ ] Set `APP_DEBUG=false`
- [ ] Generate strong `APP_KEY`
- [ ] Configure production database
- [ ] Set `CORS_ALLOWED_ORIGINS` to production domain
- [ ] Enable HTTPS
- [ ] Set up SSL certificates
- [ ] Configure PHP-FPM and Nginx/Apache
- [ ] Enable query result caching
- [ ] Set up database backups
- [ ] Configure error logging
- [ ] Set up monitoring

### Deploy to Heroku

```bash
heroku create your-app-name
git push heroku main
heroku run php artisan migrate:fresh --seed
```

### Deploy to Docker

Create `Dockerfile`:
```dockerfile
FROM php:8.1-fpm
# Add required extensions and dependencies
COPY . /var/www/html
RUN composer install
```

## 📄 File Descriptions

### Models
- **Department.php** - Department model with semesters relation
- **Semester.php** - Semester model with subjects relation
- **Subject.php** - Subject model with PDFs relation
- **PdfFile.php** - PDF model with preview URL generation
- **Favorite.php** - Favorite model for user-specific bookmarks
- **User.php** - User model with Sanctum support

### Controllers
- **DepartmentController** - Department list and detail endpoints
- **SemesterController** - Semester management and subject retrieval
- **SubjectController** - Subject retrieval by code and semester
- **PdfController** - PDF list, detail, and preview endpoints
- **SearchController** - Global search across all data
- **FavoriteController** - User favorites management
- **AuthController** - Registration, login, logout

### Resources
- **DepartmentResource** - Transform department data for API
- **SemesterResource** - Transform semester data for API
- **SubjectResource** - Transform subject data for API
- **PdfResource** - Transform PDF data with preview URL

### Seeders
- **DepartmentSeeder** - Create all departments
- **SemesterSeeder** - Create semesters for each department
- **SubjectSeeder** - Create subjects with schedules from your data
- **PdfSeeder** - Seed all PDF links and metadata

## 🐛 Troubleshooting

**CORS Error**
- Check `CORS_ALLOWED_ORIGINS` in `.env`
- Ensure frontend URL matches exactly

**401 Unauthorized**
- Include `Authorization: Bearer {token}` header
- Verify token in localStorage

**Database Connection Failed**
- Check database credentials in `.env`
- Ensure MySQL is running
- Verify database exists

**Migration Errors**
- Run `php artisan migrate:reset`
- Then `php artisan migrate:fresh --seed`

**API Not Responding**
- Check if Laravel server is running
- Verify API endpoint URLs
- Check browser console for errors

## 📚 Resources

- [Laravel Documentation](https://laravel.com/docs)
- [Laravel Sanctum](https://laravel.com/docs/sanctum)
- [RESTful API Best Practices](https://restfulapi.net)
- [CORS Specification](https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS)

## 📝 License

This project is provided as-is for educational purposes.

## 👨‍💻 Support

For issues, questions, or suggestions, please refer to the documentation or contact the development team.

---

**Created:** November 2025  
**Version:** 1.0.0  
**Status:** Production Ready ✅

