@extends('layouts.app')

@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Contact Details</h1>
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

        <form method="get" action="{{ route('contacts.show', $contact->id) }}">
            @method('GET') 
            @csrf
            <div class="form-group">
                <label for="first_name">First Name:</label>
                {{$contact->first_name}}
            </div>

            <div class="form-group">
                <label for="last_name">Last Name:</label>
                {{$contact->last_name}}
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                {{$contact->email}}
            </div>
            <div class="form-group">
                <label for="city">City:</label>
                {{$contact->city}}
            </div>
            <div class="form-group">
                <label for="country">Country:</label>
                {{$contact->country}}
            </div>
            <div class="form-group">
                <label for="job_title">Job Title:</label>
                {{$contact->job_title}}
            </div>
        </form>
    </div>
</div>
@endsection