<?php

/* This file is part of Jeedom.
 *
 * Jeedom is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Jeedom is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Jeedom. If not, see <http://www.gnu.org/licenses/>.
 */

try {
	require_once dirname(__FILE__) . '/../../../../core/php/core.inc.php';
	include_file('core', 'authentification', 'php');

	if (!isConnect('admin')) {
		throw new Exception(__('401 - Accès non autorisé', __FILE__));
	}

	if (init('action') == 'getNetworks') {
		if (init('object_id') == '') {
			$object = jeeObject::byId($_SESSION['user']->getOptions('defaultDashboardObject'));
		} else {
			$object = jeeObject::byId(init('object_id'));
		}
		if (!is_object($object)) {
			$object = jeeObject::rootObject();
		}
		$return = array();
		$return['eqLogics'] = array();
		if (init('object_id') == '') {
			foreach (jeeObject::all() as $object) {
				foreach ($object->getEqLogic(true, false, 'networks') as $networks) {
					$return['eqLogics'][] = $networks->toHtml(init('version'));
				}
			}
		} else {
			foreach ($object->getEqLogic(true, false, 'networks') as $networks) {
				$return['eqLogics'][] = $networks->toHtml(init('version'));
			}
			foreach (jeeObject::buildTree($object) as $child) {
				$networks = $child->getEqLogic(true, false, 'networks');
				if (count($networks) > 0) {
					foreach ($networks as $networks) {
						$return['eqLogics'][] = $networks->toHtml(init('version'));
					}
				}
			}
		}
		ajax::success($return);
	}

	throw new Exception(__('Aucune methode correspondante à : ', __FILE__) . init('action'));
	/*     * *********Catch exeption*************** */
} catch (Exception $e) {
	if (version_compare(jeedom::version(), '4.4', '>=')) {
		ajax::error(displayException($e), $e->getCode());
	} else {
		ajax::error(displayExeption($e), $e->getCode());
	}
}
