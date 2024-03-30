## Требования

- laravel
- mysql

## Как запустить

```bash
cp .env.example .env 
```

создать бд и указать парметры подключения в `.env`, затем

```bash
php artisan migrate
php artisan storage:link
php artisan serve
```
