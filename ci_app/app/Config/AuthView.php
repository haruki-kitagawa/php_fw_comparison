<?php

namespace Config;

class AuthViews
{
    /**
     * --------------------------------------------------------------------
     * Views
     * --------------------------------------------------------------------
     * あなたが app/Views/Shield/ に作った Laravel デザインのビューを指定します。
     */
    public array $views = [
        'login'                 => 'Shield\login',
        'register'              => 'Shield\register',
        
        // 以下は不足エラーを防ぐための予備（デフォルト値）
        'layout'                => 'CodeIgniter\Shield\Views\layout',
        'action_email_2fa'      => 'CodeIgniter\Shield\Views\action_email_2fa',
        'action_email_activate' => 'CodeIgniter\Shield\Views\action_email_activate',
    ];
}