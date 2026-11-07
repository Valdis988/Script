<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    protected $fillable = ['price'];

    public function translations(): HasMany
    {
        return $this->hasMany(ServiceTranslation::class);
    }


    public function translate(?string $locale = null): ?ServiceTranslation
    {
        $locale   ??= app()->getLocale();
        $fallback = 'uk';

        $translations = $this->relationLoaded('translations')
            ? $this->translations
            : $this->translations()->get();

        return $translations->firstWhere('locale', $locale)
            ?? $translations->firstWhere('locale', $fallback)
            ?? $translations->first();
    }


    public function hasTranslation(?string $locale = null): bool
    {
        $locale ??= app()->getLocale();

        $translations = $this->relationLoaded('translations')
            ? $this->translations
            : $this->translations()->get();

        return $translations->contains('locale', $locale);
    }


    protected function name(): Attribute
    {
        return Attribute::get(fn () => $this->translate()?->name);
    }

    protected function description(): Attribute
    {
        return Attribute::get(fn () => $this->translate()?->description);
    }
}
