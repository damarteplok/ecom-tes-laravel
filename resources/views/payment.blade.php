@extends('layouts.master')

@section('content')



<div class="card">
	<div class="card-header">
		Payment Confirmation
	</div>
	<div class="card-body">
		<form action="{{ route('payment.store2') }}" method="post">
			{{ csrf_field() }}

			<div class="form-group">
				<label for="order">Order Id</label>
				<input type="text" name="order_id" class="form-control">
			</div>

			<div class="form-group">
				<label for="amount">Payment Amount</label>
				<input type="text" name="payment_amount" class="form-control">
			</div>

			<div class="form-group">
				<label for="BankR">Bank Receiver</label>
				<select name="bank_receiver" id="bank_receiver" class="form-control">

					<option value="BRI">BRI--12321321323 a/n Damar Khoirul Huda</option>
					<option value="BNI">BNI--12321321323 a/n Damar Khoirul Huda</option>
				  	
				  
				</select>
			</div>

			<div class="form-group">
				<label for="BankF">From Bank</label>
				<select name="bank_from" id="bank_from" class="form-control">

					<option value="BRI">BRI</option>
					<option value="BRI">BNI</option>
					<option value="BRI">Mandiri</option>
					<option value="BRI">Cimb</option>
					<option value="BRI">BCA</option>
					<option value="BRI">Permata</option>	
				  
				</select>
			</div>

			<div class="form-group">
				<label for="account">Account Name</label>
				<input type="text" name="account_name" class="form-control">
			</div>

			<div class="form-group">
				<label for="account">Account Nohp</label>
				<input type="text" name="account_nohp" class="form-control">
			</div>


			<div class="form-group">
				<label for="description">Message</label>
				<textarea name="message" id="summernote" cols="5" rows="5" class="form-control"></textarea>
			</div>

			<div class="form-group">
				<div class="text-center">
					<button class="btn btn-success" type="submit">Save</button>
				</div>
			</div>

		</form>
	</div>
</div>


@endsection