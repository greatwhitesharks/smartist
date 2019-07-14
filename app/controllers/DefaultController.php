<?php
require_once 'FeedController.php';
class DefaultController extends Controller
{
	public function index($params=''){
		echo file_get_contents(VIEW_PATH. 'home/index.php');
	}
}
