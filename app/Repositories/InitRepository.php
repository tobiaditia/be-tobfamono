<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;

class InitRepository
{
    /**
     * Mengambil init
     * @return array
     */
    public function get(): array
    {
        $user = Auth::user();

        return [
            'user' => $user,
            'lang' => app()->getLocale()
        ];
    }

}
