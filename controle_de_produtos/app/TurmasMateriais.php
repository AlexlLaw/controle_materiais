<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TurmasMateriais extends Model
{

    /**
     * @var bool
     */
    public  $timestamps = false;

    /**
     * @var string[]
     */
    protected $fillable = ['turma_id', 'produto_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function turmas()
    {
        return $this->belongsTo(Turmas::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function produtos()
    {
        return $this->hasMany(Produtos::class);
    }
}
