<?php

namespace inWidget\Exception;

class inWidgetException extends \Exception
{
	public function __construct($text, $code, $cacheFile)
	{
		$text = str_replace('{$cacheFile}', $cacheFile, $text);
		$text = strip_tags($text);
		$result = '<b>ERROR <a href="https://inwidget.ru/#error'.$code.'" target="_blank">#'.$code.'</a>:</b> '.$text;
		if($code >= 401) {
			file_put_contents($cacheFile, $result, LOCK_EX);
		}
		\Exception::__construct($result, $code);
	}
}
