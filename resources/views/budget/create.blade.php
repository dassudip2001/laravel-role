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
          @if(session('success'))
              <div class="alert alert-success">
                  {{session('success')}}
              </div>
          @endif
        <form action=" " method="POST">
          @csrf
            <div class="card-title mt-2">
                <h6>Budget Form<span class="required" style="color: red;">*</span></h6>
            </div>
            <hr>
            <div class="card-body">
            <div class="row">
               <div class="col">
                 <!-- Budget Name -->
            <div class="mb-6">
               <label for="budget_title">Budget Title<span class="required" style="color: red;">*</span></label>
               <input type="text" class="form-control form-control-sm" name="budget_title"  id="budget_name" aria-describedby="budget_name" placeholder="Enter Department Name">
             </div>
               </div>
               <div class="col">
                  <!-- Budget code -->
                    <div class="mb-6">
                      <label for="budget_type">Budget Type<span class="required" style="color: red;">*</span></label>
                      <input type="text" class="form-control form-control-sm" name="budget_type"  id="budget_type" aria-describedby="budget_type" placeholder="Enter Department Code">
                    </div>
                   </div>
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
            <h6>Budget Details</h6>
            <hr>
        </div>

        <!-- <div class="card-body"> -->
         <!-- output -->
         <table class="table">
           <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Budget Type</th>
              <th scope="col">Budget Title</th>
              @role('admin')
              <th scope="col">Action</th>
              @endrole
            </tr>
           </thead>
         <tbody>
            @foreach ($budget as $item)
           <tr>
             <td>{{$item->id}}</td>
             <td> {{$item->budget_type}}</td>
             <td> {{$item->budget_title}}</td>
             <th>
             @role('admin')
             <a href=" {{ url('/budget/edit',$item->id) }} ">
             <i class="fa-regular fa-pen-to-square"></i>
            </a>
            <a href=" {{ url('/budget/delete',$item->id) }} ">
             <i class="fa-solid fa-trash" style=""></i>
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
