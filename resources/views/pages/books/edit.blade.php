@extends('main')

@section('main-content')
<div class="p-8 pt-4 sm:ml-64">
  <div class="flex">
    <div class="flex-1">
        <h1 class="mb-4 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl">Add a New <span class="text-transparent bg-clip-text bg-gradient-to-r to-custom-mocca-dark from-custom-mocca-light">Book</span></h1>
    </div>
  </div>
  <form class="max-w-lg" action="{{ route('books.update', $book->id) }}" method="post">
    @csrf
    @method("PUT")
    <div class="mb-5">
      <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white @error('title') text-red-700 dark:text-red-500 @enderror">Title</label>
      <input type="text" id="title" name="title" value="{{ $book->title }}" class="@error('title') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="No Longer Human" />
      @if ($errors->has('title'))
        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $errors->first('title') }}</p>
      @endif
    </div>
    <div class="grid md:grid-cols-2 md:gap-6">
      <div class="mb-5">
        <label for="serial" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white @error('serial_number') text-red-700 dark:text-red-500 @enderror">Serial Number</label>
        <input type="text" id="serial" name="serial_number" maxlength="10" value="{{ $book->serial_number }}" class="@error('serial_number') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="4892934817" />
        @if ($errors->has('serial_number'))
          <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $errors->first('serial_number') }}</p>
        @endif
      </div>
      <div class="mb-5">
        <label for="number-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white @error('published_at') text-red-700 dark:text-red-500 @enderror">Published Date</label>
        <div class="relative">
          <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400 @error('published_at') text-red-700 dark:text-red-500 @enderror" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
              </svg>
          </div>
          <input id="datepicker-format" name="published_at" datepicker datepicker-format="yyyy-mm-dd" type="text" value="{{ $book->published_at }}" class="@error('published_at') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
        </div>
        @if ($errors->has('published_at'))
          <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $errors->first('published_at') }}</p>
        @endif
      </div>
    </div>
    <div class="mb-5">
      <label for="author" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white @error('author_id') text-red-700 dark:text-red-500 @enderror">Author</label>
      {{-- <input type="number" id="number-input" name="author_id" aria-describedby="helper-text-explanation" class="@error('author_id') bg-red-50 border border-red-500 text-red-900 placeholder-red-700 @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="90210" /> --}}
      <select id="author" name="author_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option>Choose an author</option>
        @foreach ($authors as $author)
        <option value="{{ $author->id }}" @if ($book->author_id === $author->id) selected @endif>{{ $author->name }}</option>
        @endforeach
      </select>
      @if ($errors->has('author_id'))
        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">{{ $errors->first('author_id') }}</p>
      @endif
    </div>
    <button type="submit" class="inline-flex items-center text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 shadow-lg shadow-teal-500/50 dark:shadow-lg dark:shadow-teal-800/80 font-medium rounded-lg text-lg px-5 py-2.5 text-center me-2 mb-2">
      <svg class="w-5 h-5 me-2 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
      </svg>  
      Edit Book
    </button>
  </form>
</div>
@endsection