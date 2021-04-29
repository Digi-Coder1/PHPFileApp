<?php

/**
Class DemoThemeMethods: contains methods used in generating dynamic navigation and links

*/

if (!class_exists('DemoThemeMethods')) {

	class DemoThemeMethods
	{

		/**
		checkActiveLink(string $text, string $active): checks a string($text) to see if
		matches an active class indicator($active). Returns string "active" if it matches.
		*/
		public function checkActiveLink(string $text, string $active)
		{
			return ($text == $active) ? "active" : "";
		}

		/**
		navigation(array $items, string $active_link): generates the default dynamic navigation.
		It takes an array parameter($items) containing links and loops through them to create links
		and nested links.It also takes a string parameter($active_link) to indicate
		an active link.
		*/
		public function navigation(array $items, string $active_link)
		{
			$content = '';

			$content .= '
				<nav class="navbar navbar-expand-md navbar-light bg-light">
		          <div class="container-fluid">
		            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		              <span class="navbar-toggler-icon"></span>
		            </button>
		            <div class="collapse navbar-collapse" id="navbarSupportedContent">
		                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
		  ';

			foreach ($items as $item_key => $item_value) {

				if (is_int($item_key)) {
					$content .= '
					<li class="nav-item">
					    <a class="nav-link ' . $this->checkActiveLink($item_value['text'], $active_link) . '" href="' . $item_value['url'] . '">' . $item_value['text'] . '</a>
	                </li>
	        ';
				}

				if (is_string($item_key)) {

					$content .= '
					<li class="nav-item dropdown">
					    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
	                    ' . $item_value["title"] . ' </a>
	        ';

          $content .= '
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          ';


          foreach ($item_value as $key => $value) {

            	if (is_int($key)) {
            		$content .= '
            		<li>
            		    <a class="dropdown-item" href="' . $value["url"] . '">' . $value["text"] . '</a>
            		</li>
            		';
            	}
          }

          $content .= '</ul>';

          $content .= '</li>';
				}

			}


	    $content .= '
		                </ul>
		            </div>
		        </div>
		    </nav>
			';

			return $content;
		}
	}
}

$dtm = new DemoThemeMethods;

?>
