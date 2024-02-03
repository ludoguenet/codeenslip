<?php

declare(strict_types=1);

namespace App\Models;

use App\Concerns\InteractsWithMedia;
use App\Contracts\HasMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class Ad extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    /**
     * @return BelongsTo<User, Ad>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
