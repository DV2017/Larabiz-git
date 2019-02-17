@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
      <a cass="btn btn-link" href="/home">Back</a>
      <div class="card">
        <div class="card-header"><h4 class="lead">Edit listing</h4></div>
          <div class="card-body">

          <form action="/listings/{{$listing->id}}" method="POST">
            {{method_field('PATCH')}}
            {{csrf_field()}}
            
            <div class="form-group">
              <label for="company" >Company</label>
              <input class="form-control {{$errors->has('company') ? 'is-invalid' : ''}}" type="text" name="company" id="" required value="{{ $listing->company }}">
            </div>
            <div class="form-group">
              <label for="address" >Address</label>
              <input class="form-control {{$errors->has('address') ? 'is-invalid' : ''}}" type="text" name="address" id="" required value="{{ $listing->address }}">
            </div>
            <div class="form-group">
              <label for="website">Website</label>
              <input class="form-control {{$errors->has('website') ? 'is-invalid' : ''}}" type="text" name="website" id="" required value="{{ $listing->website }}">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" type="text" name="email" id="" required value="{{ $listing->email }}">
            </div>
            <div class="form-group">
              <label for="phone">Phone</label>
              <input class="form-control {{$errors->has('phone') ? 'is-invalid' : ''}}" type="text" name="phone" id="" required value="{{ $listing->phone }}">
            </div>
            <div class="form-group">
              <label for="bio">Bio</label>
              <input class="form-control {{$errors->has('bio') ? 'is-invalid' : ''}}" type="text" name="bio" id="" required value="{{ $listing->bio }}">
            </div>
            <div class="form-group">
              <input type="submit" value="Submit" class="btn btn-outline-info">
            </div>

          </form>

          </div>
        </div>
    </div>
</div>

@endsection