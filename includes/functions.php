<?php
declare(strict_types=1);

function e(?string $value): string
{
    return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
}

function str_length(string $value): int
{
    return function_exists('mb_strlen') ? mb_strlen($value) : strlen($value);
}

function icon(string $name): string
{
    $paths = [
        'flow' => '<path d="M4 16c2.2-3.2 3.6-3.2 5.4 0s3.2 3.2 5.2 0 3.2-3.2 5.4 0"/><path d="M4 10h16"/><path d="M8 19.5h8"/>',
        'budget' => '<rect x="4" y="5" width="16" height="14" rx="2"/><path d="M8 9h8M8 13h5"/>',
        'report' => '<path d="M7 4.5h7l4 4V19a1.5 1.5 0 0 1-1.5 1.5h-9.5A1.5 1.5 0 0 1 5.5 19V6A1.5 1.5 0 0 1 7 4.5z"/><path d="M14 4.8V9h4.2"/><path d="M8 13h8M8 16.5h5"/>',
        'cost' => '<path d="M8 4.5h8v3.2H8z"/><path d="M6.5 7.7h11V19a1.2 1.2 0 0 1-1.2 1.2h-8.6A1.2 1.2 0 0 1 6.5 19V7.7z"/><path d="M9.2 12h5.6M9.2 15.2h3.4"/>',
        'decision' => '<path d="M12 4.5v6"/><path d="M12 10.5l5.5 7.2"/><path d="M12 10.5L6.5 17.7"/><circle cx="12" cy="4.5" r="1.2" fill="currentColor" stroke="none"/><circle cx="6.5" cy="18.2" r="1.4"/><circle cx="17.5" cy="18.2" r="1.4"/>',
        'files' => '<path d="M7 6.5h8.5A1.5 1.5 0 0 1 17 8v11H8.5A1.5 1.5 0 0 1 7 17.5v-11z"/><path d="M9.5 4.5H17a1.5 1.5 0 0 1 1.5 1.5V16"/><path d="M10 11h4.5M10 14h3"/>',
        'partner' => '<circle cx="9" cy="9" r="2.2"/><circle cx="16" cy="9.5" r="1.8"/><path d="M4.8 17.2c.6-2.2 2.2-3.3 4.2-3.3s3.6 1.1 4.2 3.3"/><path d="M13.2 14.2c.8-.5 1.7-.7 2.7-.6 1.6.2 2.7 1.2 3.2 3"/>',
        'home' => '<path d="M4.5 11.2 12 5l7.5 6.2"/><path d="M7 10.5V19h10v-8.5"/><path d="M10.5 19v-4.2h3V19"/>',
        'craft' => '<path d="M5 17.5 14.2 8.3a2 2 0 0 1 2.8 0l.7.7a2 2 0 0 1 0 2.8L8.5 20.5H5v-3z"/><path d="M13 9.5l3.5 3.5"/>',
        'food' => '<path d="M6 4.5v6a2 2 0 0 0 2 2V20"/><path d="M6 7.5h2"/><path d="M15 4.5v15"/><path d="M15 8.5h3.2a2 2 0 0 1 0 4H15"/>',
        'shop' => '<path d="M5 9.5h14l-1.2 9H6.2L5 9.5z"/><path d="M8 9.2V7.2A4 4 0 0 1 16 7.2v2"/>',
        'build' => '<path d="M5 19h14"/><path d="M7 19V9.5L12 5.5l5 4V19"/><path d="M10 19v-4.5h4V19"/>',
        'laptop' => '<rect x="4" y="6" width="16" height="10" rx="1.5"/><path d="M3 18.5h18"/><path d="M9 18.5c.3-.8.8-1.2 3-1.2s2.7.4 3 1.2"/>',
        'family' => '<circle cx="12" cy="8" r="2"/><circle cx="7" cy="10" r="1.5"/><circle cx="17" cy="10" r="1.5"/><path d="M9.2 18.5c.4-2 1.4-3 2.8-3s2.4 1 2.8 3"/><path d="M4.8 17.8c.3-1.5 1.1-2.3 2.3-2.5"/><path d="M19.2 17.8c-.3-1.5-1.1-2.3-2.3-2.5"/>',
        'chat' => '<path d="M6 16.5 4.8 19.2c-.2.4.2.8.6.6L8.4 18.5A7.5 7.5 0 1 0 6 16.5z"/>',
        'search' => '<circle cx="11" cy="11" r="5.2"/><path d="M15.2 15.2 19 19"/>',
        'plan' => '<path d="M7 5.5h10A1.5 1.5 0 0 1 18.5 7v12.5H7A1.5 1.5 0 0 1 5.5 18V7A1.5 1.5 0 0 1 7 5.5z"/><path d="M9 4.5v2.5M15 4.5v2.5M8.5 11h7M8.5 14.5h4.5"/>',
        'work' => '<rect x="4" y="8" width="16" height="11" rx="1.6"/><path d="M9 8V6.8A1.8 1.8 0 0 1 10.8 5h2.4A1.8 1.8 0 0 1 15 6.8V8"/><path d="M4 12.5h16"/>',
        'refresh' => '<path d="M19 12a7 7 0 1 1-2-4.9"/><path d="M19 4.8V8h-3.2"/>',
    ];

    if (!isset($paths[$name])) {
        return '';
    }

    return '<svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round">' . $paths[$name] . '</svg>';
}
