<?php
	class AddonsOnline
	{
		private $arrayScript = array();

		function __construct()
		{

		}

		public function setScript($element='', $type='', $scrolltop=1, $width, $height)
		{
			$script = '';

			if($element && $type)
			{
				$script = '<script type="text/javascript">$(function(){var a=!1;$(window).scroll(function(){$(window).scrollTop()>'.$scrolltop.' && !a&&($("#'.$element.'").load("ajax/ajax_load.php?type='.$type.'&width='.$width.'&height='.$height.'"),a=!0)})});</script>';
				$this->arrayScript[] = $script;
			}
		}

		public function setAddons($element='', $type='', $scrolltop=1, $width=0, $height=0)
		{
			$elementAddons = '';

			if($element && $type)
			{
				$elementAddons = '<div id="'.$element.'"></div>';
				$this->setScript($element, $type, $scrolltop, $width, $height);
			}

			return $elementAddons;
		}

		public function getAddons()
		{
			$textAddons = '';

			if($this->arrayScript)
			{
				foreach($this->arrayScript as $v)
				{
					$textAddons .= $v;
				}
			}

			return $textAddons;
		}
	}
?>