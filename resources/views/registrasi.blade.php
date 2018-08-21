@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-header">
       Registrasi
    </div>
    <div class="card-body">
       <div class="card-text">
            <form action="{{ route('customer.store') }}" method="post">
                {{ csrf_field() }}
                

                <div class="form-group">
                    <label for="name1">Name</label>
                    <input type="text" class="form-control" id="name1" aria-describedby="nameHelp" placeholder="Input name" name="name" value="{{ old('name') }}">
                    <small id="nameHelp" class="form-text text-muted">Nama lengkap</small>
                 </div>

                 <div class="form-group">
                    <label for="email1">Email</label>
                    <input type="email" class="form-control" id="email1" aria-describedby="emailHelp" placeholder="Input email" name="email" value="{{ old('email') }}">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                 </div>

                 <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control"  name="password">
                    
                </div>

                <div class="form-group">
                    <label for="password">Confirm password</label>
                    <input type="password" class="form-control"  name="password_confirmation">
                    
                </div>

                 <div class="form-group">
                    <label for="nohp1">Nohp</label>
                    <input type="text" class="form-control" id="nohp1" aria-describedby="nohpHelp" placeholder="Input nohp" name="nohp">
                    <small id="nohpHelp" class="form-text text-muted">We'll never share your nohp with anyone else</small>
                 </div>

                 <div class="form-group">
                    <label for="content">Alamat</label>
                    <textarea name="alamat" id="content" rows="5" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Next</button>
                    </div>
                </div>

                
            </form>
        </div>
    </div>
</div>
@endsection
