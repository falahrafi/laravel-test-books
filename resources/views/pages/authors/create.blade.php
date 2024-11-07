@extends('main')

@section('main-content')
<div class="p-8 pt-4 sm:ml-64">
  <div class="flex">
    <div class="flex-1">
        <h1 class="mb-4 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl">Add a New <span class="text-transparent bg-clip-text bg-gradient-to-r to-custom-mocca-dark from-custom-mocca-light">Author</span></h1>
    </div>
  </div>
  <form class="max-w-lg" action="{{ route('authors.store') }}" method="post">
    @csrf
    <div class="mb-5">
      <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white @error('name') text-red-700 dark:text-red-500 @enderror">Name</label>
      <input type="text" id="name" name="name" class="@error('name') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Fyodor Dostoevsky" />
      @if ($errors->has('name'))
        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $errors->first('name') }}</p>
      @endif
    </div>
    <div class="mb-5">
      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white @error('email') text-red-700 dark:text-red-500 @enderror">Email</label>
      <input type="text" id="email" name="email" class="@error('email') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="dostoevsky@gmail.com" />
      @if ($errors->has('email'))
        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $errors->first('email') }}</p>
      @endif
    </div>
    <button type="submit" class="inline-flex items-center text-white bg-gradient-to-r from-custom-mocca-light to-custom-mocca-dark hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-stone-300 dark:focus:ring-stone-800 shadow-lg shadow-stone-500/50 dark:shadow-lg dark:shadow-stone-800/80 font-medium rounded-lg text-lg px-5 py-2.5 text-center me-2 mb-2 ">
      <svg class="w-5 h-5 me-3 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
      </svg>      
      Add Author
    </button>
  </form>
</div>
@endsection