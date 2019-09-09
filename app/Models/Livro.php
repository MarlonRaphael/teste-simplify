<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Livro extends Model implements HasMedia
{
    use HasMediaTrait;

    //-------------------------------------------------------------------
    //          Attributes
    //-------------------------------------------------------------------

    protected $table = 'livros';

    protected $guarded = ['id'];

    protected $fillable = [
        'titulo',
        'autor',
        'editora',
        'idioma',
        'edicao',
        'ano',
        'formato',
        'paginas',
        'sinopse',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];


    //-------------------------------------------------------------------
    //          Accessor Methods
    //-------------------------------------------------------------------

    /**
     * @param $date
     * @return mixed
     */
    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d/m/Y H:i');
    }

    /**
     * @param $date
     * @return mixed
     */
    public function getUpdatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d/m/Y H:i');
    }

    /**
     * Get cover post
     * @return string
     */
    public function getCapaAttribute()
    {
        return $this->hasMedia('capa')
            ? $this->getMedia('capa')[0]->getUrl('thumb')
            : null;
    }

    //-------------------------------------------------------------------
    //          Midia Library
    //-------------------------------------------------------------------

    /**
     * Registro de Midia Collections
     */
    public function registerMediaCollections()
    {
        /**
         * Manipulando Capa
         */
        $this->addMediaCollection('capa')
            ->useDisk('capa')
            ->singleFile()
            ->registerMediaConversions(function (Media $media) {
                $this->addMediaConversion('thumb')
                    ->width(221)
                    ->height(171);
            });
    }
}
