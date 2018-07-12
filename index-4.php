<?php include_once 'inc/header.php'; ?>


<!-- basic info -->
<?php 

$query = "SELECT * FROM basic_info";
$result = mysqli_query($conn, $query);

$basic_info = mysqli_fetch_assoc($result);

$logo = $basic_info['logo'];
$name = $basic_info['name'];
$experties = $basic_info['experties'];
$facebook = $basic_info['facebook'];
$twitter = $basic_info['twitter'];
$linkedin = $basic_info['linkedin'];
$behance = $basic_info['behance'];

 ?>

<div style="display: none;">
	<p class="ba_name"><?php echo $name; ?></p>
	<p class="ba_experties"><?php echo $experties; ?></p>
</div>


    
    <!-- CONTENT -->
	<div class="sting_tm_content">
	
		<!-- HERO -->
		<div class="sting_tm_section" id="home">
			<div class="sting_tm_hero_header_particle jarallax" data-speed="0">
				<div class="overlay"></div>
				<div class="container hero">
					<div class="sting_tm_hero_title">
						<p class="first"><span class="another">I Am</span> <span class="sting_tm_animation_text_word"></span></p>
						<div class="social_icons">
							<ul>



								<li><a href="<?php echo $facebook; ?>">Facebook</a></li>
								<li><a href="<?php echo $twitter; ?>">Twitter</a></li>
								<li><a href="<?php echo $linkedin; ?>">Linkedin</a></li>
								<li><a href="<?php echo $behance; ?>">Behance</a></li>
							</ul>
						</div>
					</div>
					<div class="sting_tm_discover_wrap anchor">
						<span>
							<a href="#about">Discover</a>
						</span>
					</div>
				</div>
				<div class="svg shape">
                <svg x="0px" y="0px" viewBox="0 186.5 1920 113.5">
                    <polygon points="-30,300 355.167,210.5 1432.5,290 1920,198.5 1920,300"></polygon>
                </svg>
            </div>
			</div>
		</div>
		<!-- /HERO -->
		
<?php 

$query = "SELECT * FROM about"; 
$result = mysqli_query($conn, $query);

$about = mysqli_fetch_assoc($result);

$image = $about['img'];
$experties = $about['experties'];
$description = $about['description'];
$phone = $about['phone'];
$email = $about['email'];

$query = "SELECT * FROM skills";
$result = mysqli_query($conn, $query);

$skills = mysqli_fetch_assoc($result);

$skill1 = $skills['skill1'];
$value1 = $skills['value1'];

$skill2 = $skills['skill2'];
$value2 = $skills['value2'];

