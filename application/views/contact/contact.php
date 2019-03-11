<?php $data['data'] = 'Liên hệ';?>
<?php $data['contact'] = ' class="act"';?>
<?php $this->load->view('template/header',$data);?>
<?php $this->load->view('template/share');?>
<script src="<?php echo base_url_ci;?>public/js/contact.js"></script>
	<script type="text/javascript">
		var base_url_ci = "<?php echo base_url_ci;?>";
	</script>
<!-- contact -->
<div class="contact">
		<div class="container container_bg">
			<div class="map">
				<h3>Địa chỉ của chúng tôi</h3>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.5971263383844!2d106.63755031428747!3d10.8421112609438!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752984a36a471d%3A0x5628f842d92e23dc!2zMjgvNEIgxJDGsOG7nW5nIFBoYW4gSHV5IMONY2gsIFBoxrDhu51uZyAxMiwgR8OyIFbhuqVwLCBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1552143678871" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
			<div class="contact-grids">
				<div class="col-md-3 contact-grid">
					<div class="call">
						<div class="col-xs-3 contact-grdl">
							<span class="glyphicon glyphicon-phone" aria-hidden="true"></span>
						</div>
						<div class="col-xs-9 contact-grdr">
							<ul>
								<li>0382834597</li>
								<li>0373980139</li>
							</ul>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="address">
						<div class="col-xs-3 contact-grdl">
							<span class="glyphicon glyphicon-send" aria-hidden="true"></span>
						</div>
						<div class="col-xs-9 contact-grdr">
							<ul>
								<li>284 Phan Huy Ích, Phường 14, Quận Gò Vấp</li>
								<li>TP. Hồ Chí Minh</li>
							</ul>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="mail">
						<div class="col-xs-3 contact-grdl">
							<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
						</div>
						<div class="col-xs-9 contact-grdr">
							<ul>
								<li><a href="mailto:lehuuphuoc0196@gmail.com">lehuuphuoc0196@gmail.com</a></li>
							</ul>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="col-md-5 contact-grid placeholder-custom">
					<div id="sucess"></div>
					<form>
						 <div id="name-error"></div>
                        <input type="text" id="name" placeholder="Họ và Tên" required="">
						<div id="email-error"></div>
						<input type="email" id="email-contact" placeholder="Địa chỉ Email" required="">
						<div id="content-error"></div>
						<textarea type="text" id="content" placeholder="Nội dung..."></textarea>
						<input type="button" value="Gửi" onclick="Contact.contact()" class="button-contact-custom">
					</form>
				</div>
				<div class="col-md-4 contact-grid">
					<div class="newsletter1">
						<h3><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>Bạn yêu thích website ?</h3>
					</div>
					<form>
						<input type="email" value="Email" id="email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
						<input type="button" value="Đăng ký" class="button-contact-custom">
					</form>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //contact -->
<?php $this->load->view('template/footer');?>