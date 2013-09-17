<?php

class VoteController extends BaseController {

	public function vote($image_id, $vote)
	{
		if (Auth::guest()) {
			return Response::json(array('success' => false, 'message' => 'You must be logged in to vote!'));
		} else {
			Votes::insert(array(
				'user_id' => Auth::user()->id,
				'image_id' => $image_id,
				'vote' => $vote
			));
			return Response::json(array('success' => true));
		}
	}

}