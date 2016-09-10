@extends('layout.master')
@section('content')
<html>
<head>
	<title></title>
</head>
<body>
<p style="color:red">{{$errors->first('product_name')}}</p>
<p style="color:red">{{$errors->first('product_price')}}</p>
<p style="color:red">{{$errors->first('product_qty')}}</p>

<form action="{{action('ProductController@update')}}" method="post">
<input type="hidden" name="_token" value="<?= csrf_token(); ?>">

<input type="hidden" name="id" value="<?php echo $row->id; ?>">
	<table>
		<tr>
			<td>
				Product Name
			</td>
			<td>
				<input type="text" name="product_name" value="<?php echo $row->product_name; ?>">
			</td>
		</tr>
		<tr>
			<td>
				Product Price
			</td>
			<td>
				<input type="text" name="product_price" value="<?php echo $row->product_price; ?>">
			</td>
		</tr>
		<tr>
			<td>
				Product Quantity
			</td>
			<td>
				<input type="text" name="product_qty" value="<?php echo $row->product_qty; ?>">
			</td>
		</tr>
		<tr>
			
			<td>
				<input type="submit" name="save" value="Save">
			</td>
		</tr>
	</table>
</form>

</body>
</html>
@stop()