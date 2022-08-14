<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

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
        'title_en',
        'title_ar',
        'price',
        'discount_percentage',
        'description_en',
        'description_ar',
        'link',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getImageAttribute()
    {
        $file = $this->getMedia('image')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getTitleAttribute(){
        if(\App::getLocale() == 'en'){
            return $this->title_en;
        }else{
            return $this->title_ar;
        }
    }
    public function getDescriptionAttribute(){
        if(\App::getLocale() == 'en'){
            return $this->description_en;
        }else{
            return $this->description_ar;
        }
    }

    protected $append = ['discounted_price'];

    public function getDiscountedPriceAttribute()
    {
        return round( $this->price - ($this->discount_percentage/100) * $this->price); // Here just the example, add your logic to calculate the price.
    }
}
