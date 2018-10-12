<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Comment extends Model
{
    protected $table = 'comment';
    protected $fillable = [
        'username', 'content','article_id', 'parent_id','create_at','updated_at'
    ];

    /**
     * Created relation between parent_id and id
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     *
     * @author Dany
     */
    public function replies(){
        return $this->hasMany(Comment::class, 'parent_id', 'id')
            ->orderBy('created_at','desc');
    }

    /**
     * Insert new comment into database
     *
     * @param $p_article_id
     * @param $p_parent_id
     * @param $p_username
     * @param $p_content
     *
     * @return Comment
     *
     * @author Dany
     */
    public static function addComment($p_article_id,$p_parent_id, $p_username, $p_content){
        $newComment = new Comment();
        $newComment->username = $p_username;
        $newComment->content = $p_content;
        $newComment->parent_id = $p_parent_id;
        $newComment->article_id = 1;
        $newComment->save();
        return $newComment;
    }
}
