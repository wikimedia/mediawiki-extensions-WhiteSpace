<?php // WhiteSpace.php //

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
	die( 'Not an entry point.' );
}; # if

global $wgAutoloadClasses;
$wgAutoloadClasses[ 'WhiteSpace' ] = __DIR__ . '/WhiteSpace.class.php';

global $wgHooks;
$wgHooks[ 'ParserBeforePreprocess' ][] = 'WhiteSpace::onParserBeforePreprocess';
$wgHooks[ 'ParserBeforeStrip'      ][] = 'WhiteSpace::onParserBeforeStrip';

global $wgMessagesDirs;
$wgMessagesDirs['WhiteSpace'] = __DIR__ . '/i18n';

global $wgExtensionCredits;
$wgExtensionCredits[ 'parserhook' ][] = array(
	'path'    => __FILE__,
	'name'    => 'WhiteSpace',
	'version' => '0.1.0',
	'license' => 'AGPLv3',
	'author'  => array( '[https://www.mediawiki.org/wiki/User:Van_de_Bugger Van de Bugger]' ),
	'url'     => 'https://www.mediawiki.org/wiki/Extension:WhiteSpace',
	'descriptionmsg'  => 'whitespace-desc',
);

// end of file //
