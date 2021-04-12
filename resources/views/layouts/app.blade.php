<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>{{env('APP_NAME')}}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;600&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/@mdi/font@5.x/css/materialdesignicons.min.css" rel="stylesheet">

        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

        <link rel="stylesheet" href="{{ mix('css/app.css') }}" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/3.0.7/vue.global.js"></script>

        <!-- <script src="https://unpkg.com/vue@next"></script> -->
    </head>
    <body>
        <div class="container" id="app">
            <!-- @section('sidebar')
            @show -->
            @yield('main')
        </div>
        <script>
            var app = {
                delimiters: ['{%', '%}'],
                data() {
                    return {
                        products: [],
                        product: {
                            name: '',
                            slug: '',
                            description: '',
                            price: '',
                        },
                        actionText: 'Add Product',
                        isEditClicked: false,
                        message: 'sample'
                    }
                },
                created() {
                    this.getProducts()
                },
                methods: {
                    // Get Product
                    getProducts() {
                        //console.log('mao ni', this.products)
                        axios.get('http://localhost:8000/api/products')
                        .then(res => {
                            this.products = res.data;
                            //console.log('mao ni', this.products)
                        })
                        .catch(err => {
                            // handle error
                            console.log(err);
                        })
                    },
                    async addProduct() {
                        await axios
                        .post('http://localhost:8000/api/products', this.product)
                        .catch(err => console.log(err))
                        await this.getProducts();
                        location.reload();
                    },
                    actionMethod(id){
                        if(this.isEditClicked == true){
                            this.updateProduct(id);
                        }else {
                            this.addProduct();
                        }
                    },
                    async editForm(id){
                        this.actionText = 'Update Product';
                        this.isEditClicked = true;
                        await axios
                        .get(`http://localhost:8000/api/products/${id}`)
                        .then(res => {
                           this.product = res.data;
                            console.log(res.data.id);
                            console.log(res.data);
                            this.product = {
                                id: res.data.id,
                                name: res.data.name,
                                slug: res.data.slug,
                                description: res.data.description,
                                price: res.data.price
                            }
                        });
                        // console.log(this.products);
                        // console.log(this.product);
                    },
                    async updateProduct(id) {
                        await axios
                        .put(`http://localhost:8000/api/products/${id}`, this.product)
                        .catch(err => console.log(err));
                     
                        console.log('Update Product')
                        await this.getProducts();
                        this.actionText = 'Add Product';
                        this.isEditClicked = false;
                        location.reload();
                    },
                    async deleteProduct(id) { 
                        await axios
                        .delete(`http://localhost:8000/api/products/${id}`)
                        await this.getProducts();
                    }
                }
            }

            mainApp = Vue.createApp(app)

            mainApp.component('todo-item', {
                template: `<li>This is a todo</li>`
            })

            window.vm = mainApp.mount('#app')
        </script>
    </body>
</html>