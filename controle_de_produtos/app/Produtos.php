<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    /**
     * @var bool
     */
    public  $timestamps = false;

    /**
     * @var string[]
     */
    protected $fillable = ['nome', 'qtd_produto', 'valor'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function turmasMateriais()
    {
        return $this->belongsTo(TurmasMateriais::class);
    }

    /**
     *
     */
    public function vendasItens()
    {
      return $this->hasMany(VendasItens::class);
    }
}
