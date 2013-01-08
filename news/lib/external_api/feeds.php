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

class OC_News_API_Feeds {

    public static function getFeeds($parameters){
        $feedmapper = new OCA\News\FeedMapper();
        $feeds = $feedmapper->findAll();
        return new OC_OCS_Result($feeds);
    }
}
