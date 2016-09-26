<!-- single -->
	<div class="single">
	<div class="container">
		<h3><?=$team->name?></h3>
		<div class="single-left">
			<p>Position <span><?=$team->position?></span></p>
			<img src="<?=$team->getPicture()?>" alt="<?=$team->name?>" class="img-responsive" />
		</div>
		<div class="single-right">
			<h4>Career History</h4>
			<p><?=$team->bio?></p>
		</div>
		<div class="clearfix"> </div>

		<div class="tags-cate">
			<div class="cat-grid">
				<h3><span>C</span>ategories</h3>
				<ul>
					<li><a href="#">Donec rutrum malesuada curabitur</a></li>
					<li><a href="#">Sed porttitorlactus nibh</a></li>
					<li><a href="#">Curabitur aliquet quam id dui posuere blandit</a></li>
					<li><a href="#">Nulla porttitoraccumsan tincidunt</a></li>
					<li><a href="#">which don't look even slightly believable</a></li>
					<li><a href="#">Sed porttitorlactus nibh</a></li>
				</ul>
			</div>
			<div class="cat-grid">
				<h3><span>A</span>rchives</h3>
				<ul>
					<li><a href="#">Jan 24,2010.</a></li>
					<li><a href="#">April 15,2012.</a></li>
					<li><a href="#">Sep 24,2012.</a></li>
					<li><a href="#">May 24,2014.</a></li>
					<li><a href="#">April 15,2014.</a></li>
					<li><a href="#">August 21,2015.</a></li>
				</ul>
			</div>
			<div class="cat-grid">
				<h3><span>T</span>ags</h3>
				<div class="top-social-icons">
						<a href="#">Cards</a>
						<a href="#">Website</a>
						<a href="#">Icons</a>
					<div class="clearfix"> </div>
						<a href="#">Themeforest</a>
						<a href="#">Interfaces</a>
					<div class="clearfix"> </div>
						<a href="#">Inspiration</a>
					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
		<div class="three-com">
			<h3>3 Comment <span>on</span> <label>Donec volutpat ligula non dapibus volutpat</label></h3>
			<div class="tom-grid">
				<div class="tom">
					<img src="images/co.png" alt=" " />
				</div>
				<div class="tom-right">
					<div class="Hardy">
						<h4>Tom Hardy</h4>
						<p><label>10 September 2015</label></p>
					</div>
					<div class="reply">
						<a href="#">Reply</a>
					</div>
					<div class="clearfix"> </div>
					<p class="lorem">There are many variations of passages of Lorem Ipsum available,
					but the majority have suffered alteration in some form, by injected humour, 
					or randomised words which don't.</p>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="tom-grid humour">
				<div class="tom">
					<img src="images/co.png" alt=" " />
				</div>
				<div class="tom-right">
					<div class="Hardy">
						<h4>Prad Pitt</h4>
						<p><label>10 September 2015</label></p>
					</div>
					<div class="reply">
						<a href="#">Reply</a>
					</div>
					<div class="clearfix"> </div>
					<p class="lorem">There are many variations of passages of Lorem Ipsum available,
					but the majority have suffered alteration in some form, by injected humour, 
					or randomised words which don't.</p>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="tom-grid">
				<div class="tom">
					<img src="images/co.png" alt=" " />
				</div>
				<div class="tom-right">
					<div class="Hardy">
						<h4>Tom Cruis</h4>
						<p><label>10 September 2015</label></p>
					</div>
					<div class="reply">
						<a href="#">Reply</a>
					</div>
					<div class="clearfix"> </div>
					<p class="lorem">There are many variations of passages of Lorem Ipsum available,
					but the majority have suffered alteration in some form, by injected humour, 
					or randomised words which don't.</p>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="leave-comment">
			<h3>Leave your comment</h3>
			<p>Suspendisse tempor tellus sed nisl semper, quis condimentum turpis pharetra.</p>
			<form>
				<input type="text" placeholder="Name" required=" ">			           					   
				<input type="text" placeholder="Email" required=" ">
				<input type="text" placeholder="Your Website" required=" ">
				<textarea placeholder="Message" required=" "></textarea>
				<input type="submit" value="Add Comment">
				<div class="clearfix"> </div>
			</form>
		</div>
	</div>
	</div>
<!-- //single -->