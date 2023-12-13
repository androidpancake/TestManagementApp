<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-[#019B95] sm:translate-x-0 dark:bg-[#019B95] dark:border-gray-700" aria-label="Sidebar">
   <div class="h-full px-3 pb-4 overflow-y-auto bg-[#019B95] dark:bg-bg-[#019B95]">
      <ul class="space-y-2 font-medium">
         @auth
         <li>
            <a href="{{ url('/') }}" class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-[#F5AB2E] hover:text-gray-900 dark:hover:bg-gray-700 group">
               <div>
                  <i class="ph ph-house"></i>
               </div>
               <span class="ms-3">Dashboard</span>
            </a>
         </li>
         <!-- admin role only -->
         @if(auth()->user()->roles->first()->name === 'ADMIN')
         <li>
            <a href="{{ route('user.index') }}" class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-[#F5AB2E] hover:text-gray-900 dark:hover:bg-gray-700 group">
               <div>
                  <i class="ph ph-users"></i>
               </div>
               <span class="ms-3">Users</span>
            </a>
         </li>
         <!-- end admin -->
         <!-- user role only -->
         @elseif(auth()->user()->roles->first()->name === 'USER')
         <li>
            <a href="{{ route('project.index') }}" class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-[#F5AB2E] hover:text-gray-900 dark:hover:bg-gray-700 group">
               <div>
                  <i class="ph ph-code"></i>
               </div>
               <span class="ms-3">Projects</span>
            </a>
         </li>
         <li>
            <a href="#" aria-controls="dropdown-sit" data-collapse-toggle="dropdown-sit" class="flex items-center justify-between p-2 text-white rounded-lg dark:text-white hover:bg-[#F5AB2E] hover:text-gray-900 dark:hover:bg-gray-700 group">
               <div>
                  <i class="ph ph-puzzle-piece"></i>
                  <span class="ms-3">SIT Reports</span>
               </div>
               <i class="ph ph-caret-down"></i>
            </a>
            <ul id="dropdown-sit" class="hidden py-2 space-y-2">
               <li>
                  <a href="{{ url('sit/form') }}" class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg pl-11 group hover:bg-[#F5AB2E] hover:text-black dark:text-white dark:hover:bg-gray-700">
                     <i class="ph ph-file-text"></i>
                     <span class="ms-3">Form Report</span>
                  </a>
               </li>
               <li>
                  <a href="{{ route('sit.index') }}" class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg pl-11 group hover:bg-[#F5AB2E] hover:text-black dark:text-white dark:hover:bg-gray-700">
                     <i class="ph ph-files"></i>
                     <span class="ms-3">All Report</span>
                  </a>
               </li>
            </ul>
         </li>
         <li>
            <a href="#" aria-controls="dropdown-uat" data-collapse-toggle="dropdown-uat" class="flex items-center justify-between p-2 text-white rounded-lg dark:text-white hover:bg-[#F5AB2E] hover:text-gray-900 dark:hover:bg-gray-700 group">
               <div>
                  <i class="ph ph-user-list"></i>
                  <span class="ms-3">UAT Reports</span>
               </div>
               <i class="ph ph-caret-down"></i>
            </a>
            <ul id="dropdown-uat" class="hidden py-2 space-y-2">
               <li>
                  <a href="#" class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg pl-11 group hover:bg-[#F5AB2E] hover:text-black dark:text-white dark:hover:bg-gray-700">
                     <i class="ph ph-file-text"></i>
                     <span class="ms-3">Form Report</span>
                  </a>
               </li>
               <li>
                  <a href="{{ route('sit.index') }}" class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg pl-11 group hover:bg-[#F5AB2E] hover:text-black dark:text-white dark:hover:bg-gray-700">
                     <i class="ph ph-files"></i>
                     <span class="ms-3">All Report</span>
                  </a>
               </li>
            </ul>
         </li>
         @endif
         <!-- end user -->
         @endauth
      </ul>
   </div>
</aside>