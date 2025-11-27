<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Starter</title>
    <style>
        body { font-family: system-ui, sans-serif; margin: 0; padding: 2rem; background: #f8fafc; color: #0f172a; }
        .card { background: white; padding: 2rem; border-radius: 1rem; box-shadow: 0 10px 40px rgba(15, 23, 42, 0.1); max-width: 720px; margin: 2rem auto; }
        h1 { margin-top: 0; }
        code { background: #e2e8f0; padding: 0.25rem 0.5rem; border-radius: 0.375rem; }
        ul { margin-top: 1rem; }
    </style>
</head>
<body>
    <div class="card">
        <h1>Laravel listo para tus ejercicios</h1>
        <p>Este proyecto incluye la estructura base de Laravel 11 para que puedas desarrollar los ejercicios solicitados. Instala las dependencias con Composer y ejecuta las migraciones para comenzar.</p>
        <ul>
            <li>Ejecuta <code>composer install</code> (después copia <code>.env.example</code> a <code>.env</code> y genera la clave con <code>php artisan key:generate</code>).</li>
            <li>Configura tu base de datos en el archivo <code>.env</code> y corre <code>php artisan migrate</code>.</li>
            <li>Levanta el servidor con <code>php artisan serve</code> y abre <code>http://localhost:8000</code>.</li>
        </ul>
    </div>
</body>
</html>