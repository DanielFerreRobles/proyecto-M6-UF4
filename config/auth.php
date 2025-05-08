<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Valores Predeterminados de Autenticación
    |--------------------------------------------------------------------------
    |
    | Esta opción define el "guard" de autenticación predeterminado y el
    | "broker" para restablecimiento de contraseñas. Puedes cambiar estos
    | valores según sea necesario.
    |
    */

    'defaults' => [
        'guard' => env('AUTH_GUARD', 'api'),
        'passwords' => env('AUTH_PASSWORD_BROKER', 'users'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Guardias de Autenticación
    |--------------------------------------------------------------------------
    |
    | Aquí defines cada guardia de autenticación para tu aplicación. Laravel
    | incluye una configuración por defecto que usa almacenamiento de sesión
    | y el proveedor de usuarios Eloquent.
    |
    | Soportados: "session", "token", "jwt"
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        'api' => [
            'driver' => 'jwt',
            'provider' => 'users',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Proveedores de Usuarios
    |--------------------------------------------------------------------------
    |
    | Cada guardia necesita un proveedor de usuarios. Esto define cómo se
    | recuperan los usuarios desde tu base de datos u otro sistema.
    |
    | Soportados: "database", "eloquent"
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => env('AUTH_MODEL', App\Models\User::class),
        ],

        // Alternativa usando acceso directo a la base de datos:
        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Restablecimiento de Contraseñas
    |--------------------------------------------------------------------------
    |
    | Configuración para el restablecimiento de contraseñas. Incluye la tabla
    | usada para almacenar tokens, el proveedor correspondiente, y el tiempo
    | de expiración y espera entre solicitudes.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,     // Tiempo de expiración en minutos
            'throttle' => 60,   // Tiempo en segundos entre solicitudes
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Tiempo de Espera para Confirmación de Contraseña
    |--------------------------------------------------------------------------
    |
    | Tiempo (en segundos) antes de que expire una confirmación de contraseña.
    | Por defecto, dura tres horas (10800 segundos).
    |
    */

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

];
