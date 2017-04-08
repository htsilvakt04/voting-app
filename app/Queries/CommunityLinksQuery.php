<?php 
namespace App\Queries;

use App\Channel;
use App\CommunityLink;

class CommunityLinksQuery
{
	
   public function get(Channel $channel)
   {
   		$order = request()->exists('popular') ? 'votes_count' : 'updated_at';

   	  	return CommunityLink::with('creator', 'channel')
            ->withCount('votes')
            ->forChannel($channel)
            ->where('approved', 1)
            ->orderBy($order, 'desc')
            ->paginate(5);
   }
}	