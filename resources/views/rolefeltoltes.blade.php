<x-app-layout>
    <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{url('rolemod')}}">
        @csrf
        
        
         <div class="form-group">
           <label for="model_id">model_id</label>
           <input type="number" id="model_id" name="model_id" class="model_id" required=""></textarea>
         </div>
         <button type="submit" class="btn btn-primary">Submit</button>
       </form>
    
      </x-app-layout>