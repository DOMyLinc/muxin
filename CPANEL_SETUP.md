# cPanel Setup Guide for CodeIgniter with MySQL

## Step-by-Step cPanel Deployment

### 1. Create MySQL Database

1. Log in to cPanel
2. Go to **Databases** → **MySQL Databases**
3. Create a new database (e.g., `username_muxin`)
4. Create a database user with a strong password
5. Assign the user to the database with ALL PRIVILEGES
6. Note: Your hostname is typically `localhost`

### 2. Upload CodeIgniter Files

**Option A: Via Git (Recommended)**
```bash
cd public_html  # or your subdomain folder
git clone https://github.com/DOMyLinc/muxin.git .
```

**Option B: Via FTP**
1. Download repository files locally
2. Use FTP to upload to your hosting account
3. Upload to `public_html` or a subdirectory

### 3. Configure Environment

1. Rename `.env.example` to `.env`
2. Edit `.env` with your database credentials:
   ```
   database.default.hostname = localhost
   database.default.database = username_muxin
   database.default.username = username_dbuser
   database.default.password = your_secure_password
   ```

3. Update the app base URL:
   ```
   app.baseURL = 'https://yourdomain.com/'
   ```

### 4. Set File Permissions

Via SSH (if available):
```bash
chmod 755 writable
chmod 755 writable/cache
chmod 755 writable/logs
chmod 755 writable/uploads
chmod 644 .env
```

Via cPanel File Manager:
- Right-click → **Change Permissions**
- Directories: Set to **755**
- Files: Set to **644**
- `.env` file: **644**

### 5. Install Dependencies (if SSH available)

```bash
cd your_project_directory
composer install --no-dev
```

### 6. Run Migrations (if applicable)

```bash
php spark migrate
```

### 7. Configure Domain Pointer (if in subdirectory)

If your project is in a subdirectory like `public_html/muxin/`:
- Create an `.htaccess` in `public_html/` to redirect to your app
- Or use a subdomain pointing to `public_html/muxin/public`

### 8. SSL Certificate

1. Use **AutoSSL** in cPanel
2. Or manually install SSL via **SSL/TLS**
3. Update your `app.baseURL` to use `https://`

## Troubleshooting

### 500 Internal Server Error
- Check error logs: `public_html/writable/logs/`
- Verify `.env` file permissions (644)
- Check database connection in `.env`
- Ensure `writable` folder is writable (755)

### Database Connection Error
- Verify hostname is `localhost`
- Check database name, username, password in `.env`
- Test connection in cPanel

### 404 Errors on Routes
- Ensure `.htaccess` is in `public/` folder
- Check if mod_rewrite is enabled (most hosts support it)
- If not working, try adding `index.php` to routes in config

### Permission Denied Errors
- Re-check folder permissions (755)
- Ensure writable folder is writable by web server

## Performance Optimization

1. **Caching**: Configure in `.env`:
   ```
   cache.handler = file
   ```

2. **Database**: Verify MySQL version and optimize tables

3. **PHP Version**: Use PHP 8.0+ if available in cPanel

## Security Checklist

- [ ] `.env` file is not publicly accessible
- [ ] `writable/` folder is writable only by application
- [ ] `.git` folder is not accessible via web
- [ ] `.htaccess` protects sensitive files
- [ ] Database user has limited privileges
- [ ] SSL/HTTPS is enabled
- [ ] Strong database passwords are used

## Support Resources

- [CodeIgniter 4 Docs](https://codeigniter.com/)
- [cPanel Support](https://support.cpanel.net/)
- Check cPanel error logs: **Error Logs** in cPanel
