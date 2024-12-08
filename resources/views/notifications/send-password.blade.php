<x-mail::message>
    <p><strong>Dear {{ $name }},</strong></p>

    We’re thrilled to welcome you to **Dish Diaries**, your personal space for discovering, sharing, and documenting
    culinary delights.

    Your account has been successfully created, and you’re just one step away from exploring our vibrant community of
    food lovers.

    <x-mail::button :$url color="green">
        Explore more!
    </x-mail::button>

    <hr>

    <x-mail::panel>
        - Email:    {{ $email }}
        - Password: {{ $password }}
    </x-mail::panel>

    <p><strong>Note:</strong> For your security, we recommend changing your password after logging in for the first
        time.</p>

    <hr>

    <strong>Bon appétit,</strong><br>
    <i>The {{ config('app.name') }} Team</i>
</x-mail::message>