$skill3 = $skills['skill3'];
$value3 = $skills['value3'];


 ?>
		<!-- ABOUT -->
		<div class="sting_tm_section" id="about">
			<div class="container">
				<div class="sting_tm_about_wrap">
					<div class="author_wrap">
						<div class="leftbox">
							<img src="assets/img/<?php echo $image; ?>" alt="" />
						</div>
						<div class="rightbox">
							<div class="sting_tm_main_title_holder about">
								<h3>About Me</h3>
							</div>


							<div class="subtitle"><p><?php echo $experties; ?></p></div>
							<div class="definition">
								<p><?php echo $description; ?></p>
							</div>
							<div class="progress_bar_wrap_total">
								<div class="sting_tm_progress_wrap" data-size="small" data-round="c" data-strip="off">
									<div class="sting_tm_progress" data-value="<?php echo $value1; ?>" data-color="#000">
										<span><span class="label"><?php echo $skill1; ?></span><span class="number"><?php echo $value1; ?>%</span></span>
										<div class="sting_tm_bar_bg"><div class="sting_tm_bar_wrap"><div class="sting_tm_bar"></div></div></div>
									</div>
									<div class="sting_tm_progress" data-value="<?php echo $value2; ?>" data-color="#000">
										<span><span class="label"><?php echo $skill2; ?></span><span class="number"><?php echo $value2; ?>%</span></span>
										<div class="sting_tm_bar_bg"><div class="sting_tm_bar_wrap"><div class="sting_tm_bar"></div></div></div>
									</div>
									<div class="sting_tm_progress" data-value="<?php echo $value3; ?>" data-color="#000">
										<span><span class="label"><?php echo $skill3; ?></span><span class="number"><?php echo $value3; ?>%</span></span>
										<div class="sting_tm_bar_bg"><div class="sting_tm_bar_wrap"><div class="sting_tm_bar"></div></div></div>
									</div>
								</div>
							</div>
							<div class="about_short_contact_wrap">
								<ul>
									<li>
										<span><label>Phone:</label> <?php echo $phone; ?></span>
									</li>
									<li>
										<span><label>Mail:</label> <a href="index-4.html"><?php echo $email; ?></a></span>
									</li>
								</ul>
							</div>
							<div class="buttons_wrap">
								<ul>
									<li>
										<a href="index-4.html">Download CV</a>
									</li>
									<li class="anchor">
										<a href="#contact">Send Message</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /ABOUT -->	
		
		<!-- SERVICES -->
		<div class="sting_tm_section" id="services">
			<div class="sting_tm_services_total_wrap">
				<div class="container">
					<div class="sting_tm_main_title_holder services">
						<h3>Amazing Services</h3>
						<span>Look out our amazing services</span>
					</div>
					<div class="sting_tm_services_wrap">
						<div class="sting_tm_list_wrap" data-column="3" data-space="70">
							<ul class="total sting_tm_miniboxes">
								
<?php 

    $query = "SELECT * FROM services";
    $result = mysqli_query($conn, $query);

    while ($services = mysqli_fetch_assoc($result)) {

 ?>

								<li class="wow fadeIn" data-wow-duration="1.2s">
									<div class="inner_list sting_tm_minibox">
										<div class="service_icon">
											<img class="svg" src="assets/img/<?php echo $services['img']; ?>" alt="" />
										</div>
										<div class="service_title">
											<h3><?php echo $services['title']; ?></h3>
										</div>
										<div class="service_definition">
											<p><?php echo $services['description']; ?></p>
										</div>
										<span class="first"></span>
										<span class="second"></span>
									</div>
								</li>

<?php } ?>

							
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /SERVICES -->
		
		<!-- PORTFOLIO -->
		<div class="sting_tm_section" id="portfolio">
			<div class="container">
				<div class="sting_tm_portfolio_wrap">
					<div class="sting_tm_main_title_holder portfolio">
						<h3>Awesome Works</h3>
						<span>Meet our latest creative works</span>
					</div>
					<div class="sting_tm_portfolio_titles"></div>
					<ul class="sting_tm_portfolio_filter">
						<li><a href="#" class="current" data-filter="*">All</a></li>
						<li><a href="#" data-filter=".design">Design</a></li>
						<li><a href="#" data-filter=".photography">Photography</a></li>
						<li><a href="#" data-filter=".development">Development</a></li>
					</ul>
					<ul class="sting_tm_portfolio_list gallery_zoom">
						<li class="design">
							<div class="entry sting_tm_portfolio_animation_wrap" data-title="Two Mockup Box" data-category="Design">
								<a class="zoom" href="assets/img/portfolio/1.jpg#">
									<img src="assets/img/portfolio/600x600.jpg" alt="" />
									<div class="sting_tm_portfolio_image_main"></div>
								</a>
							</div>
						</li>
						<li class="photography">
							<div class="entry sting_tm_portfolio_animation_wrap" data-title="Historical Pen" data-category="Photography">
								<a class="zoom" href="assets/img/portfolio/2.jpg#">
									<img src="assets/img/portfolio/600x600.jpg" alt="" />
									<div class="sting_tm_portfolio_image_main"></div>
								</a>
							</div>
						</li>
						<li class="development">
							<div class="entry sting_tm_portfolio_animation_wrap" data-title="Form Function" data-category="Development">
								<a class="zoom" href="assets/img/portfolio/3.jpg#">
									<img src="assets/img/portfolio/600x600.jpg" alt="" />
									<div class="sting_tm_portfolio_image_main"></div>
								</a>
							</div>
						</li>
						<li class="photography">
							<div class="entry sting_tm_portfolio_animation_wrap" data-title="Paper Mockup" data-category="Photography">
								<a class="zoom" href="assets/img/portfolio/4.jpg#">
									<img src="assets/img/portfolio/600x600.jpg" alt="" />
									<div class="sting_tm_portfolio_image_main"></div>
								</a>
							</div>
						</li>
						<li class="design">
							<div class="entry sting_tm_portfolio_animation_wrap" data-title="Ceramic Bottle" data-category="Design">
								<a class="zoom" href="assets/img/portfolio/5.jpg#">
									<img src="assets/img/portfolio/600x600.jpg" alt="" />
									<div class="sting_tm_portfolio_image_main"></div>
								</a>
							</div>
						</li>
						<li class="photography">
							<div class="entry sting_tm_portfolio_animation_wrap" data-title="White Cup" data-category="Photography">
								<a class="zoom" href="assets/img/portfolio/6.jpg#">
									<img src="assets/img/portfolio/600x600.jpg" alt="" />
									<div class="sting_tm_portfolio_image_main"></div>
								</a>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /PORTFOLIO -->
		
		<!-- TESTIMONIALS -->
		<div class="sting_tm_section" id="testimonials">
			<div class="sting_tm_testimonial_wrap">
				<div class="sting_tm_universal_box_wrap">
					<div class="bg_wrap hero">
						<div class="overlay_image testimonial jarallax" data-speed="0"></div>
						<div class="overlay_color testimonial"></div>
					</div>
					<div class="content testimonial">
						<div class="sting_tm_main_title_holder testimonials">
							<h3>Testimonials</h3>
							<span>What our clients say</span>
						</div>
						<div class="container">
							<div class="carousel_wrap">
								<ul class="owl-carousel">
