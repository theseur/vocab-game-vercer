<x-app-layout>

    <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{url('store-formdiakcsv')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nev">Osztály</label>
            <input type="text" id="osztaly" name="osztaly" class="form-control" required="">
          </div>

        <input type="file" id="upload" name="myfile">
         <button type="submit" class="btn btn-primary">Submit</button>
       </form>
    </x-app-layout>