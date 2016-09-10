@extends('layout.master')
@section('content')

<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Form Elements</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">

					{{ Form::open(array('class'=>'form-horizontal')) }}

							<fieldset>
							  <div class="control-group">
								
							{{ Form::label('focusedInput', 'Item Name', array('class'=>'control-label')) }}								

							{{ Form::text('item_name', '', array('class'=> 'input-xlarge focused controls', 'id'=>'focusedInput')) }}	

							  </div>
							  
							 <div class="control-group">
								
							{{ Form::label('itemprice', 'Item Price', array('class'=>'control-label')) }}								

							{{ Form::text('item_price', '', array('class'=> 'input-xlarge focused controls', 'id'=>'itemprice')) }}	

							  </div>  

							 <div class="control-group">
								
							{{ Form::label('itemqty', 'Item Quantity', array('class'=>'control-label')) }}								

							{{ Form::text('item_qty', '', array('class'=> 'input-xlarge focused controls', 'id'=>'itemqty')) }}	

							  </div>    

							  <div class="control-group">
								<!-- <label class="control-label" for="selectError">Modern Select</label> -->
 								
 								{{ Form::label('Modern Select', 'Gender', array('class'=>'control-label')) }}	

								<div class="controls">
								  <!-- <select id="selectError" data-rel="chosen">
									<option>Option 1</option>
									<option>Option 2</option>
									<option>Option 3</option>
									<option>Option 4</option>
									<option>Option 5</option>
								  </select> -->
								  {{Form::select('sex',[
								  	'Male', 'Female'
								  ], ['data-rel'=>'chosen'], ['id'=>'selectGender']) }}
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="selectError1">Multiple Select / Tags</label>
								<div class="controls">
								
								  {{ Form::select('subjectChosen[]', [
								  		'Unix', 'C', 'Java', 'PHP'
								  ], null, ['id' => 'selectMultiple', 'multiple' => 'multiple', 'data-rel' => 'chosen']) }}

								</div>
							  </div>
							  <!-- <div class="control-group">
								<label class="control-label" for="selectError2">Group Select</label>
								<div class="controls">
									<select data-placeholder="Your Favorite Football Team" id="selectError2" data-rel="chosen">
										<option value=""></option>
										<optgroup label="NFC EAST">
										  <option>Dallas Cowboys</option>
										  <option>New York Giants</option>
										  <option>Philadelphia Eagles</option>
										  <option>Washington Redskins</option>
										</optgroup>
										<optgroup label="NFC NORTH">
										  <option>Chicago Bears</option>
										  <option>Detroit Lions</option>
										  <option>Green Bay Packers</option>
										  <option>Minnesota Vikings</option>
										</optgroup>
										<optgroup label="NFC SOUTH">
										  <option>Atlanta Falcons</option>
										  <option>Carolina Panthers</option>
										  <option>New Orleans Saints</option>
										  <option>Tampa Bay Buccaneers</option>
										</optgroup>
										<optgroup label="NFC WEST">
										  <option>Arizona Cardinals</option>
										  <option>St. Louis Rams</option>
										  <option>San Francisco 49ers</option>
										  <option>Seattle Seahawks</option>
										</optgroup>
										<optgroup label="AFC EAST">
										  <option>Buffalo Dennis Jis</option>
										  <option>Miami Dolphins</option>
										  <option>New England Patriots</option>
										  <option>New York Jets</option>
										</optgroup>
										<optgroup label="AFC NORTH">
										  <option>Baltimore Ravens</option>
										  <option>Cincinnati Bengals</option>
										  <option>Cleveland Browns</option>
										  <option>Pittsburgh Steelers</option>
										</optgroup>
										<optgroup label="AFC SOUTH">
										  <option>Houston Texans</option>
										  <option>Indianapolis Colts</option>
										  <option>Jacksonville Jaguars</option>
										  <option>Tennessee Titans</option>
										</optgroup>
										<optgroup label="AFC WEST">
										  <option>Denver Broncos</option>
										  <option>Kansas City Chiefs</option>
										  <option>Oakland Raiders</option>
										  <option>San Diego Chargers</option>
										</optgroup>
								  </select>
								</div>
							  </div> -->

							   <div class="control-group">
								<!-- <label class="control-label" for="optionsCheckbox2"> checkbox</label> -->
								{{ Form::label('optionsCheckbox2', 'Agree', array('class'=>'control-label')) }}	

								<div class="controls">
								
								{{ Form::checkbox('agree', 1, null, ['class' => 'checkbox', 'id'=>'optionsCheckbox2']) }}
								</div>
							  </div>

							  <div class="form-actions">
								<button type="button" class="btn btn-primary save">Save changes</button>
								<button class="btn">Cancel</button>
							  </div>
							</fieldset>
						  {{ Form::close() }}
					
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

			<script type="text/javascript" src="{{ URL::asset('assets/js/jquery-1.9.1.min.js') }}"></script>
	
			<script type="text/javascript">
				
				$(function(){

					$.ajaxSetup({

						headers:{
							'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
						}
					
					});

					$('.save').click(function(){

						var item_name = $('#focusedInput').val();
						var checkbox = $('#optionsCheckbox2').val();
						var selectGender = $('#selectGender').val();
						var selectMultiple = $('#selectMultiple').val();
						var selectError2 = $('#selectError2').val();
						var itemqty = $('#itemqty').val();
						var itemprice = $('#itemprice').val();

						$.ajax({

							url : "{{action('ItemController@postform')}}",
							type : 'POST',
							async : false,
							data : {
									'ItemName': item_name,
									'checkbox' : checkbox,
									'selectGender' : selectGender,
									'selectMultiple' : selectMultiple,
									'itemqty' : itemprice,
									'itemprice' : itemprice,
								   },

							success: function(res){
								alert(res);
								console.log(res);
							},

							error: function(err){
								alert("Error");
								console.log(err);
							}

						})
					})

				});

			</script>

@stop()