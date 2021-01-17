<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendasItens extends Model
{
    /**
     * @var bool
     */
    public  $timestamps = false;

    /**
     * @var string[]
     */
    protected $fillable = ['vendas_id', 'produto_id', 'preco', 'qtd_produtos'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vendas()
    {
      return  $this->hasMany(Vendas::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function produtos()
    {
      return  $this->hasMany(Produtos::class);
    }

}
