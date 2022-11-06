<?php

    namespace App\Models;

    use Cknow\Money\Money;
    use Cviebrock\EloquentSluggable\Sluggable;
    use DateTimeInterface;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;
    use Illuminate\Database\Eloquent\Relations\HasMany;
    use Illuminate\Database\Eloquent\SoftDeletes;
    use Spatie\Image\Exceptions\InvalidManipulation;
    use Spatie\MediaLibrary\HasMedia;
    use Spatie\MediaLibrary\InteractsWithMedia;
    use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;
    use Spatie\MediaLibrary\MediaCollections\Models\Media;

    class Product extends Model implements HasMedia
    {
        use SoftDeletes;
        use InteractsWithMedia;
        use HasFactory;
        use Sluggable;

        public const STATUS_SELECT = [
            'Available' => 'Available',
            'Not Available' => 'Not Available',
        ];

        public $table = 'products';

        protected $appends = [
            'image',
        ];

        protected $dates = [
            'created_at',
            'updated_at',
            'deleted_at',
        ];

        protected $fillable = [
            'category_id',
            'name',
            'slug',
            'price',
            'status',
            'description',
            'created_at',
            'updated_at',
            'deleted_at',
        ];

        /**
         * @throws InvalidManipulation
         */
        public function registerMediaConversions(Media $media = null): void
        {
            $this->addMediaConversion('thumb')->fit('crop', 120, 120);
            $this->addMediaConversion('preview');
        }

        public function category(): BelongsTo
        {
            return $this->belongsTo(Category::class, 'category_id');
        }

        public function getImageAttribute(): MediaCollection
        {
            $files = $this->getMedia('image');
            $files->each(function ($item) {
                $item->url = $item->getUrl();
                $item->thumbnail = $item->getUrl('thumb');
                $item->preview = $item->getUrl('preview');
            });

            return $files;
        }

        protected function serializeDate(DateTimeInterface $date): string
        {
            return $date->format('Y-m-d H:i:s');
        }

        public function scopeAvailable($query)
        {
            return $query->where('status', 'Available');
        }

        protected static function boot()
        {
            parent::boot();
            static::addGlobalScope('category', function (Builder $builder) {
                $builder->whereHas('category');
            });
        }

        public function formattedPrice(): Money
        {
            return Money::RWF($this->price);
        }

        public function orderItems(): HasMany
        {
            return $this->hasMany(OrderItem::class);
        }

        /**
         * Return the sluggable configuration array for this model.
         *
         * @return array
         */
        public function sluggable(): array
        {
            return [
                'slug' => [
                    'source' => 'name'
                ],

            ];
        }
    }
