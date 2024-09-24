<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow">PRODUCTS</a>
                
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
                
            <div class="row">
                <div class="col-m-12">

                    <div class="card">
                        <div class="card-header">
                            All PRODUCTS
                        </div>
                        <div class="card-boody">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>name</th>
                                        <th>price</th>
                                        <th>in stock</th>
                                        <th>mange stock</th>
                                        <th>category</th>
                                        <th>action</th>
                                    </tr>
                                    @foreach ($products as $product)
                                        <tbody>
                                            
                                            <td>{{$product->id}}</td>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->price}}</td>
                                            <td>{{$product->in_stock}}</td>
                                            <td>{{$product->mange_stock}}</td>
                                            <td>{{$product->categories->pluck('name')->implode(', ')}}</td>
                                            <td>
                                                <a class="btn btn-brimery" href="{{route('edit.category',$product->id)}}">edit</a>
                                                <button class="btn btn-brimery" wire:click="delete('{{$product->slug}}')" type="button"> delete</button>  
                                            </td>
                                        </tbody>
                                    @endforeach
                                    
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{$products->links()}}
                            @if (session()->has('message'))  
                                <div class="alert alert-success">  
                                    {{ session('message') }}  
                                </div>  
                            @endif 
    </section>
</main>
