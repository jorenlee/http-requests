@extends('layouts.app')

@section('main')
  <div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Add Address</h1>
      <div>
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
            </ul>
          </div><br />
        @endif
        <a style="margin: 19px;"
          href="{{ route('contacts.show')}}"
          class="btn btn-primary">back to contact Details</a>

        <form method="post" action="{{ route('addresses.store') }}">
            @csrf
            <div class="form-group">    
                <label for="street_address">Street Address</label>
                <input type="text" class="form-control" name="street_address"/>
            </div>
            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" class="form-control" name="city"/>
            </div>
            <div class="form-group">
                <label for="country">Country:</label>
                <input type="text" class="form-control" name="country"/>
            </div>              
            <button type="submit" class="btn btn-primary-outline">Add Address</button>
        </form>
      </div>
    </div>
  </div>
@endsection