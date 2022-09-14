<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="container text-center mt-4">
  <div class="row">
    <div class="col">
      <div class="card">
        <form action=" " method="POST">
          @csrf
            <div class="card-title mt-2">
                <h6>Funding Agency Form<span class="required" style="color: red;">*</span></h6>
            </div>
            <hr>
            <div class="card-body">
             <!-- funding Name -->
             <div class="mb-6">
               <label for="funding_agency">Funding Agency Name<span class="required" style="color: red;">*</span></label>
               <input type="text" class="form-control form-control" name="agency_name"  id="funding_agency" aria-describedby="funding_agency" placeholder="Enter Funding Agency Name">   
             </div>
             <!-- Button -->
             
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>

        </form>                
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
        <div class="card-title mt-2">
            <h6>Funding Agency Details</h6>
            <hr>
        </div>
        
        <!-- <div class="card-body"> -->
         <!-- output -->
         <table class="table">
           <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Funding Agency Name</th>
              <th scope="col">Action</th>
            </tr>
           </thead>
         <tbody>
           @foreach ($agency as $item)
           <tr>            
             <td>{{$item->id}}</td>                       
             <td> {{$item->agency_name}}</td>
             <th>             
             <a href=" {{ url('/funding/edit',$item->id) }} ">
             <i class="fa-regular fa-pen-to-square"></i>
            </a>
            <a href=" {{ url('/funding/delete',$item->id) }} ">
             <i class="fa-solid fa-trash" style=""></i>
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
