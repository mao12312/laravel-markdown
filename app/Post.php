<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use cebe\markdown\Markdown as Markdown;

class Post extends Model
{
    protected $fillable = [
        'title',
        'text',
    ];

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    // Markdown setting
    public function parse()
    {
        //make new instance
        $parser = new Markdown();
        //Parse
        return $parser->parse($this->text);
    }

    public function getMarkTextAttribute()
    {
        return $this->parse();
    }
}
