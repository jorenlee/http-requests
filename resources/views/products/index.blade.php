@extends('layouts.app')

@section('main')
  <div>
    <button type="submit" class="btn btn-primary" onclick="location.href='{{ url('form') }}'">Add Product</button>
        <table>
        <thead>
            <tr>
                <th class="text-left">Product ID</th>
                <th class="text-left">Product Name</th>
                <th class="text-left">Product Slug</th>
                <th class="text-left">Product Description</th>
                <th class="text-left">Product Price</th>
                <th class="text-left">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="product in products" :key="product.id">
            <td>{% product.id %}</td>
            <td>{% product.name %}</td>
            <td>{% product.slug %}</td>
            <td>{% product.description %}</td>
            <td>{% product.price %}</td>
            <td>
                <div class="btn-group" role="group">
                <!-- <router-link
                    :to="{name: 'edit', params: { id: product.id }}"
                    class="btn btn-success">
                        Edit
                </router-link> -->
                <!-- <button class="btn btn-warning"
                    @click="editForm(product.id)">
                    Edit
                </button> -->
                <button class="btn btn-warning" onclick="location.href='{{ url('edit/1') }}'">
                    Edit
                </button>
                <button class="btn btn-danger"
                    @click="deleteProduct(product.id)">
                    Delete
                </button>
                </div>
            </td>
            </tr>
        </tbody>
        </table>
  </div>
@endsection