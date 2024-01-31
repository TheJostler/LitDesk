<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Lit Desk</title>

    
    @vite([
        'resources/css/app.css',
        'resources/css/classes.css',
        'resources/js/app.js',
    ])

    {{ $slot }}
</head>