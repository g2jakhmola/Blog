@extends('layout.master')
@section('content')

					<div class="box-content">
						<form class="form-horizontal">
							<fieldset>
							 <input type="hidden" name="_token" value="{{ csrf_token() }}">
							  <div class="control-group">
								<label class="control-label" for="inputSuccess">Student Name</label>
								<div class="controls">
								  <input type="text" class="form-control" id="studentname" name="studentname" placeholder="Enter Student Name">
								  <span class="help-inline"></span>
								</div>
							  </div>
							
							  <div class="control-group">
								<label class="control-label" for="selectError">Gender</label>
								<div class="controls">
								  <select id="gender" name="gender" data-rel="chosen">
									<option value="">--Select Gender--</option>
									<option value="0">Male</option>
									<option value="1">Female</option>
								  </select>
								</div>
							  </div>
							 
							<div class="control-group">
								<label class="control-label" for="inputSuccess">Phone Number</label>
								<div class="controls">
								  <input type="text" id="phone" name="phone" placeholder="Enter Phone Number">
								  <span class="help-inline"></span>
								</div>
							  </div>  

							  <div class="form-actions">
								<button type="button" class="btn btn-primary saverecords">Save changes</button>
								<button class="btn">Cancel</button>
							  </div>
							</fieldset>
						  </form>
					
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

		<script type="text/javascript" src="{{ URL::asset('assets/js/jquery-1.9.1.min.js') }}"></script>

		<script type="text/javascript">
				
				$(function(){

					$.ajaxSetup({
				         headers: {
				                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				                }
				          });


					$(".saverecords").click(function(){
						
						var studentname = $("#studentname").val();
						var gender 	 	= $("#gender").val();
						var phone 		= $("#phone").val();
						$.ajax({

							url  	 	: 	"{{action('StudentController@saverecord')}}",
							type  		: 	"POST",
							async	 	: 	false,
							data		: 	{
									'student_name' : studentname,
									'gender'	  : gender,
									'phone_number'	  	  : phone
							},
							success 	: 	function(res){

									if(res.success == true){
										alert(res.message);
										console.log('true', res);
									}else{
										console.log('false', res);
										alert(res.message);
									}
							},
							error		:   function(err){
									if(err.success == false){
										alert(err.message);
									}
							}

						});
						
					});
				})

		</script>		

@stop();