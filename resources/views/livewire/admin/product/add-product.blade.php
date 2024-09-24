<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow">Home</a>
                <span></span> admin
                <span></span> add new product 
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
                
            <div class="row">
                <div class="col-m-12">

                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    Add New product 
                                </div>
                                <div class="col-md-6">
                                    <a class="btn btn-success float-end" href="{{route('products')}}">All Category</a>
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="card-boody">
                            @if (session()->has('message'))  
                                <div class="alert alert-success">  
                                    {{ session('message') }}  
                                </div>  
                            @endif  
                            <form wire:submit.prevent="addProduct">
                                <div class="mb-3 mt-3">
                                    <label for="name" class="form-label pl-20">name</label>
                                    <input type="text" name="name" class="form-control" wire:model='name' placeholder="enter product name">
                                    @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-3 mt-3">
                                    <textarea name="description" wire:model='description' id="" cols="30" rows="10"></textarea>
                                    @error('description') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-3 mt-3">
                                    <textarea name="short_description" wire:model='short_description' id="" cols="30" rows="10"></textarea>
                                    @error('short_description') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="slug" class="form-label pl-20">slug</label>
                                    <input type="text" name="slug" class="form-control" wire:model='slug' placeholder="enter product slug">
                                    @error('slug') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="price" class="form-label pl-20">price</label>
                                    <input type="text" name="price" class="form-control" wire:model='price' placeholder="enter product price">
                                    @error('price') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="special_price" class="form-label pl-20">special_price</label>
                                    <input type="text" name="special_price" class="form-control" wire:model='special_price' placeholder="enter product special_price">
                                    @error('special_price') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="special_price_start" class="form-label pl-20">special_price_start</label>
                                    <input type="date" name="special_price_start" class="form-control" wire:model='special_price_start' placeholder="enter product special_price_start">
                                    @error('special_price_start') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="special_price_end" class="form-label pl-20">special_price_end</label>
                                    <input type="date" name="special_price_end" class="form-control" wire:model='special_price_end' placeholder="enter product special_price_end">
                                    @error('special_price_end') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-3 mt-3 qtyDiv hidden">
                                    <label for="qty" class="form-label pl-20">qty</label>
                                    <input type="text" name="qty" class="form-control" wire:model='qty' placeholder="enter product qty">
                                    @error('qty') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-3 mt-3 ">
                                    <label for="sku" class="form-label pl-20">sku</label>
                                    <input type="text" name="sku" class="form-control" wire:model='sku' placeholder="enter product sku">
                                    @error('sku') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="mb-3 mt-3 ">
                                    <label for="manage_stock" class="form-label pl-20">manage stock</label>
                                    <select name="manage_stock"  wire:model='manage_stock' class="select2 form-control" id="manageStock">
                                        <optgroup label="من فضلك أختر النوع ">
                                            <option
                                                
                                            
                                            value="1">اتاحة التتبع</option>
                                            <option
                                              
                                            value="0" >عدم اتاحه التتبع</option>
                                        </optgroup>
                                    </select>
                                    @error('manage_stock')
                                    <span class="text-danger"> {{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="in_stock" class="form-label pl-20">in_stock</label>
                                    <select name="in_stock"  wire:model='in_stock' class="select2 form-control" id="manageStock">
                                        <optgroup label="من فضلك أختر النوع ">
                                            <option
                                               
                                            value="1"> متاح </option>
                                            <option
                                                
                                            value="0" >غير متاح</option>
                                        </optgroup>
                                    </select>
                                    @error('in_stock')
                                    <span class="text-danger"> {{$message}}</span>
                                    @enderror
                                </div>
                                

                                
                                
                                
                                <div class="row"  >
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="projectinput1"> chose main category</label>
                                            <select name="category" wire:model='category' style="width: 200px" class="select2 form-control">
                                                <optgroup label="chose main category">
                                                    @if($categories && $categories -> count() > 0)
                                                        @foreach($categories as $category)
                                                            <option
                                                                value="{{$category -> id }}" >
                                                                {{$category ->name }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </optgroup>
                                            </select>
                                            @error('category')
                                            <span class="text-danger"> {{$message}}</span>
                                            @enderror

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mt-1">
                                        <input type="checkbox" wire:model='active' value="1"
                                            name="active"
                                            id="switcheryColor4"
                                            class="switchery" data-color="success"/>
                                        <label for="switcheryColor4"
                                            class="card-title ml-1">status  
                                        </label>

                                        @error("active")
                                        <span class="text-danger">{{$message }}</span>
                                        @enderror
                                    </div>
                                </div> 


                                    
                                    
                                <button type="submit" class="btn btn-primary float-end">Submit</button>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>


    

<script>
    
    $(document).ready(function(){
        $("#manageStock").change(function(){
            if (this.value == '1') {  // 1 if main cat - 2 if sub cat
                $('.qtyDiv').removeClass('hidden');
            }else{
                $('.qtyDiv').addClass('hidden');
            }
        });
    });
</script>


