<?php

class Thread extends Eloquent {

	protected $fillable = array('title', 'body', 'user', 'ip_addr', 'location', 'sticky');

    public function setTitleAttribute($value) {
        $this->attributes['title'] = htmlspecialchars(trim($value));
    }

    public function setBodyAttribute($value) {
        $this->attributes['body'] = htmlspecialchars(trim($value));
    }

    public function getBodyAttribute($value) {
        return BBCoder::convert($value, 'ezrahub');
    }

    public static $sluggable = array(
        'build_from' => 'title',
        'save_to'    => 'slug',
    );

    public function replies() {
        return $this->hasMany('Reply');
    }

}
