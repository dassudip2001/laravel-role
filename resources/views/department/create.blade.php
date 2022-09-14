<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

<div class="container text-center mt-4">
  <div class="row">
 
    <div class="col">
    @role('admin')
      <div class="card">
        <form action="/department" method="POST">
          @csrf
            <div class="card-title mt-2">
                <h6>Department Form<span class="required" style="color: red;">*</span></h6>
            </div>
            <hr>
            <div class="card-body">
            <div class="row">
               <div class="col">
                 <!-- Department Name -->
            <div class="mb-6">
               <label for="department_name">Department Name<span class="required" style="color: red;">*</span></label>
               <input type="text" class="form-control form-control-sm" name="dept_name"  id="department_name" aria-describedby="department_name" placeholder="Enter Department Name">   
             </div>
               </div>
               <div class="col">
                  <!-- Department code -->
                    <div class="mb-6">
                      <label for="department_code">Department Code<span class="required" style="color: red;">*</span></label>
                      <input type="text" class="form-control form-control-sm" name="dept_code"  id="department_code" aria-describedby="department_code" placeholder="Enter Department Code">   
                    </div>
                   </div>
                </div>
            
             
             <!-- Department Details -->
             <div class="mb-6">
               <label for="department_details">Department Details</label>
               <input type="text" class="form-control form-control" name="description"  id="department_details" aria-describedby="department_details" placeholder="Enter Department Description">   
             </div>
             <!-- Button -->
             
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
            
        </form>               
        </div>
        @endrole
      </div>
    </div>
    
    <div class="col">
      <div class="card">
        <div class="card-title mt-2">
            <h6>Department Details</h6>
            <hr>
        </div>
        
        <!-- <div class="card-body"> -->
         <!-- output -->
         <table class="table">
           <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Department Name</th>
              <th scope="col">Code</th>
              <th scope="col">Description</th>
              @role('admin')
              <th scope="col">Action</th>
              @endrole
            </tr>
           </thead>
         <tbody>
            @foreach ($department as $item)
           <tr>
             
             <td>{{$item->id}}</td>
                        
             <td> {{$item->dept_name}}</td>
             <td> {{$item->dept_code}}</td>
             <td> {{$item->description}}</td>
             <th> 
              @role('admin')
             <a href=" {{ url('/department/edit',$item->id) }} ">
             <i class="fa-regular fa-pen-to-square"></i>
            </a>
            

            <a href=" {{ url('/department/delete',$item->id) }} ">
            <button type="submit"><i class="fa-solid fa-trash"></i></button>
             @endrole
             </th>
             <th> 
                </a>
            </th>
          </tr>
          @endforeach
        </tbody>
       </table>
        <!-- </div> -->
      </div>
    </div>
   </div>
</div>
</x-admin-layout>
