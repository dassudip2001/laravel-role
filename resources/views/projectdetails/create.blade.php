<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{--            {{ __('Dashboard') }}--}}
        </h2>
    </x-slot>
    @role('admin')
    <div class="container mx-auto">
        <div class="grid grid-cols-2 gap-2">

            <div>
                <div class="min-h-screen py-12 bg-gray-100 flex ">
                    <div class="container max-w-screen-lg mx-auto">


                        <form action=" " method="POST">
                            @csrf
                            <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                                <div class="grid gap-1 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                                    <div class="text-gray-600">
                                        <p class="font-medium text-lg">Project</p>
                                        <p>Please fill out all the fields.</p>
                                    </div>

                                    <div class="lg:col-span-2">
                                        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                                            <div class="md:col-span-3">
                                                <label for="project_no"> Project NO </label>
                                                <input type="text" name="project_no" id="project_no" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="" />
                                            </div>
                                            <div class="md:col-span-6">
                                                <label for="fac_code">Funding Agency</label>
                                                <br>
                                                <select>
                                                     @foreach ($data as $agency)
                                                <option value="{{$agency->id}}">{{$agency->agency_name}}
                                                </option>

                                                @endforeach
                                              </select>

                                            </div>                                            
                                            <!-- principle investigator -->
                                            <div class="md:col-span-6">
                                                <label for="fac_code">Principle investigator</label>
                                                <br>
                                             <select >
                                                @foreach ($data2 as $agency)
                                                <option value="{{$agency->id}}">{{$agency->user_id}}
                                                </option>
                                                @endforeach
                                              </select>
                                              <select>
                                                @foreach ($data2 as $agency)
                                                <option value="{{$agency->id}}">{{$agency->department_id}}
                                                </option>
                                                @endforeach
                                              </select>

                                            </div> 



                                            <div class="md:col-span-6">
                                                <label for="project_title">Project Title</label>
                                                <input type="text" name="project_title" id="project_title" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
                                            </div>


                                            <div class="md:col-span-6">
                                                <label for="project_scheme">Project Scheme</label>
                                                <input type="text" name="project_scheme" id="project_scheme" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
                                            </div>

                                            <div class="md:col-span-6">
                                                <label for="project_duration">Project Duration</label>
                                                <input type="text" name="project_duration" id="project_duration" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
                                            </div>

                                            <div class="md:col-span-6">
                                                <label for="project_total_cost">Project Cost</label>
                                                <input type="text" name="project_total_cost" id="project_total_cost" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
                                            </div>



                                            <div class="md:col-span-6 text-right">
                                                <div class="inline-flex items-end">
                                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>3</div> 
                @endrole
            


</x-admin-layout>
