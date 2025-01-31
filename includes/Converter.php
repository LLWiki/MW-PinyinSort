<?php
namespace MediaWiki\Extension\PinyinSort;

class Converter {

	public static function zh2pinyin($string) {
		$len = mb_strlen($string, 'UTF-8');
		$builder = '';
		for ($i = 0; $i < $len; $i++) {
			$char = mb_substr($string, $i, 1, 'UTF-8');
			$charLen = strlen($char);
			if (ord($char[0]) < 128) {
				$builder .= $char;
			} else if (isset(PinyinConversion::$zh2pinyin[$char])) {
				$builder .= ucfirst(PinyinConversion::$zh2pinyin[$char]);
			} else {
				$builder .= '?';
			}
		}
		return $builder;
	}

	public static function kana2Romaji( $str ) {
		return strtr( $str, KanaConversion::CONVERSION_TABLE );
	}
}
