@extends('layout.master')
@section('content')
<html>
<head>
	<title></title>
</head>
<body>

@if(count($errors) > 0 )
	<div class="alert alert-danger">
		<strong>Whoop!!</strong> There were some problem with your inputs <br><br>
		<ul>
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif

<form action="{{action('ProductController@save')}}" method="post">
<input type="hidden" name="_token" value="<?= csrf_token(); ?>"
	<table>
		<tr>
			<td>
				Product Name
			</td>
			<td>
				<input type="text" name="product_name">
			</td>
		</tr>
		<tr>
			<td>
				Product Price
			</td>
			<td>
				<input type="text" name="product_price">
			</td>
		</tr>
		<tr>
			<td>
				Product Quantity
			</td>
			<td>
				<input type="text" name="product_qty">
			</td>
		</tr>
		<tr>
			
			<td>
				<input type="submit" name="save" value="Save" class="btn btn-success">
			</td>
		</tr>
	</table>
</form>

</body>
</html>
@stop()