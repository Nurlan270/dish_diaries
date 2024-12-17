<?php

/**
 * Get actual URI for user's avatar
 */
if (! function_exists('getAvatarURI')) {
    function getAvatarURI()
    {
        return ! Str::isUuid(
            preg_replace('/\..*$/', '', Auth::user()->avatar)
        )
            ? Auth::user()->avatar
            : Storage::url('avatars/'.Auth::user()->avatar);
    }
}
