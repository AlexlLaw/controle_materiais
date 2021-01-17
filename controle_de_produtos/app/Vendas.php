<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendas extends Model
{

    /**
     * @var bool
     */
    public  $timestamps = false;

    /**
     * @var string[]
     */
    protected $fillable = ['serie_id', 'dt_venda', 'finalizada'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function series()
    {
        return $this->belongsTo(Serie::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vendasItens()
    {
       return $this->hasMany(VendasItens::class);
    }
}
