<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow">WISHLISTS</a>
                
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
                
            <div class="row">
                <div class="col-m-12">

                    <div class="card">
                        <div class="card-header">
                             Wishlists
                        </div>

                        
                        <div class="card-boody">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>user</th>
                                        <th>product</th>
                                        <th>action</th>
                                    </tr>
                                    {{-- @if ($wishlist)
                                        
                                    @foreach (Auth::user()->wishlists as $wishlist)
                                        <tbody>
                                            <td>{{$wishlist->id}}</td>
                                            <td>{{Auth::user()->name}}</td>
                                            <td>{{$wishlist->name}}</td>
                                            <td>
                                                <button class="btn btn-brimery" wire:click="delete('{{$wishlist->id}}')" type="button"> delete</button>  
                                            </td>
                                        </tbody>
                                    @endforeach
                                    @endif --}}

                                    
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                            @if (session()->has('message'))  
                                <div class="alert alert-success">  
                                    {{ session('message') }}  
                                </div>  
                            @endif 
    </section>
</main>
