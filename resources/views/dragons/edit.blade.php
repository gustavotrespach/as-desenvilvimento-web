@extends('layouts.base')

@section('content')
    
<form class="w-1/4" action="{{ url('dragons/'.$dragon->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method ('PUT')
  <div class="mb-5">
    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
    <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $dragon->name }}" placeholder="Name" required />
  </div>
  <div class="mb-5">
    <label for="age" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Age</label>
    <input type="number" name="age" placeholder="Age" value="{{ $dragon->age}}" id="age" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
  </div>
  <div class="mb-5">
    <label for="element" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Element</label>
    <input type="text" name="element" placeholder="element" value="{{ $dragon->age }}" id="element" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
  </div>
  <img src="{{ asset($dragon->image) }}" alt="{{ $dragon->name }}" class="object-cover h-16 pr-2">
  <div class="relative z-0 w-full mb-8 group">
    <input type="file" name="image" id="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" placeholder="{{ $dragon->name }}"/>
    <label for="image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >Image</label>
  </div>
  <div class="mb-5">
    <select name="trainer_id" id="trainer_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        <option value="" selected disabled hidden>Please select a trainer</option>
        @foreach ($trainer as $entity)
        <option value="{{ $entity->id }}"> {{ $entity->name }} </option>
        @endforeach
    </select>
</div>

  <div class="flex items-center justify-center mb-5">
  <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit Dragon</button>
  </div>
</form>

@endsection