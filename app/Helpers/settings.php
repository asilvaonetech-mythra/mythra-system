<?php

use App\Models\Setting;
use App\Services\SettingService;

if (!function_exists('setting')) {

    /**
     * Retorna uma configuração.
     */
    function setting(
        string $key,
        $default = null
    ) {
        return app(SettingService::class)
            ->get($key, $default);
    }

}


if (!function_exists('setting_set')) {

    /**
     * Atualiza uma configuração.
     */
    function setting_set(
        string $key,
        $value
    ): bool {

        return app(SettingService::class)
            ->set($key, $value);

    }

}


if (!function_exists('setting_has')) {

    /**
     * Verifica se existe.
     */
    function setting_has(
        string $key
    ): bool {

        return app(SettingService::class)
            ->has($key);

    }

}


if (!function_exists('setting_group')) {

    /**
     * Retorna um grupo.
     */
    function setting_group(
        string $group
    ) {

        return app(SettingService::class)
            ->group($group);

    }

}


if (!function_exists('setting_all')) {

    /**
     * Todas as configurações.
     */
    function setting_all()
    {
        return app(SettingService::class)
            ->all();
    }

}


if (!function_exists('setting_cache_clear')) {

    /**
     * Limpa o cache.
     */
    function setting_cache_clear(): void
    {
        app(SettingService::class)
            ->clear();
    }

}


if (!function_exists('setting_autoload')) {

    /**
     * Configurações automáticas.
     */
    function setting_autoload(): array
    {
        return app(SettingService::class)
            ->autoload();
    }

}


if (!function_exists('setting_model')) {

    /**
     * Retorna o model da configuração.
     */
    function setting_model(
        string $key
    ): ?Setting {

        return Setting::where(
            'key',
            $key
        )->first();

    }

}