<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <style>
        :root {
            font-family: 'Figtree', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            color: #0f172a;
            background-color: #f8fafc;
            line-height: 1.5;
        }

        body {
            margin: 0;
            min-height: 100vh;
            display: grid;
            place-items: center;
            padding: 2rem;
        }

        .card {
            background: #fff;
            border-radius: 1rem;
            box-shadow: 0 10px 25px rgba(15, 23, 42, 0.08);
            padding: 2rem 2.5rem;
            max-width: 720px;
            width: 100%;
        }

        h1 {
            font-size: 2.25rem;
            margin: 0 0 1rem;
        }

        p {
            margin: 0.35rem 0;
            color: #475569;
        }

        .cta {
            margin-top: 1.5rem;
        }

        .button {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: linear-gradient(90deg, #2563eb, #7c3aed);
            color: #fff;
            padding: 0.8rem 1.2rem;
            border-radius: 0.75rem;
            text-decoration: none;
            font-weight: 600;
            letter-spacing: 0.01em;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .button:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 20px rgba(37, 99, 235, 0.25);
        }

        .muted {
            color: #94a3b8;
            font-size: 0.95rem;
        }
    </style>
</head>
<body>
    <main class="card">
        <h1>¡Bienvenido a Laravel!</h1>
        <p>La vista de inicio se ha configurado correctamente.</p>
        <p class="muted">Ruta actual: <code>{{ $currentPath ?? '/' }}</code></p>
        <div class="cta">
            <a class="button" href="https://laravel.com/docs">Leer la documentación</a>
        </div>
    </main>
</body>
</html>