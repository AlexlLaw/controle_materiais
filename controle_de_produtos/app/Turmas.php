<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Turmas
 * @package App
 */
class Turmas extends Model
{

    /**
     * @var bool
     */
    public  $timestamps = false;

    /**
     * @var string[]
     */
    protected $fillable = ['nome'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function turmasMateriais()
    {
        return $this->hasMany(TurmasMateriais::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function alunos()
    {
      return  $this->hasMany(Serie::class);
    }
}
