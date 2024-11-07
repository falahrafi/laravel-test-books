@extends('main')

@section('main-content')
<div class="p-4 pt-4 sm:ml-64">
  <div class="flex">
    <div class="flex-1">
        <h1 class="mb-8 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl"><span class="text-transparent bg-clip-text bg-gradient-to-r to-custom-mocca-dark from-custom-mocca-light">Books</span> Data</h1>
    </div>
    <div class="flex-none align-middle my-auto">
        <a href="{{ route('books.create') }}" class="inline-flex items-center text-white bg-gradient-to-r from-custom-mocca-light to-custom-mocca-dark hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-stone-300 dark:focus:ring-stone-800 shadow-lg shadow-stone-500/50 dark:shadow-lg dark:shadow-stone-800/80 font-medium rounded-lg text-md px-5 py-2.5 text-center me-2 mb-2 ">
            <svg class="w-5 h-5 me-3 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
            </svg>
            Add a New Book
        </a>
    </div>
  </div>

  <table id="selection-table">
      <thead class="text-yellow-200">
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
        <tr id="book-{{ $book->id }}" class="hover:bg-gray-50 dark:hover:bg-gray-800 cursor-pointer">
            <th class="font-medium text-white whitespace-nowrap dark:text-white">
                <div class="bg-gradient-to-r from-custom-mocca-light to-custom-mocca-dark font-medium px-2.5 py-1.5 rounded-full text-center">
                    {{ $loop->iteration }}
                </div>
            </th>
            <td class="text-lg text-gray-800 dark:text-white font-bold">{{ $book->title }}</td>
            <td class="text-md"><p class="bg-stone-200 text-stone-800 font-medium px-2.5 py-0.5 rounded-full dark:bg-stone-900 dark:text-stone-300 text-center">{{ $book->serial_number }}</p></td>
            <td class="text-md font-semibold text-gray-800 dark:text-white">{{ date_format(date_create($book->published_at),"M d, Y") }}</td>
            <td>
                <div class="text-lg font-bold text-gray-800 dark:text-white ">
                    {{ $book->author->name }}
                </div>
                <div class="text-md text-gray-800 dark:text-white">
                    {{ $book->author->email }}
                </div>
            </td>
            <td>
                <a href="{{ route('books.edit', $book->id) }}" class="inline-flex items-center text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 shadow-lg shadow-teal-500/50 dark:shadow-lg dark:shadow-teal-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                    <svg class="w-5 h-5 me-2 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                    </svg>
                    Edit book
                </a>   
                <button 
                    class="inline-flex items-center text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-md px-5 py-2.5 text-center me-2 mb-2" 
                    onclick="showDeleteModal({{ $book->id }})"
                >
                    <svg class="w-5 h-5 me-2 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd"/>
                    </svg>
                    Delete book
                </button>
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

    <!-- Modal -->
<div id="deleteModal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-50 flex justify-center items-center w-full h-full bg-gray-500 bg-opacity-50">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" onclick="hideDeleteModal()" class="absolute top-3 right-3 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this book?</h3>
                <button id="confirmDelete" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                    Yes, I'm sure
                </button>
                <button onclick="hideDeleteModal()" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button>
            </div>
        </div>
    </div>
</div>

</div>

<script>
    let bookIdToDelete = null;

    function showDeleteModal(bookId) {
        bookIdToDelete = bookId;
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    function hideDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
        bookIdToDelete = null;
    }

    document.getElementById('confirmDelete').addEventListener('click', function () {
        if (bookIdToDelete) {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch(`/books/${bookIdToDelete}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById(`book-${bookIdToDelete}`).remove();
                    alert(data.message);
                } else {
                    alert("An error occurred while deleting the book.");
                }
                hideDeleteModal();
            })
            .catch(error => {
                console.error('Error:', error);
                alert("An error occurred while deleting the book.");
                hideDeleteModal();
            });
        }
    });
</script>

{{-- <script>
    function deleteBook(bookId) {
        // Show a confirmation dialog
        if (confirm("Are you sure you want to delete this book?")) {
            // Get the CSRF token
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            // Send a DELETE request using Fetch API
            fetch(`/books/${bookId}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Remove the book row from the table
                    console.log(`book-${bookId}`);
                    document.getElementById(`book-${bookId}`).remove();
                    alert(data.message);
                } else {
                    alert("An error occurred while deleting the book.");
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert("An error occurred while deleting the book.");
            });
        }
    }
</script> --}}
@endsection