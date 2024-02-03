<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\StreamedResponse;

final class Media extends Model
{
    use HasFactory;

    /**
     * @return MorphTo<Model, Media>
     */
    public function mediable(): MorphTo
    {
        return $this->morphTo();
    }

    public function getPath(): string
    {
        $diskRoot = config('filesystems.disks.'.$this->disk.'.root');

        return $diskRoot.DIRECTORY_SEPARATOR.$this->path.DIRECTORY_SEPARATOR.$this->file_name;
    }

    public function stream(): StreamedResponse
    {
        return Storage::download($this->path.DIRECTORY_SEPARATOR.$this->file_name);
    }

    public function getUrl(): string
    {
        return URL::signedRoute('media.url', $this->id);
    }
}
