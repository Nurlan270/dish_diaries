<?php

/**
 * Get actual URI for user's avatar
 */
if (! function_exists('getAvatarURI')) {
    function getAvatarURI()
    {
        return !empty(Auth::user()->oauth_id)
            ? Auth::user()->avatar
            : Storage::url('avatars/'.Auth::user()->avatar);
    }
}
