<?php

namespace App\Http\Controllers;

use App\Channel;
use App\CommunityLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommunityLinkRequest;
use App\Exceptions\CommunityLinkAlreadySubmitted;

class CommunityLinkController extends Controller
{
    public function index(Channel $channel = null)
    {
    	$links = CommunityLink::with('votes')->forChannel($channel)
            ->where('approved', 1)
            ->latest('updated_at')
            ->paginate(5);

        $channels = Channel::orderBy('title', 'asc')->get();
    	
    	return view('community.index', compact('links', 'channels', 'channel'));
    }
    public function store(CommunityLinkRequest $request)
    {
        try {
            $link = CommunityLink::from(auth()->user())
            ->contribute($request->only(["title", "link", "channel_id"]));

            if(auth()->user()->isTrusted()) {
                session()->flash('thanks','Thanks for your contribution');
            } else {
                session()->flash('thanks','Wait for someone approves your link!');
            }

        } catch (CommunityLinkAlreadySubmitted $e) {
            session()->flash('thanks','Your link has been already submitted');
        }

    	return back();
    }


}
