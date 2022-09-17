<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
           {{ __('Dashboard') }}
        </h2>
    </x-slot>
  <div class="container  mt-4 ">
   <div class="row">
    <div class="col">
      <div class="card">
        <!-- success massage -->
      @if(session('success'))
              <div class="alert alert-success">
                  {{session('success')}}
              </div>
       @endif
        <div class="card-title mt-2 mx-2">
          <div class="h5">Create New Project</div>
          <hr>
        </div>
        <div class="card-body">
          <!-- form Start -->
        <form action="" method="POST" >
          @csrf
        <div class="row g-2">
           <div class="col-md">
             <div >
              <label for="name">Project No<span class="required" style="color: red;">*</span></label>
               <input type="text" class="form-control form-control-sm" name="project_no" id="project_no" aria-describedby="project_no" placeholder="Enter Project No">
            </div>
           </div>
          <div class="col-md">
          <div class="mb-6">
           <label for="project_title">Project Title<span class="required" style="color: red;">*</span></label>
             <input type="text" class="form-control form-control-sm" name="project_title" id="project_title" aria-describedby="project_title" placeholder="Enter Project Title">
             </div>
             </div>
        </div>

        <div class="row">
    <div class="col">
    <div class="mb-6">
        <label for="funding_agency">Funding Agency<span class="required" style="color: red;">*</span></label>
        <br>
        <select name="funding_agency_id" class="form-select form-select-sm" aria-label=".form-select-sm example">
          <option selected hidden>Select</option>
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
        <div class="row">
          <div class="col">
            <select name="create_user_id" class="form-select form-select-sm" aria-label=".form-select-sm example">
              <option selected hidden>Select</option>
            @foreach ($data2 as $funding)
             <option value="{{$funding->id}}">{{$funding->name}} - {{$funding->dept_name}}
                </option>
                @endforeach
        </select>
      </div>
      </div>

      </div>
    </div>

  </div>

      <div class="row g-2">
           <div class="col-md">
             <div >
              <label for="project_scheme">Project Scheme<span class="required" style="color: red;">*</span></label>
               <input type="text" class="form-control form-control-sm" name="project_scheme" id="project_scheme" aria-describedby="project_scheme" placeholder="Enter Project Scheme">
            </div>
           </div>
          <div class="col-md">
          <div class="mb-6">
              <label for="project_duration">Project Duration<span class="required" style="color: red;">*</span></label>
              <input type="text" class="form-control form-control-sm" name="project_duration" id="project_duration" aria-describedby="project_duration" placeholder="Enter Project Duration">
             </div>
             </div>
             <div class="col-md">
          <div class="mb-6">
              <label for="project_cost">Project Cost<span class="required" style="color: red;">*</span></label>
              <input type="number" class="form-control form-control-sm" name="project_total_cost" id="project_cost" aria-describedby="project_cost" placeholder="Enter Project Cost">
             </div>
             </div>
        </div>

        <div class="card-title overflow-auto">
          <hr>
          <h6>Budget Details </h6>
          <hr>
        </div>
        <table class="table table-bordered overflow-auto">
          <thead>
            <tr>
              <th>Budget Title</th>
              <th>Amount</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody">
            <tr>
                <td>
                    <select name="budget_id" class="form-select form-select-sm"  id="clear1" aria-label=".form-select-sm example">
                        <option selected hidden>Select </option>
                        @foreach($budget as $bgt)
                            <option value="{{$bgt->id}}">{{$bgt->budget_title}}
                            </option>
                    @endforeach
                </td>

                <td><input type="number" class="form-control form-control-sm" name="budget_amount[]" id="clear" placeholder="Enter Budget Amount" ></td>
                <td>
                    <button type="button" id="add_btn" >
                        <i class="fa-regular fa-square-plus">

                        </i>
                    </button>
                    <button onclick="document.getElementById('clear1').value = null; document.getElementById('clear').value = null; return false;">
                        <i class="fa-solid fa-brush"></i>
                    </button>
                </td>
            </tr>
          </tbody>

        </table>
        <div class="row">
           <div class="col">
      <!-- add options -->
           </div>
           <div class="col">
      <!-- add options -->
           </div>
           <div class="col">
           <div class="mb-6">
              <label for="total_amount">Total Amount</label>
              <input type="number" class="form-control form-control" name="" id="total_amount" aria-describedby="total_amount" placeholder="0.00">
             </div>

           </div>
         </div>
         <hr>
       <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create Project</button>
    </form>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
        <!-- card Head  -->
        <div class="card-title mx-2 mt-2">
        <h6>Edit Project Details</h6>
        <hr>
        </div>
        <!-- card Body -->
        <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col"> Project No</th>
              <th scope="col">Project Code</th>
              <th scope="col">Project cost</th>
              @role('admin')
              <th scope="col">Action</th>
              @endrole
            </tr>
           </thead>
         <tbody>
           
           <tr>
             <td></td>
             <td></td>
             <td> </td>
             <td></td>
             <th>
              @role('admin')
             <a href=" {{ url('/createuser/edit') }} ">
             <i class="fa-regular fa-pen-to-square"></i>
            </a>
            <a href=" {{ url('/createuser/delete') }} ">
            <button type="submit"><i class="fa-solid fa-trash"></i></button>
             @endrole
             </th>
             <th>
                </a>
            </th>
          </tr>
          
        </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>

</x-admin-layout>
