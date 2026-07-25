<?php

namespace App\Services;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

class SettingService
{
    /**
     * Prefixo do cache.
     */
    protected string $cachePrefix = 'mythra.settings.';

    /**
     * Tempo do cache.
     */
    protected int $ttl = 86400;


    /**
     * Retorna uma configuração.
     */
    public function get(string $key, $default = null)
    {
        return Cache::remember(

            $this->cachePrefix . $key,

            $this->ttl,

            function () use ($key, $default) {

                $setting = Setting::active()
                    ->where('key', $key)
                    ->first();

                if (!$setting) {

                    return $default;

                }

                return $setting->value;

            }

        );
    }


    /**
     * Salva uma configuração.
     */
    public function set(
        string $key,
        $value
    ): bool {

        $setting = Setting::where(
            'key',
            $key
        )->first();

        if (!$setting) {

            return false;

        }

        $setting->value = $value;

        $saved = $setting->save();

        Cache::forget(
            $this->cachePrefix . $key
        );

        return $saved;
    }


    /**
     * Verifica existência.
     */
    public function has(string $key): bool
    {
        return Setting::active()

            ->where('key', $key)

            ->exists();
    }


    /**
     * Remove cache.
     */
    public function forget(string $key): void
    {
        Cache::forget(

            $this->cachePrefix . $key

        );
    }


    /**
     * Limpa todo cache das configurações.
     */
    public function clear(): void
    {
        Cache::flush();
    }


    /**
     * Retorna um grupo.
     */
    public function group(string $group)
    {
        return Setting::active()

            ->group($group)

            ->orderBy('sort_order')

            ->get();
    }


    /**
     * Carrega configurações automáticas.
     */
    public function autoload(): array
    {
        return Cache::remember(

            $this->cachePrefix . 'autoload',

            $this->ttl,

            function () {

                return Setting::active()

                    ->autoload()

                    ->orderBy('group')

                    ->orderBy('sort_order')

                    ->get()

                    ->pluck('value', 'key')

                    ->toArray();

            }

        );
    }


    /**
     * Atualização em massa.
     */
    public function update(array $values): void
    {
        foreach ($values as $key => $value) {

            $this->set(
                $key,
                $value
            );
        }

        Cache::forget(
            $this->cachePrefix . 'autoload'
        );
    }


    /**
     * Retorna todas.
     */
    public function all()
    {
        return Setting::active()

            ->orderBy('group')

            ->orderBy('sort_order')

            ->get();
    }
}