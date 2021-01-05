<script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/alertify.js"></script>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />

<!------ Include the above in your HEAD tag ---------->
<style>
@font-face {
    font-family: 'icomoon';
	src:url('../fonts/icomoon/icomoon.eot?pvm5gj');
	src:url('../fonts/icomoon/icomoon.eot?#iefixpvm5gj') format('embedded-opentype'),
		url('../fonts/icomoon/icomoon.woff?pvm5gj') format('woff'),
		url('../fonts/icomoon/icomoon.ttf?pvm5gj') format('truetype'),
		url('../fonts/icomoon/icomoon.svg?pvm5gj#icomoon') format('svg');
	font-weight: normal;
	font-style: normal;
} /* Icons created with icomoon.io/app */

.tabs {
	position: relative;
	width: 100%;
	overflow: hidden;
	margin: 1em 0 2em;
	font-weight: 300;
}

/* Nav */
.tabs nav {
	text-align: center;
}

.tabs nav ul {
	padding: 0;
	margin: 0;
	list-style: none;
	display: inline-block;
}

.tabs nav ul li {
	border: 1px solid #becbd2;
	border-bottom: none;
	margin: 0 0.25em;
	display: block;
	float: left;
	position: relative;
}

.tabs nav li.tab-current {
	border: 1px solid #47a3da;
	box-shadow: inset 0 2px #47a3da;
	border-bottom: none;
	z-index: 100;
}

.tabs nav li.tab-current:before,
.tabs nav li.tab-current:after {
	content: '';
	position: absolute;
	height: 1px;
	right: 100%;
	bottom: 0;
	width: 1000px;
	background: #47a3da;
}

.tabs nav li.tab-current:after {
	right: auto;
	left: 100%;
	width: 4000px;
}

.tabs nav a {
	color: #becbd2;
	display: block;
	font-size: 1.45em;
	line-height: 2.5;
	padding: 0 1.25em;
	white-space: nowrap;
}

.tabs nav a:hover {
	color: #768e9d;
}

.tabs nav li.tab-current a {
	color: #47a3da;
}

/* Icons */
.tabs nav a:before {
	display: inline-block;
	vertical-align: middle;
	text-transform: none;
	font-weight: normal;
	font-variant: normal;
	font-family: 'icomoon';
	line-height: 1;
	speak: none;
	-webkit-font-smoothing: antialiased;
	margin: -0.25em 0.4em 0 0;
}

.icon-food:before {
	content: "\e600";
}

.icon-lab:before {
	content: "\e601";
}

.icon-cup:before {
	content: "\e602";
}

.icon-truck:before {
	content: "\e603";
}

.icon-shop:before {
	content: "\e604";
}

/* Content */
.content section {
	font-size: 1.25em;
	padding: 3em 1em;
	display: none;
	max-width: 1230px;
	margin: 0 auto;
}

.content section:before,
.content section:after {
	content: '';
	display: table;
}

.content section:after {
	clear: both;
}

/* Fallback example */
.no-js .content section {
	display: block;
	padding-bottom: 2em;
	border-bottom: 1px solid #47a3da;
}

.content section.content-current {
	display: block;
}

.mediabox {
	float: left;
	width: 33%;
	padding: 0 25px;
}

.mediabox img {
	max-width: 100%;
	display: block;
	margin: 0 auto;
}

.mediabox h3 {
	margin: 0.75em 0 0.5em;
}

.mediabox p {
	padding: 0 0 1em 0;
	margin: 0;
	line-height: 1.3;
}

/* Example media queries */

@media screen and (max-width: 52.375em) {
	.tabs nav a span {
		display: none;
	}

	.tabs nav a:before {
		margin-right: 0;
	}

	.mediabox {
		float: none;
		width: auto;
		padding: 0 0 35px 0;
		font-size: 90%;
	}

	.mediabox img {
		float: left;
		margin: 0 25px 10px 0;
		max-width: 40%;
	}

	.mediabox h3 {
		margin-top: 0;
	}

	.mediabox p {
		margin-left: 40%;
		margin-left: calc(40% + 25px);
	}

	.mediabox:before,
	.mediabox:after {
		content: '';
		display: table;
	}

	.mediabox:after {
		clear: both;
	}
}

@media screen and (max-width: 32em) {
	.tabs nav ul,
	.tabs nav ul li a {
		width: 100%;
		padding: 0;
	}

	.tabs nav ul li {
		width: 20%;
		width: calc(20% + 1px);
		margin: 0 0 0 -1px;
	}

	.tabs nav ul li:last-child {
		border-right: none;
	}

	.mediabox {
		text-align: center;
	}

	.mediabox img {
		float: none;
		margin: 0 auto;
		max-width: 100%;
	}

	.mediabox h3 {
		margin: 1.25em 0 1em;
	}

	.mediabox p {
		margin: 0;
	}
}

