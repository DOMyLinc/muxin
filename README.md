# Muxin - CodeIgniter Project

A CodeIgniter project configured with MySQL database support for cPanel hosting.

## Prerequisites

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Composer (for dependency management)

## Installation

### 1. Clone and Setup
```bash
git clone https://github.com/DOMyLinc/muxin.git
cd muxin
composer install
```

### 2. Configure Environment
Copy `.env.example` to `.env` and update with your cPanel credentials:
```bash
cp .env.example .env
```

### 3. Database Setup
```bash
php spark migrate
```

## cPanel Deployment

1. Upload files via FTP/File Manager to your public_html or subdirectory
2. Create MySQL database and user in cPanel
3. Update `.env` with database credentials
4. Set proper file permissions (755 for directories, 644 for files)
5. Point your domain to the public folder

## Project Structure

- `app/` - Application code (Controllers, Models, Views, Config)
- `public/` - Publicly accessible files
- `writable/` - Writable directories (logs, cache, uploads)
- `.env` - Environment configuration (not in version control)

## Documentation

- [CodeIgniter 4 Documentation](https://codeigniter.com/docs/)
- [MySQL with CodeIgniter](https://codeigniter.com/docs/database/index.html)
