@extends('layouts.app')

@section('content')
    <!-- HERO IMAGE -->
		<div class="impx-slide-container style1 resto">
			<div class="impx-slideshow-fw">
				<div class="impx-hero-resto uk-position-relative  uk-background-fixed uk-background-center-center uk-height-1-1">
					<div class="impx-overlay dark"></div>
			    	<div class="uk-container">
			    		<div class="uk-grid uk-flex uk-flex-center uk-flex-middle">
			    			<div class="uk-width-1-2@xl uk-width-1-2@l uk-width-1-1@m  uk-width-1-1@s uk-position-center uk-margin-large-top">
		    					<div class="impx-slide-fw-caption resto-caption uk-position-relative uk-position-z-index uk-text-center uk-light">
		    						<!-- intro -->
						    		<h1 class="impx-text-shadow">The Grand Dining Room</h1>
						    		<p class="uk-margin-remove impx-text-shadow uk-text-lead">Experience culinary excellence with our diverse menu of international and local cuisine, prepared with the finest ingredients.</p>
						    		<div class="uk-margin">
				    					<i class="fa fa-coffee impx-slide-icon impx-text-white"></i>
				    					<i class="fa fa-cutlery impx-slide-icon impx-text-white"></i>
				    					<i class="fa fa-glass impx-slide-icon impx-text-white"></i>
			    					</div>
			    					<!-- intro end -->
					    		</div>
				    		</div>
			    		</div>
		    		</div>
				</div>
			</div>
		</div>
		<!-- HERO IMAGE END -->

		<!-- FEATURES -->
        <div class="uk-padding uk-padding-remove-horizontal uk-padding-remove-bottom bg-color-gray  pattern-1 impx-resto-badge">
            <div class="uk-container">
                <div class="uk-grid">
                    <!-- Image -->
                    <div class="uk-width-2-5@xl uk-width-2-5@l uk-width-2-5@m uk-width-1-1@s uk-vertical-align-bottom uk-position-relative uk-position-z-index impx-negative-top xxlarge">
                        <img src="images/chef-woman.png" alt="Chef Stand" class="img-resto-intro uk-align-center"/>
                    </div>
                    <!-- Image End -->
                    <!-- Contact Info -->
                    <div class="uk-width-3-5@xl uk-width-3-5@l uk-width-3-5@m uk-width-1-1@s impx-intro resto">
                        <h3>Make an Appointment</h3>
                        <p class="impx-text-large uk-margin-bottom">Indulge in an unforgettable dining experience at our award-winning restaurant. Our expert chefs craft each dish with passion and precision, using only the freshest local ingredients. Reserve your table today for a memorable culinary journey.</p>                        
                        <ul class="impx-list-inline impx-hours">
                            <li><i class="fa fa-check impx-text-aqua"></i><strong class="impx-text-aqua">Breakfast</strong> 6.00 AM  - 10.00 AM</li>
                            <li><i class="fa fa-check impx-text-aqua"></i><strong class="impx-text-aqua">Lunch</strong> 10.00 AM - 2.00 PM</li>
                            <li><i class="fa fa-check impx-text-aqua"></i><strong class="impx-text-aqua">Dinner</strong> 4.00 PM - 12.00 PM</li>
                        </ul>
                    </div>
                    <!-- Contact Info End -->                    
                </div>
            </div>
        </div>
        <!-- FEATURES END -->

        <!-- HIGHLIGHT -->
        <div class="uk-padding uk-margin-bottom resto-feat uk-padding-remove-horizontal">
			<div class="uk-container">
				<div data-uk-grid>

    				<div class="uk-width-2-3@xl uk-width-2-3@l uk-width-1-1@m uk-width-1-1@s uk-margin-top">
                        <div class="impx-intro resto margin-medium">
                            <h3>Exclusive Dining Experiences</h3>
                            <p class="uk-margin-medium-bottom impx-text-large">Indulge in our carefully curated dining experiences, featuring seasonal ingredients and innovative culinary techniques that will delight your senses and create unforgettable memories.</p>
                        </div><!-- intro end -->

    					<!-- highlight items -->
                        <ul class="uk-child-width-1-2@xl uk-child-width-1-2@l uk-child-width-1-2@m uk-child-width-1-2@s" data-uk-grid>
                            <li class="resto-feat-item">
                                <div data-uk-grid>
                                    <div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s">
                                        <div class="uk-position-relative">
                                            <img src="images/intro-img-1.jpg" alt="Chef's Tasting Menu" class="uk-border-circle">
                                            <div class="impx-overlay light overlay-outline padding-medium"></div>
                                        </div>
                                    </div>
                                    <div class="uk-width-2-3@xl uk-width-2-3@l uk-width-2-3@m uk-width-1-1@s">
                                        <h5 class="uk-margin-remove-bottom">Chef's Tasting Menu</h5>
                                        <p class="uk-margin-small-top uk-margin-remove-bottom">Experience a culinary journey with our signature tasting menu, featuring seasonal highlights and chef's special creations.</p>
                                    </div>
                                </div>
                            </li>
                            <li class="resto-feat-item">
                                <div data-uk-grid>
                                    <div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s">
                                        <div class="uk-position-relative">
                                            <img src="images/intro-img-2.jpg" alt="Wine Pairing" class="uk-border-circle">
                                            <div class="impx-overlay light overlay-outline padding-medium"></div>
                                        </div>
                                    </div>
                                    <div class="uk-width-2-3@xl uk-width-2-3@l uk-width-2-3@m uk-width-1-1@s">
                                        <h5 class="uk-margin-remove-bottom">Wine Pairing Experience</h5>
                                        <p class="uk-margin-small-top uk-margin-remove-bottom">Elevate your meal with our expert sommelier's selection of fine wines perfectly paired with each course.</p>
                                    </div>
                                </div>
                            </li>
                            <li class="resto-feat-item">
                                <div data-uk-grid>
                                    <div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s">
                                        <div class="uk-position-relative">
                                            <img src="images/intro-img-3.jpg" alt="Sunday Brunch" class="uk-border-circle">
                                            <div class="impx-overlay light overlay-outline padding-medium"></div>
                                        </div>
                                    </div>
                                    <div class="uk-width-2-3@xl uk-width-2-3@l uk-width-2-3@m uk-width-1-1@s">
                                        <h5 class="uk-margin-remove-bottom">Sunday Brunch</h5>
                                        <p class="uk-margin-small-top uk-margin-remove-bottom">Join us every Sunday for an extravagant brunch buffet featuring live cooking stations and bottomless mimosas.</p>
                                    </div>
                                </div>
                            </li>
                            <li class="resto-feat-item">
                                <div data-uk-grid>
                                    <div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-1@s">
                                        <div class="uk-position-relative">
                                            <img src="images/intro-img-4.jpg" alt="Private Dining" class="uk-border-circle">
                                            <div class="impx-overlay light overlay-outline padding-medium"></div>
                                        </div>
                                    </div>
                                    <div class="uk-width-2-3@xl uk-width-2-3@l uk-width-2-3@m uk-width-1-1@s">
                                        <h5 class="uk-margin-remove-bottom">Private Dining</h5>
                                        <p class="uk-margin-small-top uk-margin-remove-bottom">Host your special occasions in our elegant private dining room, with customized menus for your event.</p>
                                    </div>
                                </div>
                            </li><!-- highlight item #4 end -->
                        </ul>
                        <!-- highlight items end -->
                    </div>

    				 <!-- Intro Text -->
                    <div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-1@m">
                    	<div class="impx-img-stacked uk-padding-remove-horizontal">
                        	<img src="images/gallery/resto-gal-7.jpg" alt="" class="">
                        	<img src="images/gallery/resto-gal-2.jpg" alt="" class="">
                    	</div>
                    </div>
                    <!-- Intro Text End -->

				</div>
			</div>
		</div>
		<!-- HIGHLIGHT -->

		<!-- MENU BOOK -->
		<div id="impx-menu-carousel" class="impx-menu-carousel uk-padding uk-position-relative uk-padding-remove-horizontal mobile-rmv-pad vert uk-background-fixed uk-background-center-center uk-height-1-1">
			<div class="impx-overlay dark"></div>
			<div class="uk-container uk-container-large">

				<!-- Intro -->
				<div class="uk-grid uk-light">
					<div class="uk-width-xlarge-2-3 uk-width-large-2-3 uk-width-medium-3-4  uk-width-xlarge-1-1 uk-container-center impx-margin-top">
						<div class="impx-intro intro-light uk-text-center uk-contrast uk-position-relative uk-position-z-index" >
    						<h2 class="uk-margin-remove">Find Our Best Tasty Menu</h2>
    					</div>
					</div>
				</div>
				<!-- Intro End -->

				<!-- Menu groups -->
				<div class="uk-grid uk-flex uk-flex-center">
					<div class="uk-width-1-1">

					<div class="impx-menu-cat-group impx-menu-cat-group-carousel">
						<div class="uk-position-relative">
							<!-- Menu group #1 -->
							<ul class="uk-grid uk-child-width-1-3@xl uk-child-width-1-3@l uk-child-width-1-3@m uk-child-width-1-1@s uk-grid-collapse impx-menu-page-2col">
								<li class="impx-menu-cat-group-wrapper">
									<div class="impx-menu-cat-group-outline"></div>
									<div class="impx-menu-page-group impx-menu-page-3col">
										<div class="uk-grid uk-grid-medium uk-margin-medium-bottom impx-margin-bottom">
											<div class="uk-width-2-3@xl uk-width-2-3@l uk-width-2-3@m uk-width-4-5@s impx-menu-page-group-title">
												<h4 class="uk-margin-remove">Breakfast</h4>
												<p>Start your day with our delicious breakfast selection, featuring fresh, locally-sourced ingredients</p>
											</div>
											<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-5@s uk-container-center">
												<img src="images/menu/menu-square3.jpg" alt="Breakfast Menu" class="uk-border-circle uk-align-center" />
											</div>
										</div>
										<ul class="impx-menu-page menu-list">
											<li>
												<div class="impx-menu-page-item">
													<div class="impx-menu-page-content">
														<h5>Classic Eggs Benedict</h5>
														<div class="impx-menu-page-price">
															<h5>RM 16.00</h5>
														</div>
														<p>Poached eggs on toasted English muffins with Canadian bacon, topped with hollandaise sauce and chives</p>
													</div>
												</div>
											</li>
											<li>
												<div class="impx-menu-page-item impx-chef-selection">
													<div class="impx-menu-page-content">
														<h5>Avocado Toast <span>Chef Selection</span></h5>
														<div class="impx-menu-page-price">
															<h5>RM 14.00</h5>
														</div>
														<p>Sourdough toast topped with smashed avocado, cherry tomatoes, feta, and a drizzle of balsamic glaze</p>
													</div>
												</div>
											</li>
											<!-- <li>
												<div class="impx-menu-page-item impx-menu-new">
													<div class="impx-menu-page-content">
														<h5>Belgian Waffle Stack <span>New</span></h5>
														<div class="impx-menu-page-price">
															<h5>$15.00</h5>
														</div>
														<p>Light and crispy Belgian waffles served with fresh berries, whipped cream, and maple syrup</p>
													</div>
												</div>
											</li> -->
											<!-- <li>
												<div class="impx-menu-page-item">
													<div class="impx-menu-page-content">
														<h5>Breakfast Burrito</h5>
														<div class="impx-menu-page-price">
															<h5>$13.00</h5>
														</div>
														<p>Scrambled eggs, black beans, cheddar, and salsa wrapped in a flour tortilla, served with home fries</p>
													</div>
												</div>
											</li>
											<li>
												<div class="impx-menu-page-item">
													<div class="impx-menu-page-content">
														<h5>Greek Yogurt Parfait</h5>
														<div class="impx-menu-page-price">
															<h5>$10.00</h5>
														</div>
														<p>Layers of Greek yogurt, house-made granola, and fresh seasonal fruit with a drizzle of honey</p>
													</div>
												</div>
											</li>
											<li>
												<div class="impx-menu-page-item impx-chef-selection">
													<div class="impx-menu-page-content">
														<h5>Smoked Salmon Bagel <span>Chef Selection</span></h5>
														<div class="impx-menu-page-price">
															<h5>$18.00</h5>
														</div>
														<p>Toasted bagel with cream cheese, smoked salmon, red onion, capers, and fresh dill</p>
													</div>
												</div>
											</li> -->
										</ul>
									</div>
								</li>
								<!-- Menu group #1 end -->

								<!-- Menu group #2 -->
								<li class="impx-menu-cat-group-wrapper">
									<div class="impx-menu-cat-group-outline"></div>
									<div class="impx-menu-page-group impx-menu-page-3col">
										<div class="uk-grid uk-grid-medium uk-margin-medium-bottom impx-margin-bottom">
											<div class="uk-width-2-3@xl uk-width-2-3@l uk-width-2-3@m uk-width-4-5@s impx-menu-page-group-title">
												<h4 class="uk-margin-remove">Lunch</h4>
												<p>Enjoy our selection of fresh, seasonal dishes made with locally-sourced ingredients</p>
											</div>
											<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-5@s">
												<img src="images/menu/menu-square6.jpg" alt="Lunch Menu" class="uk-border-circle uk-align-center" />
											</div>
										</div>
										<ul class="impx-menu-page menu-list">
											<li>
												<div class="impx-menu-page-item impx-menu-new">
													<div class="impx-menu-page-content">
														<h5>Grilled Chicken Caesar <span>New</span></h5>
														<div class="impx-menu-page-price">
															<h5>RM 17.00</h5>
														</div>
														<p>Crisp romaine, grilled chicken, parmesan, and croutons with our house-made Caesar dressing</p>
													</div>
												</div>
											</li>
											<li>
												<div class="impx-menu-page-item">
													<div class="impx-menu-page-content">
														<h5>Beef Burger</h5>
														<div class="impx-menu-page-price">
															<h5>RM 16.00</h5>
														</div>
														<p>8oz grass-fed beef patty with cheddar, lettuce, tomato, and garlic aioli on a brioche bun</p>
													</div>
												</div>
											</li>
											<!-- <li>
												<div class="impx-menu-page-item impx-chef-selection">
													<div class="impx-menu-page-content">
														<h5>Mushroom Risotto <span>Chef Selection</span></h5>
														<div class="impx-menu-page-price">
															<h5>$19.00</h5>
														</div>
														<p>Creamy arborio rice with wild mushrooms, white wine, parmesan, and truffle oil</p>
													</div>
												</div>
											</li> -->
											<!-- <li>
												<div class="impx-menu-page-item">
													<div class="impx-menu-page-content">
														<h5>Fish Tacos</h5>
														<div class="impx-menu-page-price">
															<h5>$18.00</h5>
														</div>
														<p>Beer-battered cod with cabbage slaw, chipotle aioli, and pico de gallo in corn tortillas</p>
													</div>
												</div>
											</li>
											<li>
												<div class="impx-menu-page-item">
													<div class="impx-menu-page-content">
														<h5>Quinoa Salad</h5>
														<div class="impx-menu-page-price">
															<h5>$15.00</h5>
														</div>
														<p>Mixed greens, quinoa, cucumber, cherry tomatoes, avocado, and lemon-tahini dressing</p>
													</div>
												</div>
											</li>
											<li>
												<div class="impx-menu-page-item impx-chef-selection">
													<div class="impx-menu-page-content">
														<h5>Lobster Roll <span>Chef Selection</span></h5>
														<div class="impx-menu-page-price">
															<h5>$26.00</h5>
														</div>
														<p>Chilled lobster meat with lemon aioli on a toasted brioche roll, served with fries</p>
													</div>
												</div>
											</li> -->
										</ul>
									</div>
								</li>
								<!-- Menu group #2 end -->

								<!-- Menu group #3 -->
								<li class="impx-menu-cat-group-wrapper">
									<div class="impx-menu-cat-group-outline"></div>
									<div class="impx-menu-page-group impx-menu-page-3col">
										<div class="uk-grid uk-grid-medium uk-margin-medium-bottom impx-margin-bottom">
											<div class="uk-width-2-3@xl uk-width-2-3@l uk-width-2-3@m uk-width-4-5@s impx-menu-page-group-title">
												<h4 class="uk-margin-remove">Dinner</h4>
												<p>An exquisite dining experience featuring our chef's signature dishes and fine wines</p>
											</div>
											<div class="uk-width-1-3@xl uk-width-1-3@l uk-width-1-3@m uk-width-1-5@s uk-container-center">
												<img src="images/menu/menu-square3.jpg" alt="Dinner Menu" class="uk-border-circle uk-align-center" />
											</div>
										</div>
										<ul class="impx-menu-page menu-list">
											<li>
												<div class="impx-menu-page-item">
													<div class="impx-menu-page-content">
														<h5>Filet Mignon</h5>
														<div class="impx-menu-page-price">
															<h5>RM 42.00</h5>
														</div>
														<p>8oz grass-fed beef tenderloin with roasted garlic mashed potatoes and seasonal vegetables</p>
													</div>
												</div>
											</li>
											<li>
												<div class="impx-menu-page-item impx-chef-selection">
													<div class="impx-menu-page-content">
														<h5>Pan-Seared Scallops <span>Chef Selection</span></h5>
														<div class="impx-menu-page-price">
															<h5>RM 36.00</h5>
														</div>
														<p>Sea scallops with cauliflower puree, pancetta, and brown butter sauce</p>
													</div>
												</div>
											</li>
											<!-- <li>
												<div class="impx-menu-page-item impx-menu-new">
													<div class="impx-menu-page-content">
														<h5>Duck Confit <span>New</span></h5>
														<div class="impx-menu-page-price">
															<h5>$34.00</h5>
														</div>
														<p>Slow-cooked duck leg with cherry reduction, parsnip puree, and roasted brussels sprouts</p>
													</div>
												</div>
											</li> -->
											<!-- <li>
												<div class="impx-menu-page-item">
													<div class="impx-menu-page-content">
														<h5>Eggplant Parmesan</h5>
														<div class="impx-menu-page-price">
															<h5>$24.00</h5>
														</div>
														<p>Breaded and baked eggplant with marinara, mozzarella, and basil, served with spaghetti</p>
													</div>
												</div>
											</li>
											<li>
												<div class="impx-menu-page-item">
													<div class="impx-menu-page-content">
														<h5>Grilled Salmon</h5>
														<div class="impx-menu-page-price">
															<h5>$32.00</h5>
														</div>
														<p>Wild-caught salmon with lemon-dill sauce, quinoa pilaf, and roasted asparagus</p>
													</div>
												</div>
											</li>
											<li>
												<div class="impx-menu-page-item impx-chef-selection">
													<div class="impx-menu-page-content">
														<h5>Rack of Lamb <span>Chef Selection</span></h5>
														<div class="impx-menu-page-price">
															<h5>$45.00</h5>
														</div>
														<p>Herb-crusted lamb chops with mint pesto, roasted fingerling potatoes, and glazed carrots</p>
													</div>
												</div>
											</li> -->
										</ul>
									</div>
								</li>
								<!-- Menu group #3 end -->
							</ul>
							<!-- Menu Groups End -->
						</div>
					</div>
						<!-- Menu Carousel Group End -->
					</div>
				</div>
				<!-- Menu Carousel End -->
    		</div>
		</div>
		<!-- MENU BOOK -->
		
		<!-- GALLERY -->
		<div class="uk-padding uk-margin-medium-bottom uk-padding-remove-horizontal">
            <div class="uk-container">
               <div class="uk-flex-center" data-uk-grid>
                    <div class="uk-width-2-3@xl uk-width-2-3@l uk-width-1-1@m uk-text-center uk-margin-small-bottom"><!-- gallery intro -->
                        <h2 class="uk-margin-remove-bottom">Our Gallery</h2>
                        <p class="impx-text-large uk-margin-remove-bottom uk-margin-small-top impx-margin-bottom-small">Step into our world of culinary excellence through these captivating moments. Each image tells a story of passion, presentation, and the art of fine dining at its best.</p>
                    </div><!-- gallery intro end -->
                </div>

                <!-- gallery items -->
           		<div class="uk-child-width-1-4@xl uk-child-width-1-4@l uk-child-width-1-4@m uk-child-width-1-3@s uk-grid-medium impx-margin-top-small" data-uk-grid="masonry : true" data-uk-lightbox>
                    <div class="grid-item uk-margin-bottom"><!-- gallery item #1 -->
                    	<a class="uk-inline-clip uk-transition-toggle" href="images/gallery/resto-gal-1.jpg" data-caption="Caption 1">
	                        <img src="images/gallery/resto-gal-1.jpg" alt="">
	                        <div class="uk-transition-fade uk-position-cover uk-overlay uk-overlay-primary">
                                <h5>Elegant Dining</h5>
                                <p>Our sophisticated dining room sets the perfect ambiance for an unforgettable culinary experience</p>
	                        </div>
	                    </a>
                    </div><!-- gallery item #1  end -->
                    <div class="grid-item" data-uk-lightbox><!-- gallery item #2 -->
                        <a class="uk-inline-clip uk-transition-toggle" href="images/intro-img-1.jpg" data-caption="Caption 2">
	                        <img src="images/intro-img-1.jpg" alt="">
	                        <div class="uk-transition-fade uk-position-cover uk-overlay uk-overlay-primary">
								<h5>Chef's Special</h5>
                                <p>Our executive chef preparing the day's special with the finest seasonal ingredients</p>
	                        </div>
	                    </a>
                    </div><!-- gallery item #2 end -->
                    <div class="grid-item" data-uk-lightbox><!-- gallery item #3 -->
                        <a class="uk-inline-clip uk-transition-toggle" href="images/gallery/resto-gal-5.jpg"  data-caption="Caption 3">
	                        <img src="images/gallery/resto-gal-5.jpg" alt="">
	                        <div class="uk-transition-fade uk-position-cover uk-overlay uk-overlay-primary">
									<h5>Wine Cellar</h5>
                                <p>Explore our extensive collection of fine wines carefully selected by our master sommelier</p>
	                        </div>
	                    </a>
                    </div><!-- gallery item #3 end -->
                    <div class="grid-item" data-uk-lightbox><!-- gallery item #4 -->
                        <a class="uk-inline-clip uk-transition-toggle" href="images/gallery/resto-gal-4.jpg"  data-caption="Caption 4">
	                        <img src="images/gallery/resto-gal-4.jpg" alt="">
	                        <div class="uk-transition-fade uk-position-cover uk-overlay uk-overlay-primary">
									<h5>Gourmet Desserts</h5>
                                <p>Indulge in our artisanal desserts, each a masterpiece of flavor and presentation</p>
	                        </div>
	                    </a>
                    </div><!-- gallery item #4 end -->
                    <div class="grid-item" data-uk-lightbox><!-- gallery item #5 -->
                        <a class="uk-inline-clip uk-transition-toggle" href="images/gallery/resto-gal-7.jpg"  data-caption="Caption 5">
	                        <img src="images/gallery/resto-gal-7.jpg" alt="">
	                        <div class="uk-transition-fade uk-position-cover uk-overlay uk-overlay-primary">
									<h5>Private Events</h5>
                                <p>Elegant private dining spaces perfect for your special celebrations and corporate events</p>
	                        </div>
	                    </a>
                    </div><!-- gallery item #5 end -->
                    <div class="grid-item" data-uk-lightbox><!-- gallery item #6 -->
                        <a class="uk-inline-clip uk-transition-toggle" href="images/intro-img-3.jpg"  data-caption="Caption 6">
	                        <img src="images/intro-img-3.jpg" alt="">
	                        <div class="uk-transition-fade uk-position-cover uk-overlay uk-overlay-primary">
									<h5>Sunday Brunch</h5>
                                <p>Join us for our famous Sunday brunch featuring live cooking stations and bottomless mimosas</p>
	                        </div>
	                    </a>
                    </div><!-- gallery item #6 end -->
                    <div class="grid-item" data-uk-lightbox><!-- gallery item #7 -->
                        <a class="uk-inline-clip uk-transition-toggle" href="images/gallery/resto-gal-2.jpg" data-caption="Caption 7">
	                        <img src="images/gallery/resto-gal-2.jpg" alt="">
	                        <div class="uk-transition-fade uk-position-cover uk-overlay uk-overlay-primary">
								<h5>Image 7</h5>
                                <p>Plane idem, inquit, et maxima quidem, qua fieri nulla maior potest ad honestatem</p>
	                        </div>
	                    </a>
                    </div><!-- gallery item #7 -->
                    <div class="grid-item" data-uk-lightbox>
                        <a class="uk-inline-clip uk-transition-toggle" href="images/gallery/resto-gal-8.jpg" data-caption="Caption 8">
	                        <img src="images/gallery/resto-gal-8.jpg" alt="">
	                        <div class="uk-transition-fade uk-position-cover uk-overlay uk-overlay-primary">
								<h5>Image 8</h5>
                                <p>Plane idem, inquit, et maxima quidem, qua fieri nulla maior potest ad honestatem</p>
	                        </div>
	                    </a>
                    </div><!-- gallery item #7 end -->
                </div>
                <!-- gallery items end -->
            </div>
        </div>
        <!-- GALLERY END -->

        <!-- CTA -->
        <div class="impx-resto-content bg-color-aqua pattern-1">
            <div class="uk-container">
            	<div data-uk-grid>
	            	<div class="uk-width-expand@xl uk-width-expand@l uk-width-expand@m uk-width-1-1@s">
	            		<div class="impx-badge-content left uk-light uk-margin-medium-top uk-text-right">
	                        <h4 class="uk-margin-small-bottom">To answer everything</h4>
	                        <p class="impx-text-large uk-margin-remove uk-visible@s">For all of them expressed a pleasant movement, by which they expressed not only those common, but also those equal. Whatever else.</p>
	                    </div>
	            	</div>
	            	<div class="uk-width-1-5@xl uk-width-1-5@l uk-width-1-4@m uk-width-1-1@s">
	            		<div class=" impx-resto-img impx-negative-top tiny">
	                        <img src="images/chef.jpg" alt="resort" class="uk-border-circle impx-outline-border transparent large">
	                    </div>
	            	</div>
	            	<div class="uk-width-expand@xl uk-width-expand@l uk-width-expand@m uk-width-1-1@s">
	            		<div class="impx-badge-content right uk-light uk-margin-medium-top">
	                        <h4 class="uk-margin-small-bottom">For it is long for everything.</h4>
	                        <p class="impx-text-large uk-margin-remove uk-visible@s">For all of them expressed a pleasant movement, by which they expressed not only those common, but also those equal. Whatever else</p>
	                    </div>
	            	</div>
            	</div>
            </div>
        </div>
        <!-- CTA END -->
@include('front.bookingForm')
@endsection