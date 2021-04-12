@extends('layouts.app')

@section('main')

  <br>
  <button class="btn btn-primary" onclick="location.href='{{ url('products-page') }}'">
    Back to Products
  </button>

  <br><br>

  <form method="post" action="{{ route('products.update', $product->id) }}">


  <!-- <form @submit.prevent="actionMethod(product.id)" method="post" action="/products"> -->


        @method('PUT') 
        @csrf
    <!-- <div class="form-group">    
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
    </div> -->

    <div class="form-group">    
      <input type="text" placeholder="Product Name"  name="name" value={{ $product->name }} />
    </div>
    <div class="form-group">
      <input type="text" placeholder="Product Slug"  name="slug" value={{ $product->slug }} />
    </div>
    <div class="form-group">
      <input type="text" placeholder="Product Description"  name="description" value={{ $product->description }} />
    </div>
    <div class="form-group">
      <input type="text" placeholder="Product Price"  name="price" value={{ $product->price }} />
    </div>


    <button 
        type="submit"
        class="btn btn-primary">
        Edit</button>
  </form>
@endsection