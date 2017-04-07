<?php

namespace App\Http\Controllers;

use App\CommunityLink;
use App\CommunityLinkVote;
use Illuminate\Http\Request;

class VotesController extends Controller
{
	public function __construct()
	{
		$this->middleware("auth");
	}
    public function store(CommunityLink $link)
    {
    	
    	CommunityLinkVote::firstOrNew([
    		'user_id' => auth()->id(),
    		'community_link_id' => $link->id
    	])->toggle();

    	return back();
    }
}
