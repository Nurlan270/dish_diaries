<?php

use App\Models\User;

/**
 * Get actual URI for user's avatar
 */
if (! function_exists('getAvatarURI')) {
    function getAvatarURI(User $user)
    {
        return ! Str::isUuid(
            preg_replace('/\..*$/', '', $user->avatar)
        )
            ? $user->avatar
            : Storage::url('avatars/'.$user->avatar);
    }
}

if (! function_exists('getOppositeLocale')) {
    function getOppositeLocale(): string
    {
        return App::currentLocale() === 'en' ? 'ru' : 'en';
    }
}

if (! function_exists('markIfLocale')) {
    function markIfLocale(string $locale): string
    {
        return App::currentLocale() === $locale
            ? 'bg-gray-200 dark:bg-gray-600'
            : 'dark:bg-gray-700';
    }
}
