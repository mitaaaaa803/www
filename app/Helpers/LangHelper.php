<?php

namespace App\Helpers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LangHelper
{
    /**
     * 切換語言
     *
     * @param string $locale 語言代碼
     * @return void
     */
    public static function switchLang($locale)
    {
        if (in_array($locale, ['zh-TW', 'en'])) {
            session(['locale' => $locale]);
            app()->setLocale($locale);
        }
        return redirect('/'); 
    }

    /**
     * 現在的語言
     *
     * @return string
     */
    public static function currentLang()
    {
        return session('locale', config('app.locale'));
    }
}
