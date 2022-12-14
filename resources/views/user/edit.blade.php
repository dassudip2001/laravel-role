<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>
    <div class="container mt-4">
       <div class="card">
        <!-- card Title -->
        <div class="card-title m-2">
            <h6>Create User </h6>
            <hr>
        </div>
        <div class="card-body">
        <form action=" " method="POST">
         @csrf
         @method('PUT')
         <div class="row">
            <div class="col">
              <!-- Faculty Title  -->
              <div class="mb-6">
                <label for="faculty_title">Faculty Title</label>
                <input type="text" class="form-control form-control-sm" name="fac_title"  value="{{$createUser->faculty_id}}"  id="faculty_title" aria-describedby="faculty_title" placeholder="Enter  Faculty Title">
              </div>
            </div>
            <div class="col">
            <!-- Faculty Name -->
            <div class="mb-6">
                <label for="faculty_name">Faculty Name</label>
                <input type="text" class="form-control form-control-sm" name="name" value="{{$createUser?? $user->name}}" id="faculty_name" aria-describedby="faculty_name" placeholder="Enter  Faculty Name">
              </div>
            </div>
            <div class="col">
              <!-- Faculty Code -->
              <div class="mb-6">
                <label for="faculty_code">Faculty Code</label>
                <input type="text" class="form-control form-control-sm" name="fac_code" value="{{$createUser?? $faculty->fac_title}}" id="faculty_code" aria-describedby="faculty_code" placeholder="Enter  Faculty Code" readonly>
              </div>
            </div>
         </div>
         <div class="row">
            <div class="col">
                <!-- Faculty Email -->
                <div class="mb-6">
                <label for="faculty_email">Faculty Email</label>
                <input type="email" class="form-control form-control-sm" name="email" value="{{$createUser?? $faculty->fac_title}}"  id="faculty_email" aria-describedby="faculty_email" placeholder="Enter  Faculty Email">
              </div>
            </div>
            <div class="col">
                 <!-- Faculty Department -->
                 <div class="mb-6">
        <label for="funding_agency">Faculty Department <span class="required" style="color: red;">*</span></label>
        <br>
        <select name="department_id" class="form-select form-select-sm" aria-label=".form-select-sm example">
          <option selected hidden>Select Faculty Department </option>

{{--            <option value="{{$department->id}}">{{$department->dept_name}}--}}

        </select>
      </div>
            </div>
         </div>
         <div class="row">
            <div class="col">
                <!--Faculty Designation  -->
                <div class="mb-6">
                <label for="faculty_designation">Faculty Designation</label>
                <input type="text" class="form-control form-control-sm" name="fac_designtion" value="{{$createUser?? $faculty->fac_title}}" id="faculty_designation" aria-describedby="faculty_designation" placeholder="Enter  Faculty Designation">
              </div>
            </div>
            <div class="col">
               <!-- Faculty Join Date -->
               <div class="mb-6">
                <label for="faculty_join">Faculty Join</label>
                <input type="text" class="form-control form-control-sm" name="fac_join" value="{{$createUser?? $faculty->fac_title}}"  id="faculty_join" aria-describedby="faculty_join" placeholder="Enter  Faculty Join"readonly>
              </div>
            </div>
         </div>
         <div class="row">
            <div class="col">
                <!-- Faculty Retirement Date -->
                <div class="mb-6">
                <label for="faculty_retirement">Faculty Retirement</label>
                <input type="text" class="form-control form-control-sm datepicker" name="fac_retirement" value="{{$createUser?? $faculty->fac_title}}"  id="datepicker" aria-describedby="faculty_retirement" placeholder="Enter  Faculty Retirement"readonly>
              </div>
            </div>
            <div class="col">
                <!-- Faculty Phone -->
                <div class="mb-6">
                <label for="faculty_phone">Faculty Phone</label>
                <input type="text" class="form-control form-control-sm" name="fac_phone" value="{{$createUser?? $faculty->fac_title}}" id="faculty_phone" aria-describedby="faculty_phone" placeholder="Enter  Faculty Phone Number">
              </div>
            </div>
         </div>
         <div class="row">
            <div class="col">
                <!-- Faculty Status -->
                <div class="mb-6">
                <label for="faculty_status">Faculty Status</label>
                <input type="text" class="form-control form-control-sm" name="fac_status" value="{{$createUser?? $faculty->fac_title}}" id="faculty_status" aria-describedby="faculty_status" placeholder="Enter  Faculty Status"readonly>
              </div>
            </div>
            <div class="col">
                <!-- Faculty Description -->
               <div class="mb-6">
                <label for="faculty_description">Faculty Description</label>
                <input type="text" class="form-control form-control-sm" name="fac_description" value="{{$createUser?? $faculty->fac_title}}" id="faculty_description" aria-describedby="faculty_description" placeholder="Faculty Description">
              </div>
            </div>
         </div>
         <div class="row">
            <div class="col">
                <!-- password -->
                <div class="mb-6">
                <label for="password">Faculty Password</label>
                <input type="password" class="form-control form-control-sm" name="password"  id="password" aria-describedby="password" placeholder=" Password like Admin@123">
              </div>
            </div>
            <div class="col">
                <!-- confirm password -->
                <div class="mb-6">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" class="form-control form-control-sm" name="password_confirmation"  id="confirm_password" aria-describedby="confirm_password" placeholder="Confirm Password">
              </div>
            </div>
         </div>
         <!-- Button -->
         <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded float-end">Update User</button>
        </form>
        </div>
    </div>
</div>
    </div>


</x-admin-layout>
