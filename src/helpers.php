<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Panelis\Setting\Panel\Clusters\Settings\Enums\NumberFormat;

if (! function_exists('get_timezone')) {
    function get_timezone(): string
    {
        return config('app.datetime_timezone', config('app.timezone'));
    }
}

if (! function_exists('get_datetime_format')) {
    function get_datetime_format(): string
    {
        return config('app.datetime_format', 'Y-m-d H:i');
    }
}

if (! function_exists('get_date_format')) {
    function get_date_format(): string
    {
        $key = 'app.date_format';
        if (! config()->has($key)) {
            Log::warning(sprintf('Key config %s does not exists.', $key));
        }

        return config($key, default: 'Y-m-d');
    }
}

if (! function_exists('get_time_format')) {
    function get_time_format(): string
    {
        $key = 'app.time_format';
        if (! config()->has($key)) {
            Log::warning(sprintf('Key config %s does not exists.', $key));
        }

        return config($key, default: 'H:i');
    }
}

if (! function_exists('get_color_theme')) {
    function get_color_theme(?string $selected = null): string
    {
        return $selected ?? config('color.theme', 'zinc');
    }
}

if (! function_exists('set_locale')) {
    function set_locale(string $locale): void
    {
        $locales = config('app.locales', [config('app.locale')]);
        if ($locale !== app()->getLocale() && in_array($locale, $locales)) {
            app()->setLocale($locale);
        }
    }
}

if (! function_exists('human_number')) {
    function human_number(int|float $number): string
    {
        $configuredFormat = config('app.number_format');

        if (empty($configuredFormat)) {
            Log::warning('Config app.number_format is not set. Using default: "0 . ,".');

            return number_format($number);
        }

        if ($configuredFormat instanceof NumberFormat) {
            return number_format($number, ...$configuredFormat->display());
        }

        $format = NumberFormat::tryFrom((string) $configuredFormat);

        if ($format !== null) {
            return number_format($number, ...$format->display());
        }

        $parts = explode(' ', (string) $configuredFormat);

        if (count($parts) !== 3) {
            Log::warning('Invalid config app.number_format. Using default: "0 . ,".');

            return number_format($number);
        }

        [$decimal, $thousand, $separator] = $parts;

        return number_format($number, (int) $decimal, $thousand, $separator);
    }
}

if (! function_exists('get_logo')) {
    function get_logo(): ?string
    {
        return filled(config('app.logo')) ? Storage::url(config('app.logo')) : null;
    }
}

if (! function_exists('get_favicon')) {
    function get_favicon(): ?string
    {
        return filled(config('app.favicon')) ? Storage::url('app.favicon') : null;
    }
}
