<?php
require_once 'FeedController.php';
class DefaultController extends Controller
{
	public function index($params=''){
		require_once (VIEW_PATH. 'home/index.php');
	}
}
