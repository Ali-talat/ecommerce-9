<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow">CATEGORIES</a>
                
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
                
            <div class="row">
                <div class="col-m-12">

                    <div class="card">
                        <div class="card-header">
                            All Categories
                        </div>
                        <div class="card-boody">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>name</th>
                                        <th>slug</th>
                                        <th>action</th>
                                    </tr>
                                    @foreach ($categories as $category)
                                        <tbody>
                                            
                                            <td>{{$category->id}}</td>
                                            <td>{{$category->name}}</td>
                                            <td>{{$category->slug}}</td>
                                            <td>
                                                <a class="btn btn-brimery" href="{{route('edit.category',$category->id)}}">edit</a>
                                                <button class="btn btn-brimery" wire:click="delete('{{$category->slug}}')" type="button"> delete</button>  
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
        {{$categories->links()}}
                            @if (session()->has('message'))  
                                <div class="alert alert-success">  
                                    {{ session('message') }}  
                                </div>  
                            @endif 
    </section>
</main>
