<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
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
                                        <p class="font-medium text-lg">Funding</p>
                                        <p>Please fill out all the fields.</p>
                                    </div>

                                    <div class="lg:col-span-2">
                                        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                                            <div class="md:col-span-3">
                                                <label for="name"> Funding Agency Name </label>
                                                <input type="text" name="agency_name" id="name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="" />
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
            <div>
           
                {{--  --}}
                <div class="min-h-screen py-12 bg-gray-100 flex ">
                    <div class="container max-w-screen-lg mx-auto">

{{-- 
                        <form action="/Funding" method="POST">
                            @csrf --}}
                            <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                                <div class="grid gap-1 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                                    
                                
                                <table class="min-w-max w-full">
                                    <thead>
                                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                        <th class="py-3 px-6 text-left">ID</th>
                                        <th class="py-3 px-6 text-left">Funding Agency Name</th>
                                       
                                        <th class="py-3 px-6 text-center">Actions</th>
                                    </tr>
                                    </thead>
                                    
                                    <tbody>
                    @foreach ($agency as $item)
                        
                    
                    <tr>
                        <td>
                          {{$item->id}}</td>
                        
                        <td> {{$item->agency_name}}</td>
                      
                        
                        <td>
                            @role('admin')
                            <th class="py-3 px-6 text-left">
                                <a href=" {{ url('/funding/edit',$item->id) }} "><div class="inline-flex items-end">
                                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                                </div></a>
                                
                            </th>
                             
                            <th class="py-3 px-6 text-left">
                                <a href="{{ url('/funding/delete',$item->id) }} "><div class="inline-flex items-end">
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                                </div></a>
                                
                            </th>
                            @endrole
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
                            
                                   
        </div>
    </div>


                        {{-- </form> --}}
                    </div>
                </div>3</div>

            </div>
        </div>
    </div>
    <!-- component -->


</x-admin-layout>