</style>
<div class="container">
    		<header class="clearfix">
				<span>Blueprint <span class="bp-icon bp-icon-about" data-content="The Blueprints are a collection of basic and minimal website concepts, components, plugins and layouts with minimal style for easy adaption and usage, or simply for inspiration."></span></span>
				<h1>Responsive Full Width Tabs</h1>
				<nav>
					<a href="http://tympanus.net/Blueprints/SplitLayout/" class="bp-icon bp-icon-prev" data-info="previous Blueprint"><span>Previous Blueprint</span></a>
					<a href="#" class="bp-icon bp-icon-next" data-info="next Blueprint"><span>Next Blueprint</span></a>
					<a href="#" class="bp-icon bp-icon-drop" data-info="back to the Codrops article"><span>back to the Codrops article</span></a>
					<a href="#" class="bp-icon bp-icon-archive" data-info="Blueprints archive"><span>Go to the archive</span></a>
				</nav>
			</header>	
			<div id="tabs" class="tabs">
				<nav>
					<ul>
						<li><a href="#section-1" class="icon-shop"><span></span></a></li>
						<li><a href="#section-2" class="icon-cup"><span>Drinks</span></a></li>
						<li><a href="#section-3" class="icon-food"><span>Food</span></a></li>
						<li><a href="#section-4" class="icon-lab"><span>Lab</span></a></li>
						<li><a href="#section-5" class="icon-truck"><span>Order</span></a></li>
					</ul>
				</nav>
				<div class="content">
					<section id="section-1">
						<div class="mediabox">
							<img src="http://tympanus.net/Blueprints/FullWidthTabs/img/01.png" alt="img01" />
							<h3>Sushi Gumbo Beetroot</h3>
							<p>Sushi gumbo beet greens corn soko endive gumbo gourd. Parsley shallot courgette tatsoi pea sprouts fava bean collard greens dandelion okra wakame tomato.</p>
						</div>
						<div class="mediabox">
							<img src="http://tympanus.net/Blueprints/FullWidthTabs/img/02.png" alt="img02" />
							<h3>Pea Sprouts Fava Soup</h3>
							<p>Lotus root water spinach fennel kombu maize bamboo shoot green bean swiss chard seakale pumpkin onion chickpea gram corn pea.</p>
						</div>
						<div class="mediabox">
							<img src="http://tympanus.net/Blueprints/FullWidthTabs/img/03.png" alt="img03" />
							<h3>Turnip Broccoli Sashimi</h3>
							<p>Nori grape silver beet broccoli kombu beet greens fava bean potato quandong celery. Bunya nuts black-eyed pea prairie turnip leek lentil turnip greens parsnip.</p>
						</div>
					</section>
					<section id="section-2">
						<div class="mediabox">
							<img src="http://tympanus.net/Blueprints/FullWidthTabs/img/04.png" alt="img04" />
							<h3>Asparagus Cucumber Cake</h3>
							<p>Chickweed okra pea winter purslane coriander yarrow sweet pepper radish garlic brussels sprout groundnut summer purslane earthnut pea tomato spring onion azuki bean gourd. </p>
						</div>
						<div class="mediabox">
							<img src="http://tympanus.net/Blueprints/FullWidthTabs/img/05.png" alt="img05" />
							<h3>Magis Kohlrabi Gourd</h3>
							<p>Salsify taro catsear garlic gram celery bitterleaf wattle seed collard greens nori. Grape wattle seed kombu beetroot horseradish carrot squash brussels sprout chard.</p>
						</div>
						<div class="mediabox">
							<img src="http://tympanus.net/Blueprints/FullWidthTabs/img/06.png" alt="img06" />
							<h3>Ricebean Rutabaga</h3>
							<p>Celery quandong swiss chard chicory earthnut pea potato. Salsify taro catsear garlic gram celery bitterleaf wattle seed collard greens nori. </p>
						</div>
					</section>
					<section id="section-3">
						<div class="mediabox">
							<img src="http://tympanus.net/Blueprints/FullWidthTabs/img/02.png" alt="img02" />
							<h3>Noodle Curry</h3>
							<p>Lotus root water spinach fennel kombu maize bamboo shoot green bean swiss chard seakale pumpkin onion chickpea gram corn pea.Sushi gumbo beet greens corn soko endive gumbo gourd.</p>
						</div>
						<div class="mediabox">
							<img src="http://tympanus.net/Blueprints/FullWidthTabs/img/06.png" alt="img06" />
							<h3>Leek Wasabi</h3>
							<p>Sushi gumbo beet greens corn soko endive gumbo gourd. Parsley shallot courgette tatsoi pea sprouts fava bean collard greens dandelion okra wakame tomato.</p>
						</div>
						<div class="mediabox">
							<img src="http://tympanus.net/Blueprints/FullWidthTabs/img/01.png" alt="img01" />
							<h3>Green Tofu Wrap</h3>
							<p>Pea horseradish azuki bean lettuce avocado asparagus okra. Kohlrabi radish okra azuki bean corn fava bean mustard tigernut wasabi tofu broccoli mixture soup.</p>
						</div>
					</section>
					<section id="section-4">
						<div class="mediabox">
							<img src="http://tympanus.net/Blueprints/FullWidthTabs/img/03.png" alt="img03" />
							<h3>Tomato Cucumber Curd</h3>
							<p>Chickweed okra pea winter purslane coriander yarrow sweet pepper radish garlic brussels sprout groundnut summer purslane earthnut pea tomato spring onion azuki bean gourd. </p>
						</div>
						<div class="mediabox">
							<img src="http://tympanus.net/Blueprints/FullWidthTabs/img/01.png" alt="img01" />
							<h3>Mushroom Green</h3>
							<p>Salsify taro catsear garlic gram celery bitterleaf wattle seed collard greens nori. Grape wattle seed kombu beetroot horseradish carrot squash brussels sprout chard.</p>
						</div>
						<div class="mediabox">
							<img src="http://tympanus.net/Blueprints/FullWidthTabs/img/04.png" alt="img04" />
							<h3>Swiss Celery Chard</h3>
							<p>Celery quandong swiss chard chicory earthnut pea potato. Salsify taro catsear garlic gram celery bitterleaf wattle seed collard greens nori. </p>
						</div>
					</section>
					<section id="section-5">
						<div class="mediabox">
							<img src="http://tympanus.net/Blueprints/FullWidthTabs/img/02.png" alt="img02" />
							<h3>Radish Tomato</h3>
							<p>Catsear cauliflower garbanzo yarrow salsify chicory garlic bell pepper napa cabbage lettuce tomato kale arugula melon sierra leone bologi rutabaga tigernut.</p>
						</div>
						<div class="mediabox">
							<img src="http://tympanus.net/Blueprints/FullWidthTabs/img/06.png" alt="img06" />
							<h3>Fennel Wasabi</h3>
							<p>Sea lettuce gumbo grape kale kombu cauliflower salsify kohlrabi okra sea lettuce broccoli celery lotus root carrot winter purslane turnip greens garlic.</p>
						</div>
						<div class="mediabox">
							<img src="http://tympanus.net/Blueprints/FullWidthTabs/img/01.png" alt="img01" />
							<h3>Red Tofu Wrap</h3>
							<p>Green horseradish azuki bean lettuce avocado asparagus okra. Kohlrabi radish okra azuki bean corn fava bean mustard tigernut wasabi tofu broccoli mixture soup.</p>
						</div>
					</section>
				</div><!-- /content -->
			</div><!-- /tabs -->
			<p class="info">Food Shapes/Icons by <a href="http://psdblast.com/50-food-icon-set-psd">PsdBlast</a></p>
		</div>
		<script src="http://tympanus.net/Blueprints/FullWidthTabs/js/cbpFWTabs.js"></script>
		<script>
			new CBPFWTabs( document.getElementById( 'tabs' ) );
        </script>
        <script>
            //**
 * cbpFWTabs.js v1.0.0
 * http://www.codrops.com
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 * 
 * Copyright 2014, Codrops
 * http://www.codrops.com
 */
