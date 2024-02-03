<?php

declare(strict_types=1);

namespace App\Concerns;

use App\Models\Media;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

/**
 * @property-read string $disk
 * @property-read string $path
 */
trait InteractsWithMedia
{
    /**
     * @return MorphMany<Media>
     */
    public function media(): MorphMany
    {
        return $this->morphMany(Media::class, 'mediable');
    }

    public function addMedia(UploadedFile $file): void
    {
        $fileName = Str::random();

        $file->store(
            $this->path.'/'.$fileName, $this->disk,
        );
    }
}
