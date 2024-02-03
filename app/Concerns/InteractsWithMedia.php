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

    public function addMedia(
        UploadedFile $file,
        string $path,
        ?string $disk = null,
        ?string $collection = null
    ): void {
        $name = Str::random();
        $extension = $file->extension();
        $fileName = $name.'.'.$extension;
        $mimeType = $file->getClientMimeType();

        $media = Media::create([
            'name' => $name,
            'file_name' => $fileName,
            'mime_type' => $mimeType,
            'path' => $path,
            'disk' => $disk ?? 'local',
            'file_hash' => base64_encode($name),
            'collection' => $collection ?? null,
            'size' => $file->getSize(),
            'mediable_type' => get_class($this),
            'mediable_id' => $this->id,
        ]);

        $media = $file->storeAs(
            $media->path,
            $fileName,
            $media->disk,
        );
    }

    public function firstMedia(): Media
    {
        $this->loadMissing('media');

        return $this->media->first();
    }
}
