<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produtos;

class Carrinho extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'produto_id',
        'quantidade',
    ];

    protected $table = 'carrinho';

    public function produto()
    {
        return $this->belongsTo(Produtos::class);
    }
}