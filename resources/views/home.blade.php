@extends('layouts.app')

@section('content')
<!-- <div class="container"> -->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  <div class="row">
                  <h3>Dashboard</h3>
                  <a class="btn btn-success ml-auto" href="listings/create">New listing</a>
                  </div>                  
                </div>

                <div class="card-body">
                    <!-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif -->

                    <h4 class="lead">Your listings</h4>
                    @if($user->listings->count())
                    <table class="table table-striped">
                      <tr>
                        <th>Company</th>
                        <th></th>
                        <th></th>
                      </tr>
                        @foreach($user->listings as $listing)
                        <tr>
                        <td>{{$listing->company}}</td>
                        <td><a class="btn btn-default" href="listings/{{$listing->id}}/edit">Edit</a></td>
                        <td>
                          <form action="listings/{{$listing->id}}" method="POST" onsubmit="return confirm('Confirm Delete?')">
                            {{ method_field('DELETE')}}
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-link" value="Delete" >
                          </form>
                        </td>
                        </tr>
                        @endforeach                      
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
<!-- </div> -->
@endsection
