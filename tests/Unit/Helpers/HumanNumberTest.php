<?php

use Panelis\Setting\Panel\Clusters\Settings\Enums\NumberFormat;

it('formats a number using the configured number format enum', function (): void {
    config(['app.number_format' => NumberFormat::CommaWithDecimal->value]);

    expect(human_number(1234567.89))->toBe('1.234.567,89');
});

it('formats a number when the configured value is a number format enum', function (): void {
    config(['app.number_format' => NumberFormat::DotWithoutDecimal]);

    expect(human_number(1234567.89))->toBe('1,234,568');
});

it('keeps supporting the legacy number format configuration', function (): void {
    config(['app.number_format' => '2 . ,']);

    expect(human_number(1234567.89))->toBe('1,234,567.89');
});

it('falls back to the default format when the configuration is invalid', function (): void {
    config(['app.number_format' => 'invalid']);

    expect(human_number(1234567.89))->toBe('1,234,568');
});