;( function( window ) {
    
	'use strict';

	function extend( a, b ) {
		for( var key in b ) { 
			if( b.hasOwnProperty( key ) ) {
				a[key] = b[key];
			}
		}
		return a;
	}

	function CBPFWTabs( el, options ) {
		this.el = el;
		this.options = extend( {}, this.options );
  		extend( this.options, options );
  		this._init();
	}

	CBPFWTabs.prototype.options = {
		start : 0
	};

	CBPFWTabs.prototype._init = function() {
		// tabs elemes
		this.tabs = [].slice.call( this.el.querySelectorAll( 'nav > ul > li' ) );
		// content items
		this.items = [].slice.call( this.el.querySelectorAll( '.content > section' ) );
		// current index
		this.current = -1;
		// show current content item
		this._show();
		// init events
		this._initEvents();
	};

	CBPFWTabs.prototype._initEvents = function() {
		var self = this;
		this.tabs.forEach( function( tab, idx ) {
			tab.addEventListener( 'click', function( ev ) {
				ev.preventDefault();
				self._show( idx );
			} );
		} );
	};

	CBPFWTabs.prototype._show = function( idx ) {
		if( this.current >= 0 ) {
			this.tabs[ this.current ].className = '';
			this.items[ this.current ].className = '';
		}
		// change current
		this.current = idx != undefined ? idx : this.options.start >= 0 && this.options.start < this.items.length ? this.options.start : 0;
		this.tabs[ this.current ].className = 'tab-current';
		this.items[ this.current ].className = 'content-current';
	};

	// add to global namespace
	window.CBPFWTabs = CBPFWTabs;

})( window );
        </script>
