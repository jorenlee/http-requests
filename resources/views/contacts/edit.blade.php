@extends('layouts.app')

@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update a contact</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <a style="margin: 19px;" href="{{ route('contacts.index')}}" class="btn btn-primary">back to contacts</a>
        
        <form method="post" action="{{ route('contacts.update', $contact->id) }}">
            @method('PUT') 
            @csrf
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" class="form-control" name="first_name" value={{ $contact->first_name }} />
            </div>
            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" class="form-control" name="last_name" value={{ $contact->last_name }} />
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" name="email" value={{ $contact->email }} />
            </div>
            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" class="form-control" name="city" value={{ $contact->city }} />
            </div>
            <div class="form-group">
                <label for="country">Country:</label>
                <input type="text" class="form-control" name="country" value={{ $contact->country }} />
            </div>
            <div class="form-group">
                <label for="job_title">Job Title:</label>
                <input type="text" class="form-control" name="job_title" value={{ $contact->job_title }} />
            </div> 
            <button type="submit" class="btn btn-primary">Update</button>
        </form>

        <form method="post" action="{{ route('addresses.store') }}">
            @csrf
            <div class="col-sm-8 offset-sm-2">
                <h1 class="display-3">Add Address</h1>
            <div>
    
            <input type="text" class="form-control"
                name="contact_id"
                value={{ $contact->id }} />

            <div class="form-group">    
                <label for="street_address">Street Address:</label>
                <input type="text" class="form-control" name="street_address" />
            </div>

            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" class="form-control" name="city" />
            </div>

            <div class="form-group">
                <label for="country">Country:</label>
                <input type="text" class="form-control" name="country" />
            </div>  

            <button type="submit" class="btn btn-primary">Add Address</button>
        </form>
        
        <div class="row">
            <div class="col-sm-12">
            <h1 class="display-3">Lists of all address</h1>    
            <table class="table table-striped">
                <thead>
                    <tr>
                    <td>Street Address</td>
                    <td>City</td>
                    <td>Country</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($addresses as $address)
                    <tr>
                        <td>{{$address->street_address}}</td>
                        <td>{{$address->city}}</td>
                        <td>{{$address->country}}</td>
                        <td>
                            <a href="{{ route('contacts.show',$contact->id)}}" class="btn btn-primary">Details</a>
                        </td>
                        <td>
                            <a href="{{ route('contacts.edit',$contact->id)}}" class="btn btn-warning">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('contacts.destroy', $contact->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
        </div>
    </div>
</div>
@endsection