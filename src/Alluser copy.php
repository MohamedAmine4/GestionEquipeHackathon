<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="./AllUser.css" rel="stylesheet">
  <script src="test.js"></script>
</head>
<body>
<div class="mx-auto max-w-screen-lg px-4 py-8 sm:px-8">
  <div class="flex items-center justify-between pb-6">
    <div>
      <h2 class="font-semibold text-gray-700">User Accounts</h2>
      <span class="text-xs text-gray-500">View accounts of registered users</span>
    </div>
    <div class="flex items-center justify-between">
      <div class="ml-10 space-x-8 lg:ml-40">
        <button class="flex items-center gap-2 rounded-md bg-blue-600 px-4 py-2 text-sm font-semibold text-white focus:outline-none focus:ring hover:bg-blue-700">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m0 0l6.75-6.75M12 19.5l-6.75-6.75" />
          </svg>

          CSV
        </button>
      </div>
    </div>
  </div>
  <div class="overflow-y-hidden rounded-lg border">
    <div class="overflow-x-auto">
    <form>
  <input type="text" name="lname" placeholder="LastName" id="lname" class="appearance-none border rounded-md border-gray-400 py-1 px-2 h-10" required oninput="rechercher()">
  <ul id="results"></ul>
</form>

      <!-- <table class="w-full">
        <thead>
          <tr class="bg-blue-600 text-left text-xs font-semibold uppercase tracking-widest text-white">
            <th class="px-5 py-3">ID</th>
            <th class="px-5 py-3">Full Name</th>
            <th class="px-5 py-3">User Role</th>
            <th class="px-5 py-3">Created at</th>
            <th class="px-5 py-3">Status</th>
          </tr>
        </thead>
        <tbody class="text-gray-500">



          <tr>
            <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
              <p class="whitespace-no-wrap">3</p>
            </td>
            <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
              <div class="flex items-center">
                <div class="h-10 w-10 flex-shrink-0">
                  <img class="h-full w-full rounded-full" src="/images/-ytzjgg6lxK1ICPcNfXho.png" alt="" />
                </div>
                <div class="ml-3">
                  <p class="whitespace-no-wrap">Besique Monroe</p>
                </div>
              </div>
            </td>
            <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
              <p class="whitespace-no-wrap">Administrator</p>
            </td>
            <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
              <p class="whitespace-no-wrap">Sep 28, 2022</p>
            </td>

            <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
              <span class="rounded-full bg-green-200 px-3 py-1 text-xs font-semibold text-green-900">Active</span>
            </td>
          </tr>


        


          <tr>
            <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
              <p class="whitespace-no-wrap">12</p>
            </td>
            <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
              <div class="flex items-center">
                <div class="h-10 w-10 flex-shrink-0">
                  <img class="h-full w-full rounded-full" src="/images/oPf2b7fqx5xa3mo68dYHo.png" alt="" />
                </div>
                <div class="ml-3">
                  <p class="whitespace-no-wrap">Elvis Son</p>
                </div>
              </div>
            </td>
            <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
              <p class="whitespace-no-wrap">Editor</p>
            </td>
            <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
              <p class="whitespace-no-wrap">Sep 28, 2022</p>
            </td>

            <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
              <span class="rounded-full bg-yellow-200 px-3 py-1 text-xs font-semibold text-yellow-900">Suspended</span>
            </td>
          </tr>





          <tr>
            <td class="bg-white px-5 py-5 text-sm">
              <p class="whitespace-no-wrap">66</p>
            </td>
            <td class="bg-white px-5 py-5 text-sm">
              <div class="flex items-center">
                <div class="h-10 w-10 flex-shrink-0">
                  <img class="h-full w-full rounded-full" src="https://images.unsplash.com/photo-1549078642-b2ba4bda0cdb?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=3&amp;w=144&amp;h=144" alt="" />
                </div>
                <div class="ml-3">
                  <p class="whitespace-no-wrap">Dana White</p>
                </div>
              </div>
            </td>
            <td class="bg-white px-5 py-5 text-sm">
              <p class="whitespace-no-wrap">Administrator</p>
            </td>
            <td class="bg-white px-5 py-5 text-sm">
              <p class="whitespace-no-wrap">Sep 28, 2022</p>
            </td>

            <td class="bg-white px-5 py-5 text-sm">
              <span class="rounded-full bg-red-200 px-3 py-1 text-xs font-semibold text-red-900">Inactive</span>
            </td>
          </tr>

      
        </tbody>
      </table> -->
    </div>
    <div class="flex flex-col items-center border-t bg-white px-5 py-5 sm:flex-row sm:justify-between">
      <span class="text-xs text-gray-600 sm:text-sm"> Showing 1 to 5 of 12 Entries </span>
      <div class="mt-2 inline-flex sm:mt-0">
        <button class="mr-2 h-12 w-12 rounded-full border text-sm font-semibold text-gray-600 transition duration-150 hover:bg-gray-100">Prev</button>
        <button class="h-12 w-12 rounded-full border text-sm font-semibold text-gray-600 transition duration-150 hover:bg-gray-100">Next</button>
      </div>
    </div>
  </div>
</div>

</body>
</html>