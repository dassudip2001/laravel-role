<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
           {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="card col-6">
  <div class="card-body">
    <form>
        <div class="row g-2">
           <div class="col-md">
             <div >
              <label for="name">Project No<span class="required" style="color: red;">*</span></label>
               <input type="text" class="form-control" name="" id="project_no" aria-describedby="project_no" placeholder="Enter Project No"> 
            </div>
           </div>
          <div class="col-md">
          <div class="mb-6">
           <label for="project_title">Project Title<span class="required" style="color: red;">*</span></label>
             <input type="text" class="form-control" name="" id="project_title" aria-describedby="project_no" placeholder="Enter Project No">   
             </div>
             </div>
        </div>
      
      
      <div class="mb-6">
        <label for="funding_agency">Funding Agency<span class="required" style="color: red;">*</span></label>
        <br>
        <select name="department_id">
            @foreach ($data as $funding)
             <option value="{{$funding->id}}">{{$funding->agency_name}}
                </option>
            @endforeach
        </select>   
      </div>
      <div class="row g-2">
           <div class="col-md">
             <div >
              <label for="name">Project Scheme<span class="required" style="color: red;">*</span></label>
               <input type="text" class="form-control" name="" id="project_scheme" aria-describedby="project_no" placeholder="Enter Project No">
            </div>
           </div>
          <div class="col-md">
          <div class="mb-6">
           <label for="name">Project Duration<span class="required" style="color: red;">*</span></label>
         <input type="text" class="form-control" name="" id="project_duration" aria-describedby="project_no" placeholder="Enter Project No">   
             </div>
             </div>
        </div>
     
      <div class="mb-6">
        <label for="name">Principle Investigator<span class="required" style="color: red;">*</span></label>
        <br>
        <select name="department_id">
            @foreach ($data as $funding)
             <option value="{{$funding->id}}">{{$funding->agency_name}}
                </option>
            @endforeach
        </select> 
        <select name="department_id">
            @foreach ($data as $funding)
             <option value="{{$funding->id}}">{{$funding->agency_name}}
                </option>
            @endforeach
        </select> 
      </div>
  
       <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>

</x-admin-layout>

