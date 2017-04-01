<?php

namespace App\Http\Controllers;

use App\Channel;
use App\CommunityLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommunityLinkRequest;

class CommunityLinkController extends Controller
{
    public function index()
    {
    	$links = CommunityLink::paginate(15);
        $channels = Channel::orderBy('title', 'asc')->get();
    	
    	return view('community.index', compact('links', 'channels'));
    }
    public function store(CommunityLinkRequest $request)
    {
    	$link = CommunityLink::from(auth()->user())
            ->contribute($request->only(["title", "link", "channel_id"]));

    	return redirect('/community');
    }
}
