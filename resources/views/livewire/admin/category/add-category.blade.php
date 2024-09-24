<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow">Home</a>
                <span></span> admin
                <span></span> add new category 
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
                                    Add New Category 
                                </div>
                                <div class="col-md-6">
                                    <a class="btn btn-success float-end" href="{{route('categories')}}">All Category</a>
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="card-boody">
                            @if (session()->has('message'))  
                                <div class="alert alert-success">  
                                    {{ session('message') }}  
                                </div>  
                            @endif  
                            <form wire:submit.prevent="addCategory">
                                <div class="mb-3 mt-3">
                                    <label for="name" class="form-label pl-20">name</label>
                                    <input type="text" name="name" class="form-control" wire:model='name' placeholder="enter category name">
                                    @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="slug" class="form-label pl-20">slug</label>
                                    <input type="text" name="slug" class="form-control" wire:model='slug' placeholder="enter category slug">
                                    @error('slug') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group mt-1">
                                        <input type="checkbox" wire:model='is_active' value="1"
                                            name="is_active"
                                            id="switcheryColor4"
                                            class="switchery" data-color="success"/>
                                        <label for="switcheryColor4"
                                            class="card-title ml-1">status  
                                        </label>

                                        @error("is_active")
                                        <span class="text-danger">{{$message }}</span>
                                        @enderror
                                    </div>
                                </div> 
                                
                                <div class="row hidden" id="cats_list" >
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="projectinput1"> chose main category
                                            </label>
                                            <select name="parent_id" wire:model='parent_id' style="width: 200px" class="select2 form-control">
                                                <optgroup label="chose main category">
                                                    @if($categories && $categories -> count() > 0)
                                                        @foreach($categories as $category)
                                                            <option
                                                                value="{{$category -> id }}">
                                                                
                                                                @if ($category->parent_id == null)
                                                                    {{'-'.$category -> name}}

                                                                @else
                                                                    {{'--'.$category -> name}}
                                                                @endif
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </optgroup>
                                            </select>
                                            @error('parent_id')
                                            <span class="text-danger"> {{$message}}</span>
                                            @enderror

                                        </div>
                                    </div>
                                </div>


                                    <div class="col-md-3">
                                        <div class="form-group">
                                            
                                            <input type="radio" wire:model="type" id="name"
                                                class="switchery _radio"   
                                                   placeholder="  "
                                                   value="1"
                                                   name="type"
                                                   checked
                                                   data-color="success">
                                                   <label for="projectinput1"> main category
                                                </label>
                                            @error("type")
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            
                                            <input type="radio" wire:model="type" id="name"
                                                class="switchery _radio"
                                                   placeholder="  "
                                                   value="2"
                                                   name="type"
                                                   data-color="success">
                                                   <label for="projectinput1"> sub category
                                                </label>
                                            @error("type")
                                            <span class="text-danger">{{$message}}</span>
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
        $("._radio").click(function(){
            if (this.checked && this.value == '2') {  // 1 if main cat - 2 if sub cat
                $('#cats_list').removeClass('hidden');
            }else{
                $('#cats_list').addClass('hidden');
            }
        });
    });
</script>
