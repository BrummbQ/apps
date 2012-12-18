<ul>
	<li class="feed_item"
		ng-repeat="item in getItems(activeFeed.type, activeFeed.id) | orderBy:'date':true "
		ng-class="{read: item.isRead}"
		data-id="{{item.id}}"
    	data-feed="{{item.feedId}}">
		<h2 class="item_date">
			<time class="timeago" datetime="">{{item.getRelativeDate()}}</time>
		</h2>
		
		<div class="utils">
			<ul class="primary_item_utils">
				<li ng-class="{important: item.isImportant}"
					ng-click="toggleImportant(item.id)"
					class="star" 
					title="{{item.isImportant}}">
				</li>
			</ul>
		</div>

		<h1 class="item_title">
			<a ng-click="markRead(item.id, item.feedId)" 
				target="_blank" href="{{item.url}}">{{item.title}}</a>
		</h1>

		<h2 class="item_author">from 
			<a href="#" 
				ng-click="loadFeed(item.feedId)"
				class="from_feed">{{item.feedTitle}}</a> {{item.getAuthorLine()}}
		</h2>

		<div class="body" 
				ng-click="markRead(item.id, item.feedId)" 
				ng-bind-html-unsafe="item.body"></div>

		<div class="bottom_utils">
			<ul class="secondary_item_utils"
				ng-class="{show_keep_unread: isKeptUnread(item.id)}">
				<li class="share_link">
					<a class="share" data-item-type="news_item" 
					   data-item="{{item.id}}" title="<?php p($l->t('Share')) ?>" 
					   data-possible-permissions="<?php //p((OCP\Share::PERMISSION_READ | OCP\Share::PERMISSION_SHARE)) ?>" 
					   href="#">
					   <?php p($l->t('Share')) ?>
		  			</a>
		  		</li>
				<li ng-click="keepUnread(item.id, item.feedId)" 
					class="keep_unread"><?php p($l->t('Keep unread')); ?>
					<input type="checkbox" ng-checked="isKeptUnread(item.id)"/>
				</li>
			</ul>
		</div>
	</li>
</ul>

<?php /*
echo '<ul>';
foreach($items as $item) {

	if($item->isRead()) {
		$newsItemClass = "read";
	} else {
		$newsItemClass = "";
	}

	if($item->isImportant()) {
		$starClass = 'important';
		$startTitle = $l->t('Mark as unimportant');
	} else {
		$starClass = '';
		$startTitle = $l->t('Mark as important');
	}

	echo '<li class="feed_item ' . $newsItemClass .'" data-id="' . $item->getId() . '" data-feedid="' . $item->getFeedId() . '">';
		echo '<span class="timestamp">' . $item->getDate() . '</span>';
		$relative_modified_date = OCP\relative_modified_date($item->getDate());
		echo '<h2 class="item_date"><time class="timeago" datetime="' .
			date('c', $item->getDate()) . '">' . $relative_modified_date .  '</time>' . '</h2>';

		echo '<div class="utils">';
			echo '<ul class="primary_item_utils">';
				echo '<li class="star ' . $starClass . '" title="' . $startTitle . '"></li>';
			echo '</ul>';
		echo '</div>';

		echo '<h1 class="item_title"><a target="_blank" href="' . $item->getUrl() . '">' . htmlspecialchars($item->getTitle(), ENT_QUOTES, 'UTF-8') . '</a></h1>';

		if ((int)$lastViewedFeedType !== OCA\News\FeedType::FEED) {
			$feedTitle = $l->t('from') . ' ' . '<a href="#" class="from_feed"> ' . $item->getFeedTitle() . '</a> ';
		} else {
			$feedTitle = '';
		}

		if(($item->getAuthor() !== null) && (trim($item->getAuthor()) !== '')) {
			$author = $l->t('by') . ' ' . htmlspecialchars($item->getAuthor(), ENT_QUOTES, 'UTF-8');
		} else {
			$author = '';
		}

		if(!($feedTitle === '' && $author === '')){
			echo '<h2 class="item_author">'. $feedTitle . $author . '</h2>';
		}

		echo '<div class="body">';
		echo $item->getBody();
		
		if($item->getEnclosure() !== null) {
			$enclosure = $item->getEnclosure();
			$enclosureType = htmlspecialchars($enclosure->getMimeType(), ENT_QUOTES, 'UTF-8');
			$enclosureLink = htmlspecialchars($enclosure->getLink(), ENT_QUOTES, 'UTF-8');
			$enclosureFilename = htmlspecialchars(basename($enclosureLink), ENT_QUOTES, 'UTF-8');
			
			echo '<br /><br /><audio controls="controls"><source src="' . $enclosureLink . '" type="' . $enclosureType . '"></source></audio><br />';
			echo '<a href="' . $enclosureLink . '" target="_blank">Original audio source (' . $enclosureFilename . ')</a>';
		}
		
		echo '</div>';

		echo '<div class="bottom_utils">';
			echo '<ul class="secondary_item_utils">';
				echo '<li class="share_link"><a class="share" data-item-type="news_item" data-item="' . $item->getId() . '" title="' . $l->t('Share') .
		      '" data-possible-permissions="' . (OCP\PERMISSION_READ | OCP\PERMISSION_SHARE) . '" href="#">' . $l->t('Share') . '</a></li>';
				echo '<li class="keep_unread">' . $l->t('Keep unread') . '<input type="checkbox" /></li>';
			echo '</ul>';
		echo '</div>';


	echo '</li>';

	}
echo '</ul>';
*/
