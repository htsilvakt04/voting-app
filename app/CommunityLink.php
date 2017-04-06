<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Exceptions\CommunityLinkAlreadySubmitted;

class CommunityLink extends Model
{
    protected $approved = false;
	protected $fillable = [
		"user_id",
		"channel_id",
		"title",
		"link",
        "approved"
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
        if($user->isTrusted()) {

            return new static([
                "user_id" => $user->id,
                "approved" => true
            ]);

        }

        return new static(["user_id" => $user->id]);
    	
    }

    public function contribute(array $contribute, $caller)
    {

        if ($exist = $this->hasAlreadyBeenSubmitted($contribute['link'])) { 
            $exist->touch();

            throw new CommunityLinkAlreadySubmitted;
        }
        
    	$this->fill($contribute)->save();
        return $this;
    }

    public function approved()
    {
        return !! $this->approved;
    }

    public function hasAlreadyBeenSubmitted($link)
    {   
        // additional: filter $link 
        return static::where('link', $link)->first();
    }

    public function scopeForChannel($builder ,Channel $channel)
    {
        if ($channel->exists) {
            return $builder->where('channel_id', $channel->id);
        }
        return $builder;
    }

    public function votes()
    {
        return $this->hasMany(CommunityLinkVote::class, 'community_link_id');
    }
    
}
