<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Les URI qui doivent être exclus de la vérification CSRF.
     *
     * @var array
     */
    protected $except = [
        '/withdraw/callback', // Exclure l'URL de callback FedaPay
    ];
}