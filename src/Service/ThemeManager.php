<?php

namespace App\Service;

class ThemeManager
{
    private string $activeTheme;

    public function getActiveTheme(): string
    {
        // Implement logic to fetch the active theme (from config, database, etc.)
        // Default to a fallback theme if no active theme is set.
        return $this->activeTheme ?? 'default';
    }

    public function setActiveTheme(string $theme): void
    {
        // Implement logic to set the active theme (to config, database, etc.).
        $this->activeTheme = $theme;
    }

}
