<?php

namespace App;

use App\CommunityLink;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isTrusted()
    {
        return !! $this->trusted;
    }


    public function votes()
    {
        return $this->belongsToMany(CommunityLink::class, 'community_links_votes')
                    ->withTimestamps();
    }

    public function votedOn(CommunityLink $link)
    {
        return $link->votes->contains('user_id', $this->id);
    }
}
