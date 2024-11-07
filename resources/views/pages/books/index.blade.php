@extends('main')

@section('main-content')
<div class="p-4 pt-16 sm:ml-64">
  <div class="flex">
    <div class="flex-1">
        <h1 class="mb-4 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl"><span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">Books</span> Data</h1>
    </div>
    <div class="flex-none align-middle my-auto">
        <a href="{{ route('books.create') }}" class="inline-flex items-center text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-md px-5 py-2.5 text-center me-2 mb-2 ">
            <svg class="w-5 h-5 me-3 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
            </svg>
            Add a New Book
        </a>
    </div>
  </div>

  <table id="selection-table">
      <thead>
          <tr>
              <th>
                  <span class="flex items-center">
                      #
                  </span>
              </th>
              <th>
                  <span class="flex items-center">
                      Title
                      <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                      </svg>
                  </span>
              </th>
              <th>
                  <span class="flex items-center">
                      Serial Number
                      <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                      </svg>
                  </span>
              </th>
              <th data-type="date" data-format="Month YYYY">
                  <span class="flex items-center">
                      Published At
                      <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                      </svg>
                  </span>
              </th>
              <th>
                  <span class="flex items-center">
                      Author
                      <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                      </svg>
                  </span>
              </th>
              <th>
                  <span class="flex items-center">
                      Actions
                  </span>
              </th>
          </tr>
      </thead>
      <tbody>
        @forelse ($books as $book)
        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 cursor-pointer">
            <th class="font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $loop->iteration }}</th>
            <td class="text-lg text-gray-900 dark:text-white">{{ $book->title }}</td>
            <td class="text-md"><p class="bg-blue-100 text-blue-800 font-medium px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300 text-center">{{ $book->serial_number }}</p></td>
            <td class="text-md text-gray-900 dark:text-white">{{ date_format(date_create($book->published_at),"M d, Y") }}</td>
            <td>
                <div class="text-lg text-gray-900 dark:text-white ">
                    {{ $book->author->name }}
                </div>
                <div class="text-md">
                    {{ $book->author->email }}
                </div>
            </td>
            <td>
                <form action="{{ route('books.destroy', $book->id) }}" method="post">
                    @csrf
                    @method('DELETE')

                    <a href="{{ route('books.edit', $book->id) }}" class="inline-flex items-center text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-md px-5 py-2.5 text-center me-2 mb-2">
                        <svg class="w-5 h-5 me-2 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                        </svg>
                        Edit
                    </a>   

                    <button 
                        type="submit" 
                        class="inline-flex items-center text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-md px-5 py-2.5 text-center me-2 mb-2" 
                        onclick="return confirm('Do you want to delete this product?');"
                    >
                        <svg class="w-5 h-5 me-2 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd"/>
                        </svg>
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @empty
        <td colspan="6">
            <span class="text-danger">
                <strong>No Product Found!</strong>
            </span>
        </td>
        @endforelse
      </tbody>
  </table>

</div>
@endsection