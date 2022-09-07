<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

                 <div class="min-h-screen py-12 bg-gray-100 flex ">
                    <div class="container max-w-screen-lg mx-auto">


                        <form action=" " method="POST">
                            @csrf
                            @method('PUT')
                            <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                                <div class="grid gap-1 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                                    <div class="text-gray-600">
                                        <p class="font-medium text-lg">Faculty</p>
                                        <p>Please fill out all the fields.</p>
                                    </div>

                                    <div class="lg:col-span-2">
                                        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                                            <div class="md:col-span-3">
                                                <label for="fac_title"> Faculty Title </label>
                                                <input type="text" name="fac_title" id="fac_title" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{$faculty->fac_title}}" placeholder="" />
                                            </div>

                                            <div class="md:col-span-3">
                                                <label for="fac_name">Faculty Name</label>
                                                <input type="text" name="fac_name" id="fac_name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{$faculty->fac_title}}" placeholder="" />
                                            </div>



                                            <div class="md:col-span-6">
                                                <label for="fac_code">Faculty Code</label>
                                                <input type="text" name="fac_code" id="fac_code" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{$faculty->fac_title}}" />
                                            </div>


                                            <div class="md:col-span-6">
                                                <label for="fac_designtion">Faculty Designtion</label>
                                                <input type="text" name="fac_designtion" id="fac_designtion" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{$faculty->fac_title}}" />
                                            </div>

                                            <div class="md:col-span-6">
                                                <label for="fac_join">Faculty Join</label>
                                                <input type="text" name="fac_join" id="fac_join" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{$faculty->fac_join}}" />
                                            </div>

                                            <div class="md:col-span-6">
                                                <label for="fac_retirement">Faculty Retirement</label>
                                                <input type="text" name="fac_retirement" id="fac_retirement" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{$faculty->fac_retirement}}" />
                                            </div>

                                            <div class="md:col-span-6">
                                                <label for="fac_phone">Faculty Phone</label>
                                                <input type="number" name="fac_phone" id="fac_phone" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{$faculty->fac_phone}}" />
                                            </div>

                                            <div class="md:col-span-6">
                                                <label for="fac_status">Faculty Status</label>
                                                <input type="text" name="fac_status" id="fac_status" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{$faculty->fac_status}}" />
                                            </div>

                                            <div class="md:col-span-6">
                                                <label for="fac_description">Faculty Description</label>
                                                <input type="text" name="fac_description" id="fac_description" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{$faculty->fac_description}}" />
                                            </div>

                                            <div class="md:col-span-6 text-right">
                                                <div class="inline-flex items-end">
                                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>3</div>
</x-admin-layout>    