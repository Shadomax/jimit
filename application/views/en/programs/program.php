<div class="single_banner">
			<div class="container">
				<div class="single_banner_inner">
					<img src="<?=$program->getPicture()?>" alt="" />
					<div class="single_caption">
						<h1><?=strip_tags($program->title)?></h1>
						<h2><?=($program->certificate->name == 'HND') ? 'Diploma' : 'Bachelor' ; ?> in <?=strip_tags($program->title)?></h2>
					</div><!--end single caption-->
				</div><!--end single_banner_inner-->
			</div><!--end container-->
		</div><!--end single banner-->
	
		<div class="single_content">
			<div class="container">
				<div class="row">

					<div class="col-xs-12 col-sm-8 col-md-8 custom_right">
						<div class="single_content_left padding-border-right-twenty">
							<div class="tab_menu">
								<ul>
									<li class="active"><a href="#explore_program" data-toggle="tab">Explore This Program</a></li>
									<li><a href="#what_learn" data-toggle="tab">What you’llearn</a></li>
									<li><a href="#cost" data-toggle="tab">What it costs</a></li>
									<li><a href="#admission_requirements" data-toggle="tab">Admission Requirements</a></li>
								</ul>
							</div><!--end tab_menu-->
							<div class="tab-content single_tab_content">
								<div role="tabpanel" class="tab-pane active" id="explore_program">
									<?=$program->explore?>
								</div><!--end tab-pane-->
								<div role="tabpanel" class="tab-pane" id="what_learn">
									<?=$program->learn?>
								</div><!--end tab-pane-->
								<div role="tabpanel" class="tab-pane" id="cost">
									<?=$program->cost?>
								</div><!--end tab-pane-->
								<div role="tabpanel" class="tab-pane" id="admission_requirements">
									<?=$program->requirement?>
								</div><!--end tab-pane-->
							</div><!--end tab-content-->
						</div><!--end single content left-->
					</div><!--end custom_right-->
					
					<div class="col-xs-12 col-sm-4 col-md-4 custom_left">
						<div class="sidebar">
							<div class="sidebar_item">
								<div class="item_inner program">
									<h4>Program At a Glance</h4>
									<ul>
										<li><span>Program Code:</span><?=$program->code?></li>
										<!--<li><span>Accerediation:</span>Ontario College Of Diploma</li>-->
										<li><span>Length of Study:</span><?=$program->certificate->length?> Years</li>
										<li><span>Study Options:</span><?=$program->options?></li>
										<li><span>Campus Location:</span><?=$program->location?></li>
									</ul>
								</div>
							</div><!--end sidebar item-->
							<div class="sidebar_item">
								<div class="item_inner">
									<h4>Tution Fee</h4>
									<a href="#" class="fees"><?=$program->tution_fee?></a>
								</div>
							</div><!--end sidebar item-->
							<div class="sidebar_item">
								<div class="item_inner slider">
									<h4>What Students Say</h4>
									<div id="single_banner">
										<ul class="slides">
											<li>
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,</p> 
												<div class="carousal_bottom">
													<div class="thumb">
														<img src="img/courses/testi_thumb.png" draggable="false" alt="" />
													</div>
													<div class="thumb_title">
														<span class="author_name">Jeremy Asigner</span>
														<span class="author_designation">Web Developer<a href="#"> Here</a></span>
													</div>
												</div>
											</li>
											<li style="display:none;">
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,</p> 
												<div class="carousal_bottom">
													<div class="thumb">
														<img src="img/courses/testi_thumb.png" draggable="false" alt="" />
													</div>
													<div class="thumb_title">
														<span class="author_name">Jeremy Asigner</span>
														<span class="author_designation">Web Developer<a href="#">Here</a></span>
													</div>
												</div>
											</li>
											<li style="display:none;">
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,</p> 
												<div class="carousal_bottom">
													<div class="thumb">
														<img src="img/courses/testi_thumb.png" draggable="false" alt="" />
													</div>
													<div class="thumb_title">
														<span class="author_name">Jeremy Asigner</span>
														<span class="author_designation">Web Developer<a href="#">Here</a></span>
													</div>
												</div>
											</li>
										</ul>
									</div><!--end banner-->
								</div><!--slider-->
							</div><!--end sidebar item-->
							
							<div class="sidebar_item">
								<div class="item_inner question">
									<h4>Got Questions?</h4>
									<h5>For Further Information Contact:</h5>
									<h6>Jennifer Rouse</h6>
									<p>Professor<br/>705.454.236.554 ext 55<br/><a href="mailto:jenifer@example.com">jenifer@example.com</a></p>
								</div>
							</div><!--end sidebar item-->
							
							
						</div><!--end sidebar-->
					</div>
					
				</div><!--end row-->
			</div><!--end container-->
		</div><!--end single content-->