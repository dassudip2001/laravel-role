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

                            <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                                <div class="grid gap-1 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                                    <div class="text-gray-600">
                                        <p class="font-medium text-lg">User Create</p>
                                        <p>Please fill out all the fields.</p>
                                    </div>

                                    <div class="lg:col-span-2">
                                        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                                            <div class="md:col-span-3">
                                                <label for="fac_title"> Faculty Title </label>
                                                <input type="text" name="fac_title" id="fac_title" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="Mr | Mis" />
                                            </div>

                                            <div class="md:col-span-3">
                                                <label for="fac_name">Faculty Name</label>
                                                <input type="text" name="name" id="name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="Faculty Name" />
                                            </div>



{{--                                            <div class="md:col-span-3">--}}
{{--                                                <label for="fac_name">Faculty ac</label>--}}
{{--                                                <input type="text" name="fac_name" id="fac_name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="Faculty Name" />--}}
{{--                                            </div>--}}

                                            <div class="md:col-span-6">
                                                <label for="email">Faculty Email</label>
                                                <input type="email" name="email" id="email" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="Faculty Email" />
                                            </div>

                                            <div class="md:col-span-6">
                                                <label for="fac_code">Faculty Code</label>
                                                <input type="text" name="fac_code" id="fac_code" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="Faculty Code" />
                                            </div>

                                             <div class="md:col-span-6">
                                                <label for="fac_code">Faculty Department</label>
                                                <br>
                                                <select >
                                                     @foreach ($data as $item)
                                                <option value="{{$item->id}}">{{$item->name}}
                                                </option>
                                                {{-- <input type="text" name="code" id="fac_code" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="Faculty Department" /> --}}
                                                @endforeach</select>

                                            </div>


                                            <div class="md:col-span-6">
                                                <label for="fac_designtion">Faculty Designtion</label>
                                                <input type="text" name="fac_designtion" id="fac_designtion" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="Faculty Designtion" />
                                            </div>

                                            <div class="md:col-span-6">
                                                <label for="fac_join">Faculty Join Date</label>
                                                <input type="text" name="fac_join" id="fac_join" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="YYYY.MM.DD" />
                                            </div>

                                            <div class="md:col-span-6">
                                                <label for="fac_retirement">Faculty Retirement Date</label>
                                                <input type="text" name="fac_retirement" id="fac_retirement" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="YYYY.MM.DD" />
                                            </div>

                                            <div class="md:col-span-6">
                                                <label for="fac_phone">Faculty Phone</label>
                                                <input type="number" name="fac_phone" id="fac_phone" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="7585830344" />
                                            </div>

                                            <div class="md:col-span-6">
                                                <label for="fac_status">Faculty Status</label>
                                                <input type="text" name="fac_status" id="fac_status" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="Faculty Status" />
                                            </div>

                                            <div class="md:col-span-6">
                                                <label for="fac_description">Faculty Description</label>
                                                <input type="text" name="fac_description" id="fac_description" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="Faculty Description" />
                                            </div>
                                            <div class="md:col-span-6">
                                                <label for="password">Faculty Password</label>
                                                <input type="password" name="password" id="password" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder=" Password" />
                                            </div>
                                            <div class="md:col-span-6">
                                                <label for="conferm_password">Faculty Conferm Password</label>
                                                <input type="password" name="password_confirmation" id="conferm_password" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder=" Conferm Password" />
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
</x-admin-layout>
