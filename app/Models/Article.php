<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Auteur;
use App\Models\Publication;

class Article extends Model
{
    use HasFactory;
    protected $table = 'article';
    protected $fillable = ['id','categorie','titre','resume','image','contenu','idauteur'];
    public $timestamps = false;

    public function getAuteur() {
        return Auteur::find($this->attributes['idauteur']);
    }

    public function getPublication() {
        return Publication::firstWhere('idarticle',$this->attributes['id']);
    }

    public function getEtat() {
        $publication = Publication::firstWhere('idarticle',$this->attributes['id']);
        if($publication->etat == 1) return "publié";
        else return "supprimé";
    }

    public function getLastNews() {
        $publication = Publication::latest('published_at')->first();
        return self::find($publication->idarticle);
    }

}
