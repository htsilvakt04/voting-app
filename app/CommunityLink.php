<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommunityLink extends Model
{

	protected $fillable = [
		"user_id",
		"channel_id",
		"title",
		"link"
	];

    public function creator()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }
    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }
    public static function from(User $user)
    {
    	return new static(["user_id" => $user->id]);
    }
    public function contribute(array $contribute)
    {
    	return $this->fill($contribute)->save();
    }
    
}
