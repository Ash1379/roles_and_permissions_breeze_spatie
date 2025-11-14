@echo off

:: Go to project folder
cd /d E:\test\roles_and_permissions_breeze_spatie

echo =====================================
echo    Running: php artisan optimize
echo =====================================
php artisan optimize

echo =====================================
echo    Running: npm run build
echo =====================================
cmd /c npm run build

echo =====================================
echo    Starting Laravel Server
echo =====================================
start cmd /k "php artisan serve"

pause