<?php 


    $query = "SELECT * FROM testimonials";
    $result = mysqli_query($conn, $query); 


    while ($testimonials = mysqli_fetch_assoc($result)) {

 ?>
									<li class="item">
										<div class="inner">
											<div class="image_holder">
												<img src="assets/img/<?php echo $testimonials['img']; ?>" alt="" />
											</div>
											<div class="definition">
												<p><?php echo $testimonials['text'];?></p>
											</div>
											<div class="svg_wrap">
												<i class="xcon-quote-left"></i>
											</div>
											<div class="name_holder_wrap">
												<span class="name"><?php echo $testimonials['name'];?></span>
												<span class="job"><?php echo $testimonials['job']; ?></span>
											</div>
										</div>
									</li>
<?php } ?>
									
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /TESTIMONIALS -->
		
		<!-- COUNTERBOX -->
		<div class="container">
			<div class="sting_tm_counter_wrap" data-col="4" data-delay="300">
				<ul class="sting_tm_counter_list sting_tm_miniboxes">
					<li>
						<div class="inner sting_tm_minibox">
							<h3><span><span class="sting_tm_counter" data-from="0" data-to="2222" data-speed="3000">0</span></span></h3>
							<span>Projects Completed</span>
						</div>
					</li>
					<li>
						<div class="inner sting_tm_minibox">
							<h3><span><span class="sting_tm_counter" data-from="0" data-to="333" data-speed="3000">0</span>K</span></h3>
							<span>Lines of Code</span>
						</div>
					</li>
					<li>
						<div class="inner sting_tm_minibox">
							<h3><span><span class="sting_tm_counter" data-from="0" data-to="8888" data-speed="3000">0</span></span></h3>
							<span>Happy Clients</span>
						</div>
					</li>
					<li>
						<div class="inner sting_tm_minibox">
							<h3><span><span class="sting_tm_counter" data-from="0" data-to="777" data-speed="3000">0</span>+</span></h3>
							<span>My Awwwards</span>
						</div>
					</li>
				</ul>
			</div>
		</div>
		<!-- /COUNTERBOX -->
		
		<!-- NEWS -->
		<div class="sting_tm_section" id="news">
			<div class="sting_tm_news_wrap">
				<div class="container">
					<div class="sting_tm_main_title_holder news">
						<h3>Latest News</h3>
						<span>Check out our latest news</span>
					</div>
					<div class="sting_tm_list_wrap blog_list" data-column="3" data-space="30">
						<ul class="total">
							<li class="wow fadeIn" data-wow-duration="1.2s">
								<div class="inner_list">
									<div class="image_wrap">
										<img class="small" src="assets/img/blog/500x350.jpg" alt="" />
										<img class="big" src="assets/img/blog/1170x450.jpg" alt="" />
										<div class="news_image" data-url="assets/img/blog/1.jpg"></div>
									</div>
									<div class="definitions_wrap">
										<div class="date_wrap">
											<p>January 22, 2018 <a href="index-2.html">Logos</a></p>
										</div>
										<div class="title_holder">
											<h3><a href="index.html">How to Create Great Logo for Your Business</a></h3>
										</div>
										<div class="definition">
											<p>If you’re reading this, you probably plan to start a small business or a side hustle very soon. And you probably have a couple ...</p>
										</div>
										<div class="full_def">
											<p>If you’re reading this, you probably plan to start a small business or a side hustle very soon. And you probably have a couple of questions running through your mind like: “Do I really need that logo?” or “Yep, I really need one. But how can I get it on a budget?” This post was created to help you bring system out of confusion so you can get the best out of your business and enter the market full force. First of all, yes, you do need a logo, and it doesn’t really matter how big or small your business is. Even if you’re making a craft soap and sell it to your relatives and friends, you still need a logo. If you plan to monetize an idea, you need a logo for it. Otherwise your work, your efforts, your image and your future brand belong to everyone, like grapes at a grocery store. But most importantly, the final design you come up with should be effective enough to promote your business and get you that place in the sun. Here are a few tips that will make the whole process easier and more fun. The first step to a killer logo is an idea. So start feeding your brain with new impressions and experiences. Use anything that works for you. Try hiking and gain inspiration from nature. Or visit an art gallery. Meditation, photography, action sports… In a nutshell, any kind of activity that fills you up with energy and joy may help you get that revolutionary idea. It’s always useful to browse the websites (or social media profiles) of your potential rivals to not only judge their logos but to practice analysis. Do you find your competitor’s logo effective or attractive? Try to think of the ways it helps the rival company to be profitable. Is there something you would change? Why? All of these questions can really help you to improve your own perception of your brand as well as the future marketing strategy. Find out what the strengths and weaknesses of your rivals are and benefit from that knowledge. When it comes to logo design, there are and always will be several safe choices like bold and elegant black and white logos or serif font wordmarks. But if you’re striving to get that killer logo, don’t be afraid to cross the line and try something rebellious. Go out there and get to know the latest design trends. For example, you may experiment with the bold colors like Ultra Violet, which is the Pantone color of the year, by the way. Or play with the typography and color gradients.</p>
										</div>
										<div class="sting_tm_popup_share_wrap">
											<ul>
												<li><a href="#">Facebook</a></li>
												<li><a href="#">Twitter</a></li>
												<li><a href="#">Linkedin</a></li>
												<li><a href="#">Behance</a></li>
											</ul>
										</div>
										<div class="read_more">
											<a href="#">Read More</a>
										</div>
									</div>
								</div>
							</li>
							<li class="wow fadeIn" data-wow-duration="1.2s" data-wow-delay="0.2s">
								<div class="inner_list">
									<div class="image_wrap">
										<img class="small" src="assets/img/blog/500x350.jpg" alt="" />
										<img class="big" src="assets/img/blog/1170x450.jpg" alt="" />
										<div class="news_image" data-url="assets/img/blog/2.jpg"></div>
									</div>
									<div class="definitions_wrap">
										<div class="date_wrap">
											<p>February 07, 2018 <a href="index-2.html">Illustrator</a></p>
										</div>
										<div class="title_holder">
											<h3><a href="index.html">How to Autumn Clean Your Design Career?</a></h3>
										</div>
										<div class="definition">
											<p>Spring cleaning isn't just about washing windows and clearing away cobwebs. Your design career also needs a thorough ...</p>
										</div>
										<div class="full_def">
											<p>Whether you're a freelancer or an in-house designer, or at a studio or agency, you'll probably have to rebrand at the and Whether you're a freelancer or an in-house designer, or at a studio or agency, you'll probably have to rebrand at the andWhether you're a freelancer or an in-house designer, or at a studio or agency, you'll probably have to rebrand at the andWhether you're a freelancer or an in-house designer, or at a studio or agency, you'll probably have to rebrand at the andWhether you're a freelancer or an in-house designer, or at a studio or agency, you'll probably have to rebrand at the and.Whether you're a freelancer or an in-house designer, or at a studio or agency, you'll probably have to rebrand at the and Whether you're a freelancer or an in-house designer, or at a studio or agency, you'll probably have to rebrand at the andWhether you're a freelancer or an in-house designer, or at a studio or agency.Whether you're a freelancer or an in-house designer, or at a studio or agency, you'll probably have to rebrand at the and Whether you're a freelancer or an in-house designer, or at a studio or agency, you'll probably have to rebrand at the andWhether you're a freelancer or an in-house designer, or at a studio or agency</p>
										</div>
										<div class="sting_tm_popup_share_wrap">
											<ul>
												<li><a href="#">Facebook</a></li>
												<li><a href="#">Twitter</a></li>
												<li><a href="#">Linkedin</a></li>
												<li><a href="#">Behance</a></li>
											</ul>
										</div>
										<div class="read_more">
											<a href="index.html">Read More</a>
										</div>
									</div>
								</div>
							</li>
							<li class="wow fadeIn" data-wow-duration="1.2s" data-wow-delay="0.4s">
								<div class="inner_list">
									<div class="image_wrap">
										<img class="small" src="assets/img/blog/500x350.jpg" alt="" />
										<img class="big" src="assets/img/blog/1170x450.jpg" alt="" />
										<div class="news_image" data-url="assets/img/blog/3.jpg"></div>
									</div>
									<div class="definitions_wrap">
										<div class="date_wrap">
											<p>April 12, 2018 <a href="index-2.html">Branding</a></p>
										</div>
										<div class="title_holder">
											<h3><a href="index.html">Innovative Ways to Increase Brand</a></h3>
										</div>
										<div class="definition">
											<p>Having a solid, trusted brand is important for your company to thrive. If your target audience doesn’t know or trust ...</p>
										</div>
										<div class="full_def">
											<p>Having a solid, trusted brand is important for your company to thrive. If your target audience doesn’t know or trust your brand, how will you ever increase your customer base and sales? Here are six innovative strategies you can use to increase brand awareness and help your business thrive. Inviting influencers into your niche is a great way to increase brand awareness and hopefully drive sales. When influencers have an established audience that knows and trusts them, once they mention your product(s) and discuss your brand in their content, those mentions will expand your reach and increase people’s awareness of your product. Ikonick is a perfect example of a company that works directly with influencers: It sells canvas art for your home and office. The way Ikonick uses influencers involves providing them with art and having those influencers pose with the art, then share the photos on social media. "Our relationships are an important part of our business,"  co-founder Mark Mastrandrea told me. "Our relationships make up our community, and the community is how our brand grows." Ikonick uses all types of influencers, from Instagram photographers to celebrities. The company's social strategy has enabled it to scale and grow exponentially because its influencers become part of its sales team -- even ambassadors. The relationship is mutually rewarding, Mastrandrea said. Companies can also offer to sponsor influencers at an event (if they do that sort of thing) and even use them as spokespersons for their brand and product(s). A lot of CrossFit-related companies do this, including Rogue Fitness, which sponsors certain athletes with clothing. The athlete then becomes a walking billboard for the company. Have you ever received an order that came in branded packaging? Rather than see it as just another shipment, perhaps you felt that that that special branding made the package seem like a gift. The team knows that the product experience doesn't commence at first use, but rather at the unboxing stage. How companies present their brand, and the story they tell through their design and graphics, can create an emotional connection with the customer that may last even longer than the product itself. </p>
										</div>
										<div class="sting_tm_popup_share_wrap">
											<ul>
												<li><a href="#">Facebook</a></li>
												<li><a href="#">Twitter</a></li>
												<li><a href="#">Linkedin</a></li>
												<li><a href="#">Behance</a></li>
											</ul>
										</div>
										<div class="read_more">
											<a href="index.html">Read More</a>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- /NEWS -->
		
		<!-- PARTNERS -->
		<div class="sting_tm_section">
			<div class="sting_tm_partners_wrap_total">
				<div class="container">
					<div class="sting_tm_partners_wrap">
						<ul class="owl-carousel">
							<li class="item">
								<img src="assets/img/partners/1.png" alt="" />
							</li>
							<li class="item">
								<img src="assets/img/partners/3.png" alt="" />
							</li>
							<li class="item">
								<img src="assets/img/partners/5.png" alt="" />
							</li>
							<li class="item">
								<img src="assets/img/partners/6.png" alt="" />
							</li>
							<li class="item">
								<img src="assets/img/partners/7.png" alt="" />
							</li>
							<li class="item">
								<img src="assets/img/partners/3.png" alt="" />
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- /PARTNERS -->
		
		<!-- CONTACT -->
		<div class="sting_tm_section" id="contact">
			<div class="sting_tm_contact_wrap_all">
				<div class="sting_tm_main_title_holder contact">
					<h3>Get in Touch with Us</h3>
					<span>Any question? Reach out to me and I will get back to you shortly.</span>
				</div>
				<div class="sting_tm_contact_wrap">
					<div class="main_input_wrap">
						<form action="" method="post" class="contact_form" id="contact_form">
							<div class="returnmessage" data-success="Your message has been received, We will contact you soon."></div>
							<div class="empty_notice"><span>Please Fill Required Fields</span></div>
							<div class="wrap wow fadeIn" data-wow-duration="1.2s" data-wow-delay="0.2s">
								<input id="name" type="text" placeholder="Your Name" name="name">
							</div>
							<div class="wrap wow fadeIn" data-wow-duration="1.2s" data-wow-delay="0.4s">
								<input id="email" type="text" placeholder="Your Email" name="email">
							</div>
							<div class="wrap wow fadeIn" data-wow-duration="1.2s" data-wow-delay="0.6s">
								<textarea id="message" placeholder="Your Message" name="message"></textarea>
							</div>
							<div class="sting_tm_button wow fadeIn" data-wow-duration="1.2s" data-wow-delay="0.8s">
								<input type="submit" name="send">
							</div>
						</form>
						<?php 

							if (isset($_POST['send'])) {
								$name = $_POST['name'];
								$email = $_POST['email'];
								$message = $_POST['message'];

								$query = "INSERT INTO quotes (`name`, `email`, `message`) VALUES ('$name', '$email', 'message')";
								$result = mysqli_query($conn, $query);

							}


						 ?>
					</div>
				</div>
			</div>
		</div>
		<!-- /CONTACT -->
		
<?php include_once 'inc/footer.php'; ?>