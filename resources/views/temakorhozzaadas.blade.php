<x-app-layout>

    <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{url('store-formtemakor')}}" enctype="multipart/form-data">
        @csrf
         <div class="form-group">
           <label for="nev">Témakör</label>
           <input type="text" id="nev" name="nev" class="form-control" required="">
         </div>

         <select name="tantargy">
            @foreach($categories as $category)
                <option value = "{{$category->nev}}">
                    {{$category->nev}}
                </option>
            @endforeach
        </select>
         <label for="image">Image:</label>
        <input type="file" name="image" id="image">
         <button type="submit" class="btn btn-primary">Submit</button>
       </form>
    </x-app-layout>