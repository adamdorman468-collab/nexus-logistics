# 📦 Nexus Logistics

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-12-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel 12">
  <img src="https://img.shields.io/badge/Filament-4-FDBA27?style=for-the-badge&logo=laravel&logoColor=black" alt="Filament 4">
  <img src="https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP 8.2+">
  <img src="https://img.shields.io/badge/PostgreSQL-Database-316192?style=for-the-badge&logo=postgresql&logoColor=white" alt="PostgreSQL">
  <img src="https://img.shields.io/badge/Tailwind_CSS-4-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white" alt="Tailwind CSS">
</p>

<p align="center">
  A modern, real-time shipment tracking and logistics management system built with Laravel and Filament, featuring customer portal tracking and comprehensive admin management capabilities.
</p>

---

## 📋 Table of Contents

- [Features](#-features)
- [Technology Stack](#-technology-stack)
- [Prerequisites](#-prerequisites)
- [Installation](#-installation)
- [Project Structure](#-project-structure)
- [Usage](#-usage)
- [Testing](#-testing)
- [Deployment](#-deployment)
- [Customization](#-customization)
- [Security](#-security)
- [Contributing](#-contributing)
- [License](#-license)

---

## ✨ Features

### Customer Portal
- 🔍 **Real-time Tracking**: Track shipments with unique tracking numbers
- 📍 **Status Timeline**: Visual timeline of shipment journey with timestamps
- 📸 **Proof of Delivery**: View POD photos when shipments are delivered
- 🌐 **Bilingual Support**: Full Indonesian (id) and English (en) localization
- 📱 **Responsive Design**: Mobile-first UI with Tailwind CSS
- 🎨 **Status-based Styling**: Color-coded status indicators (pending, processing, in_transit, out_for_delivery, delivered, failed, returned)

### Admin Panel (Filament)
- 👥 **User Management**: Complete user CRUD with roles and permissions
- 📦 **Shipment Management**: 
  - Create, edit, and delete shipments
  - Batch operations for efficient workflow
  - Advanced filtering and search
  - Export capabilities
- 📊 **Status Updates**: Track shipment history with detailed notes
- 🖼️ **File Upload**: Enhanced drag-and-drop POD photo upload with:
  - File validation (type and size)
  - Upload progress indicators
  - Real-time preview
  - Metadata display
- 📈 **Dashboard Widgets**: Real-time statistics and insights
- 🔐 **Authentication**: Secure admin access with Laravel authentication
- 🎯 **Activity Logging**: Track admin actions and changes

---

## 🛠 Technology Stack

### Backend
- **Framework**: [Laravel 12](https://laravel.com)
- **Admin Panel**: [Filament 4](https://filamentphp.com)
- **PHP Version**: 8.2+
- **Database**: PostgreSQL (Supabase)
- **ORM**: Eloquent
- **File Storage**: AWS S3 / Supabase Storage

### Frontend
- **CSS Framework**: [Tailwind CSS 4](https://tailwindcss.com)
- **JavaScript**: [Alpine.js](https://alpinejs.dev)
- **Build Tool**: [Vite](https://vitejs.dev)
- **UI Components**: Filament Components, Livewire

### DevOps
- **Version Control**: Git
- **Package Manager**: Composer, NPM
- **Testing**: Pest PHP
- **Deployment**: Vercel-ready configuration

---

## ⚙️ Prerequisites

Before you begin, ensure you have the following installed:

- PHP >= 8.2
- Composer
- Node.js >= 18.x
- NPM or Yarn
- PostgreSQL or MySQL
- Git

---

## 🚀 Installation

### 1. Clone the Repository

```bash
git clone https://github.com/yourusername/nexus-logistics.git
cd nexus-logistics
```

### 2. Install Dependencies

```bash
# Install PHP dependencies
composer install

# Install JavaScript dependencies
npm install
```

### 3. Environment Configuration

```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 4. Configure Database

Edit `.env` file with your database credentials:

```env
DB_CONNECTION=pgsql
DB_HOST=your-database-host
DB_PORT=5432
DB_DATABASE=nexus_logistics
DB_USERNAME=your-username
DB_PASSWORD=your-password
```

### 5. Configure Storage (Optional)

For AWS S3 or Supabase storage:

```env
FILESYSTEM_DISK=s3
AWS_ACCESS_KEY_ID=your-access-key
AWS_SECRET_ACCESS_KEY=your-secret-key
AWS_DEFAULT_REGION=your-region
AWS_BUCKET=your-bucket-name
```

### 6. Run Migrations and Seeders

```bash
# Run migrations
php artisan migrate

# Seed demo data (optional)
php artisan db:seed --class=LogisticsDemoSeeder
```

### 7. Build Assets

```bash
# Development
npm run dev

# Production
npm run build
```

### 8. Start Development Server

```bash
php artisan serve
```

Visit `http://localhost:8000` for the customer portal and `http://localhost:8000/admin` for the admin panel.

### 9. Create Admin User

```bash
php artisan make:filament-user
```

---

## 📁 Project Structure

```
nexus-logistics/
├── app/
│   ├── Filament/             # Filament admin panel
│   │   ├── Resources/        # CRUD resources (Shipments, Users)
│   │   └── Widgets/          # Dashboard widgets
│   ├── Http/
│   │   ├── Controllers/      # Web controllers
│   │   └── Middleware/       # Custom middleware
│   └── Models/               # Eloquent models
│       ├── Shipment.php
│       ├── StatusUpdate.php
│       └── User.php
├── database/
│   ├── factories/            # Model factories
│   ├── migrations/           # Database migrations
│   └── seeders/              # Database seeders
├── resources/
│   ├── css/                  # Tailwind CSS
│   ├── js/                   # Alpine.js components
│   └── views/                # Blade templates
│       ├── filament/         # Filament custom views
│       └── home.blade.php    # Customer portal
├── routes/
│   ├── web.php               # Web routes
│   └── console.php           # Artisan commands
├── tests/                    # Pest PHP tests
└── public/                   # Public assets
```

---

## 📖 Usage

### Customer Portal

1. **Track a Shipment**:
   - Navigate to the homepage (`/`)
   - Enter your tracking number in the search field
   - View real-time status updates and timeline
   - Download POD photo if available

2. **Status Types**:
   - `pending`: Shipment created, awaiting processing
   - `processing`: Order is being prepared
   - `in_transit`: Package is on the way
   - `out_for_delivery`: Out for final delivery
   - `delivered`: Successfully delivered
   - `failed`: Delivery attempt failed
   - `returned`: Returned to sender

### Admin Panel

1. **Access Admin Panel**:
   - Navigate to `/admin`
   - Login with admin credentials

2. **Manage Shipments**:
   - Create new shipments with customer details
   - Update shipment status with notes
   - Upload POD photos for delivered items
   - Filter by status, date, or customer

3. **Manage Users**:
   - Add new admin users
   - Assign roles and permissions
   - View user activity logs

4. **Dashboard**:
   - View shipment statistics
   - Monitor recent activities
   - Track delivery performance

---

## 🧪 Testing

Run the test suite using Pest PHP:

```bash
# Run all tests
php artisan test

# Run specific test suite
php artisan test --testsuite=Feature

# Run with coverage
php artisan test --coverage
```

---

## 🌐 Deployment

### Vercel Deployment

1. **Install Vercel CLI**:
```bash
npm i -g vercel
```

2. **Deploy**:
```bash
vercel
```

The project includes a `vercel.json` configuration file for seamless deployment.

### Manual Deployment

1. Set environment to production in `.env`:
```env
APP_ENV=production
APP_DEBUG=false
```

2. Optimize application:
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

3. Build production assets:
```bash
npm run build
```

---

## 🎨 Customization

### Adding New Status Types

1. Update the enum in the migration:
```php
// database/migrations/2025_11_24_024351_create_shipments_table.php
$table->enum('status', ['pending', 'processing', 'your_new_status', ...])->default('pending');
```

2. Add translations:
```php
// lang/en/statuses.php
'your_new_status' => 'Your New Status',
```

3. Add status color in views:
```blade
@case('your_new_status')
    <span class="bg-purple-100 text-purple-800">{{ __('statuses.your_new_status') }}</span>
@endcase
```

### Modifying Upload Component

Edit `resources/views/filament/forms/components/base64-file-upload.blade.php` to customize:
- File validation rules
- Upload progress UI
- Accepted file types
- Maximum file size

---

## 🔒 Security

- All routes are CSRF protected
- Admin panel requires authentication
- File uploads are validated for type and size
- Database queries use Eloquent ORM to prevent SQL injection
- Environment variables store sensitive credentials

**Report security vulnerabilities**: Create a private security advisory on GitHub.

---

## 🤝 Contributing

Contributions are welcome! Please follow these steps:

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

---

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

---

<p align="center">Made with ❤️ for modern logistics management</p>
