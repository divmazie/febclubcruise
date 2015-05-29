<script type="text/javascript">
                // hide answers
                $('.question').nextUntil(':not(p)').hide().addClass('answer');
                // make link
                $('.question').wrapInner('<a href="#"></a>');
                // toggle
                $('.question').click(function() {
                    $(this).nextUntil(':not(.answer)').slideToggle(200);
                    return false;
                });
                // show any anchor we are on
                $( document ).ready(function() {
                    window.location.hash.length>1 && $('#'+location.hash.substr(1)+' a').click()
                });

                // util
                function endsWith(str, suffix) {
                    return str.indexOf(suffix, str.length - suffix.length) !== -1;
                }


                $('a').filter(function() {
                    return this.hostname && !endsWith(location.hostname, this.hostname);
                }).attr({
                    target : "_blank"
                });

			</script>
		<br />
			<form method="post" action="#oops">
				<div class ="row">
					<div class="col-md-8">
						<div class="valErrors">
													</div>
						<div class="form-group">
							<label for="name">Your name</label>
							<input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="">
						</div>
					</div>
				</div>
				<div class ="row">
					<div class="col-md-8">
						
<div class="form-group" style="margin-bottom:0;;">
						<label for="pubname">Public Name for Your Reservation</label>
						<input type="text" class="form-control" id="pubname" name="pubname" placeholder="This will appear on the &quot;Who's Coming&quot; page" value="">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8 " >
						<div class="form-group">
							<div class="checkbox" >
								<label style="margin-top:0; margin-bottom:-10px; ">
									<input id="nolist" name="nolist" type="checkbox" >
									Do not list me publicly at all </label>
							</div>
							<script type="text/javascript">
                                $('#nolist').click(function() {
                                    $('#pubname').parent().slideToggle(200);
                                });
							</script>
						</div>
					</div>
				</div>

				<div class ="row">
					<div class="col-md-8">
						<div class="form-group">
							<label for="email">Your email address</label>
							<input type="text" class="form-control" id="email" name="email" placeholder="Enter email" value="">
						</div>
					</div>
				</div>
				<br/>
				<div class ="row">
					<div class="col-md-8">
						<button type="submit" name="submit" class="btn btn-primary btn-block">
							Complete Pre-Registration ($40)
						</button>
					</div>
				</div>
				<br/>
				<br/>
				<br/>
			</form>