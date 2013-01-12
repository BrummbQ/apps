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

class API_Feed {

	private $feedLogic;
	private $feedMapper;
	private $folderMapper;

	/**
	 * @param FeedLogic $feedlogic: an instance of the feed logic
	 * @param FeedMapper $feedMapepr an instance of the feed mapper
	 * @param FolderMapper $folderMapper an instance of the folder mapper
	 */
	public function __construct($feedLogic, $feedMapper, $folderMapper){
		$this->feedLogic = $feedLogic;
		$this->feedMapper = $feedMapper;
		$this->folderMapper = $folderMapper;
	}

    public function getFeeds($parameters){
		$feedmapper = new FeedMapper();
		$feeds = $feedmapper->findAll();

		$feedsArray = array();
		foreach($feeds as $feed){
			 array_push($feedsArray, array(
				'id' => (int)$feed->getId(),
				'title' => $feed->getTitle(),
				'folderId' => (int)$feed->getFolderId(),
				'icon' => $feed->getFavicon(),
				'url' => $feed->getUrl()
				)
			);
		}

		return new \OC_OCS_Result($feedsArray);
    }
}
