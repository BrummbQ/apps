<?php

/**
* ownCloud - News app
*
* @author
* @copyright 2013
*
* This file is licensed under the Affero General Public License version 3 or later.
* See the COPYING-README file
*
*/

namespace OCA\News;

class API_Folder {

    public static function getFolders($parameters) {
		$foldermapper = new FolderMapper();
		$folders = $foldermapper->childrenOf(0);

		$foldersArray = array();
		foreach($folders as $folder){
			 array_push($foldersArray, array(
				'id' => (int)$folder->getId(),
				'name' => $folder->getName(),
				'parentId' => (int)$folder->getParentId(),
				'opened' => (int)$folder->getOpened()
				)
			);
		}

		return new \OC_OCS_Result($foldersArray);
    }
}
