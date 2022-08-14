<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactField extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'contact_fields';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'value',
        'about_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function about()
    {
        return $this->belongsTo(About::class, 'about_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
