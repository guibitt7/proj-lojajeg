<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'marca', 'modelo', 'tipo', 'descricao', 'preco', 'quantidade', 'imagem'];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function users(){
        return $this->belongsToMany('App\Models\User');
    }

    public function getImageAttribute($value)
    {
        return asset('/imagem/produtos/' . $value);
    }

    public function categoria() {
        return $this->belongsTo('App\Models\Categoria', 'id_categoria');
    }

}
