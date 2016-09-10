@extends('layout.master')
@section('content')

<!-- <p style="color:red"> <?php //echo Session::get('message'); ?> </p> -->

@if(Session::has("success"))
	<p style="color:red">
	{{Session::get("success")}}
	</p>
@endif

<a href="<?php echo 'productform'; ?>">Add new Record </a>
	<table class="table table-bordered table-hover">
		
		<thead>
			<th>S.No</th>
			<th>ProductName</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Action</th>
		</thead>
		<tbody>
			<?php
				$i=1;
				foreach($data as $row){
				?>
					<tr>
						<td>
							<?php echo $i++; ?>
						</td>
						<td>
							<?php echo $row->product_name; ?>
						</td>
						<td>
							<?php echo $row->product_price; ?>
						</td>
						<td>
							<?php echo $row->product_qty; ?>
						</td>
						<td>
							<a href="<?php echo 'EditProduct/'.$row->id; ?>">Edit |
							<a href="<?php echo 'DeleteProduct/'.$row->id; ?>">Delete
						</td>
					</tr>
				<?php	
				}
			?>
			<?php 
				//Display Next Prev button
				echo $data->render();
			 ?>
		</tbody>

	</table>

@stop();