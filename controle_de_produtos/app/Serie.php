<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Serie
 * @package App
 */
class Serie extends Model
{
    /**
     * @var bool
     */
  public  $timestamps = false;

    /**
     * @var string[]
     */
  protected $fillable = ['nome','dt_nascimento', 'turma', 'cep', 'endereco', 'bairro', 'cidade', 'uf'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
  public function vendas()
  {
      return $this->hasMany(Vendas::class);
  }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
  public function turmas()
  {
      return $this->belongsTo(Turmas::class);
  }
}
