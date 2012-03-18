<?php // WhiteSpace.class.php //

/*
	------------------------------------------------------------------------------------------------
	WhiteSpace, a MediaWiki extension for controlling white space.
	Copyright (C) 2012 Van de Bugger.

	This program is free software: you can redistribute it and/or modify it under the terms
	of the GNU Affero General Public License as published by the Free Software Foundation,
	either version 3 of the License, or (at your option) any later version.

	This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
	without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
	See the GNU Affero General Public License for more details.

	You should have received a copy of the GNU Affero General Public License along with this
	program.  If not, see <https://www.gnu.org/licenses/>.
	------------------------------------------------------------------------------------------------
*/

if ( ! defined( 'MEDIAWIKI' ) ) {
	die();
}; // if

class WhiteSpace {

	static private function callback( $match ) {
		switch ( $match[ 1 ] ) {
			case 'dws' : {
				return '';
			} break;
			case 'nl' : {
				return "\n" . $match[ 2 ];
			} break;
			default : {
				return $match[ 0 ];
			} break;
		}; // if
	} // function callback

	static private function replaceTags( &$text ) {
		$text = preg_replace_callback( '/<(dws|nl)\s*\/>(\s*)/', 'WhiteSpace::callback', $text );
	} // function replaceTags

	static public function onParserBeforePreprocess( $parser, &$text, $flags ) {
		if ( $flags & Parser::PTD_FOR_INCLUSION ) {
			self::replaceTags( $text );
		}; // if
		return true;
	} // function onParserBeforePreprocess

	static public function onParserBeforeStrip( &$parser, &$text, &$strip_state ) {
		self::replaceTags( $text );
		return true;
	} // function onParserBeforeStrip

} // class WhiteSpace

// end of file //
