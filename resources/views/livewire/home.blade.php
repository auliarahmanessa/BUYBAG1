<x-app-layout>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                @include('livewire.sidebar') 
                <div class="col-lg-9">   
                        
                        <!DOCTYPE html>
                        <html lang="en">
                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <title>Katalog Produk</title>
                            <style>
                                body {
                                    font-family: Arial, sans-serif;
                                }
                                .catalog-container {
                                    display: flex;
                                    justify-content: center;
                                    gap: 20px;
                                    flex-wrap: wrap;
                                    padding: 20px;
                                }
                                .catalog-item {
                                    text-align: center;
                                    border: 1px solid #ddd;
                                    border-radius: 8px;
                                    padding: 15px;
                                    width: 200px;
                                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                                }
                                .catalog-image img {
                                    width: 100%;
                                    height: auto;
                                    border-radius: 8px;
                                }
                                .catalog-title {
                                    margin-top: 10px;
                                    font-size: 18px;
                                    font-weight: bold;
                                }
                                .cart-icon {
                                    margin-top: 10px;
                                }
                                .cart-icon a {
                                    text-decoration: none;
                                    color: #fff;
                                    background-color: #007bff;
                                    padding: 10px 15px;
                                    border-radius: 5px;
                                    display: inline-block;
                                    font-size: 14px;
                                }
                                .cart-icon a:hover {
                                    background-color: #0056b3;
                                }
                            </style>
                        </head>
                        <body>
                        
                        <h1 style="text-align: center; padding: 20px;">Katalog Produk</h1>
                        <div class="catalog-container">
                            <!-- Item 1 -->
                            <div class="catalog-item">
                                <div class="catalog-image">
                                    <a href="https://example.com/product1" target="_blank">
                                        <img src="https://bigmo.sgp1.digitaloceanspaces.com/wp-content/uploads/2024/12/depan-lavender.jpeg" alt="Produk 1">
                                    </a>
                                </div>
                                <div class="catalog-title">Sheena bag</div>
                                <div class="cart-icon">
                                    <a href="{{ route('payment.form', 1) }}">🛒 buy me</a> <!-- Produk 1 -->
                                </div>
                            </div>
                        
                            <!-- Item 2 -->
                            <div class="catalog-item">
                                <div class="catalog-image">
                                    <a href="https://example.com/product2" target="_blank">
                                        <img src="https://bigmo.sgp1.digitaloceanspaces.com/wp-content/uploads/2024/02/20c40421-52c6-4d87-b5c1-dfe9ade23e8e-1.jpg" alt="Produk 2">
                                    </a>
                                </div>
                                <div class="catalog-title">Pistachio bag</div>
                                <div class="cart-icon">
                                    <a href="{{ route('payment.form', 2) }}">🛒 buy me</a> <!-- Produk 2 -->
                                </div>
                            </div>
                        
                            <!-- Item 3 -->
                            <div class="catalog-item">
                                <div class="catalog-image">
                                    <a href="https://example.com/product3" target="_blank">
                                        <img src="https://bigmo.id/wp-content/uploads/2023/11/clio-chesnut-katalog2-800x800.jpg" alt="Produk 3">
                                    </a>
                                </div>
                                <div class="catalog-title">Sling bag</div>
                                <div class="cart-icon">
                                    <a href="{{ route('payment.form', 3) }}">🛒 buy me</a> <!-- Produk 3 -->
                                </div>
                            </div>
                        </div>
                        
                        </body>
                        </html>


                    </div>
                    <div class="row product-grid-3">
                        @foreach ($products as $p)
                            <div class="col-lg-4 col-md-4 col-6 col-sm-6 ">
                                <div class="product-cart-wrap mb-30 border-slate-200 shadow-md">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{ route('product.details', $p->id) }}" class="">
                                                <img class="default-img" src="{{  asset('storage/'.$p->image) }}"
                                                    alt="{{$p->name}}">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category flex gap-2 mb-2">
                                            @foreach ($p->categories as $index => $cat)
                                                @if ($index < 4)
                                                    <a class="bg-blue-400 py-1 px-2 text-white font-semibold rounded-full"
                                                        href="/?{{ http_build_query(array_merge(request()->query(), ['category' => $cat->slug])) }}"
                                                        rel="tag">{{ $cat->name }}</a>
                                                @endif
                                            @endforeach
                                        </div>
                                        <h2>
                                            <a href="{{ route('product.details', $p->id) }}"
                                                class="text-xl">
                                                {{ strlen($p->name) > 20 ? substr($p->name, 0, 17) . '...': $p->name }}
                                            </a>
                                        </h2>
                                        <div class="flex items-center justify-between">
                                            <div class="">
                                                <p class="text-xl font-bold text-blue-500">${{ $p->price }}</p>
                                                <p class="text-md line-through opacity-50">${{ $p->old_price }}</p>
                                            </div>
                                            <div class="show flex justify-end mt-3">
                                                <form action="{{ route('cart.add') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $p->id }}">
                                                    <a onclick="this.closest('form').submit()" class="text-blue-500 hover:text-black duration-100">
                                                        {{-- Add to cart --}}
                                                        <i class="fi-rs-shopping-cart-add text-3xl"></i>
                                                    </a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!--pagination-->
                    {{ $products->links('pagination::tailwind') }}
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
