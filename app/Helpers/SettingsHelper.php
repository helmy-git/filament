<?php

if (!function_exists('get_header_menu')) {
    function get_header_menu(?string $locale = null): array
    {
        $locale = $locale ?? app()->getLocale();

        $settings = app(\TomatoPHP\FilamentSettingsHub\Settings\SitesSettings::class);

        if (isset($settings->site_description)) {
            $decoded = json_decode($settings->site_description, true);

            if (is_array($decoded) && isset($decoded['menu'])) {
                if (isset($decoded['menu'][$locale])) {
                    return $decoded['menu'][$locale];
                }
                if (isset($decoded['menu'][0])) {
                    return $decoded['menu'];
                }
            }
        }

        return [];
    }
}

if (!function_exists('get_site_profile')) {
    function get_site_profile(?string $locale = null): ?string
    {
        $locale = $locale ?? app()->getLocale();

        $settings = app(\TomatoPHP\FilamentSettingsHub\Settings\SitesSettings::class);

        if (isset($settings->site_profile)) {
            if (is_array($settings->site_profile) && isset($settings->site_profile[$locale])) {
                return $settings->site_profile[$locale];
            }
            if (is_string($settings->site_profile)) {
                return $settings->site_profile;
            }
        }

        return null;
    }
}
