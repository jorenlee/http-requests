@extends('layouts.app')

@section('main')

  <br>
  <button class="btn btn-primary" onclick="location.href='{{ url('products') }}'">
    Back to Products
  </button>

  <br><br>

  <form @submit.prevent="actionMethod(product.id)" method="POST" action="/products">
    <div class="form-group">    
      <input type="text" v-model="product.name" placeholder="Product Name"/>
    </div>
    <div class="form-group">
      <input type="text" v-model="product.slug" placeholder="Product Slug"/>
    </div>
    <div class="form-group">
      <input type="text" v-model="product.description" placeholder="Product Description"/>
    </div>
    <div class="form-group">
      <input type="text" v-model="product.price" placeholder="Product Price"/>
    </div>
    <button type="submit" class="btn btn-primary"
    onclick="location.href='{{ url('products') }}'"
    >Add</button>
  </form>
@endsection