<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

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
}
