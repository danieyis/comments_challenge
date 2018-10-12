<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'article';

    /**
     * Relation One-to-Many between Article (One) to Comment (Many)
     *
     * @author Dany
     */
    function comment(){
        return $this->hasMany(Comment::class,'article_id')
            ->where('parent_id',0)->orderBy('created_at','desc');

    }
}
