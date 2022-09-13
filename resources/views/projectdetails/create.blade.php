<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
           {{ __('Dashboard') }}
        </h2>
    </x-slot>
  <div class="container m-2 ">
   <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
        <form>
        <div class="row g-2">
           <div class="col-md">
             <div >
              <label for="name">Project No<span class="required" style="color: red;">*</span></label>
               <input type="text" class="form-control form-control-sm" name="" id="project_no" aria-describedby="project_no" placeholder="Enter Project No"> 
            </div>
           </div>
          <div class="col-md">
          <div class="mb-6">
           <label for="project_title">Project Title<span class="required" style="color: red;">*</span></label>
             <input type="text" class="form-control form-control-sm" name="" id="project_title" aria-describedby="project_title" placeholder="Enter Project Title">   
             </div>
             </div>
        </div>
        <div class="row">
    <div class="col">
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
    </div>
    <div class="col">
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
    </div>
    
  </div>
      <div class="row g-2">
           <div class="col-md">
             <div >
              <label for="name">Project Scheme<span class="required" style="color: red;">*</span></label>
               <input type="text" class="form-control form-control-sm" name="" id="project_scheme" aria-describedby="project_scheme" placeholder="Enter Project Scheme">
            </div>
           </div>
          <div class="col-md">
          <div class="mb-6">
           <label for="name">Project Duration<span class="required" style="color: red;">*</span></label>
         <input type="text" class="form-control form-control-sm" name="" id="project_duration" aria-describedby="project_duration" placeholder="Enter Project Duration">   
             </div>
             </div>
        </div>
        <hr>
        <div class="card-title">
          <h4>Budget Details </h4>
          <hr>
        </div>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Budget Title</th>
              <th>Amount</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><input type="text" class="form-control form-control-sm" name="budget_title[]" placeholder="Enter Budget Title" ></td>
              <td><input type="number" class="form-control form-control-sm" name="budget_amount[]" placeholder="Enter Budget Amount" ></td>
              <td><button type="button" class="btn btn-primary" id="add_btn" ><i class="fa-solid fa-plus"></i></button></td>
            </tr>
          </tbody>

        </table>
       <button type="submit" class="btn btn-primary">Submit</button>
    </form>
        </div>
      </div>
    </div>
    <div class="col">
    <div class="card">
        <div class="card-body">
          
        </div>
      </div>
    </div>
  </div>
  </div>

</x-admin-layout>

