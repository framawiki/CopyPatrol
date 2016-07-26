<?php
/**
 * This file is part of CopyPatrol application
 * Copyright (C) 2016  Niharika Kohli and contributors
 *
 * This program is free software: you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the Free
 * Software Foundation, either version 3 of the License, or (at your option)
 * any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or
 * FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for
 * more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @author MusikAnimal <musikanimal@wikimedia.org>
 * @copyright © 2016 Niharika Kohli and contributors.
 */
namespace Plagiabot\Web\Controllers;

use Wikimedia\Slimapp\Controller;

class Leaderboard extends Controller {

	/**
	 * @param \Slim\Slim $slim Slim application
	 */
	public function __construct( \Slim\Slim $slim = null, $wiki = 'https://en.wikipedia.org' ) {
		parent::__construct( $slim );
		$this->wikipedia = $wiki;
	}

	/**
	 * Handle GET route for app
	 * @return null nothing
	 */
	protected function handleGet() {
		$data = $this->dao->getLeaderboardData();
		$this->view->set( 'data', $data );
		$this->view->set( 'wiki', $this->wikipedia );
		$this->render( 'leaderboard.html' );
	}
}