<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Casts\Attribute;

/**
 * trait for slugable model
 */
trait Slugable
{

    protected function slug(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => $this->generateUniqueSlug($value),
        );
    }

    private function generateUniqueSlug(string $value): string
    {
        $slug = $originalSlug = Str::slug($value) ?: Str::random(5);
        $counter = 0;

        while ($this->slugExists($slug, $this->exists ? $this->id : null)) {
            $counter++;
            $slug = $originalSlug . '-' . $counter;
        }

        return $slug;
    }

    private function slugExists(string $slug, int $ignoreId = null): bool
    {
        $query = $this->where('slug', $slug);

        if ($ignoreId) {
            $query->where('id', '!=', $ignoreId);
        }

        return $query->exists();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
