<?php
abstract class TRSideBarWidget{
	abstract public function display();

	abstract public static function getCount();

	public function refresh(){
		return $this->display(false);
	}

	public static function getJsAfterLoad(){
		return '';
	}

	public static function getJsAfterRefresh(){
		return '';
	}

	public static function getJsIncludeAfterRefresh(){
		return '';
	}

	public static function getJsIncludes(){
		return '';
	}

	public function getToggle($menu) {
		global $current_user;
		$collapsed = $current_user->getPreference($menu.'_collapsed');
		if(!isset($collapsed)){
			$collapsed = true;
		}
		return $collapsed;
	}
}