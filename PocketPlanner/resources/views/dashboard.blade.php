<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <!DOCTYPE html>
                <html lang="en">
                  <head>
                    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="" />
                    <link
                      rel="stylesheet"
                      as="style"
                      onload="this.rel='stylesheet'"
                      href="https://fonts.googleapis.com/css2?display=swap&amp;family=Noto+Sans%3Awght%40400%3B500%3B700%3B900"
                    />

                    <title>Pocket Planner</title>
                    <link rel="icon" type="image/x-icon" href="data:image/x-icon;base64," />
                    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

                    <!-- jQuery and jQuery UI -->
                    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
                    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
                    <script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
                    <script>
                      $(function() {
                        $("#duedate").datepicker({
                          dateFormat: "dd/mm/yy"
                        });
                      });
                    </script>

                    <style>
                      .ui-datepicker {
                        width: auto;
                        padding: 0.2em 0.2em 0;
                      }
                      .active-nav {
                        border-bottom: 2px solid white;
                      }
                    </style>
                  </head>
                  <body>
                    <div class="relative flex size-full min-h-screen flex-col bg-white group/design-root overflow-x-hidden" style='font-family: "Work Sans", "Noto Sans", sans-serif;'>
                      <div class="layout-container flex h-full grow flex-col">
                        <header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-b-[#f0f2f4] px-10 py-3" style="background-color:black;">
                          <div style = "color: white" class="flex items-center gap-4 text-[#111418]">
                            <div class="size-4">
                              <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                  d="M44 11.2727C44 14.0109 39.8386 16.3957 33.69 17.6364C39.8386 18.877 44 21.2618 44 24C44 26.7382 39.8386 29.123 33.69 30.3636C39.8386 31.6043 44 33.9891 44 36.7273C44 40.7439 35.0457 44 24 44C12.9543 44 4 40.7439 4 36.7273C4 33.9891 8.16144 31.6043 14.31 30.3636C8.16144 29.123 4 26.7382 4 24C4 21.2618 8.16144 18.877 14.31 17.6364C8.16144 16.3957 4 14.0109 4 11.2727C4 7.25611 12.9543 4 24 4C35.0457 4 44 7.25611 44 11.2727Z"
                                  fill="currentColor"
                                ></path>
                              </svg>
                            </div>
                            <h2 style = "color: white" class="text-[#111418] text-lg font-bold leading-tight tracking-[-0.015em]">Pocket Planner</h2>
                          </div>
                          <div class="flex flex-1 justify-end gap-8">
                            <button style="color:white" class="md:hidden" id="menu-button">
                              <!-- Hamburger Icon -->
                              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                              </svg>
                            </button>
                            <div id="menu" class="hidden md:flex flex-col md:flex-row items-center gap-9">
                              <a style = "color: white" class="text-[#111418] text-sm font-medium leading-normal {{ request()->routeIs('home.index') ? 'active-nav' : '' }}" href="{{ route('home.index') }}">Home</a>
                              <a style = "color: white" class="text-[#111418] text-sm font-medium leading-normal {{ request()->routeIs('finance') ? 'active-nav' : '' }}" href="{{ route('finance') }}">Finance</a>
                              <a style = "color: white" class="text-[#111418] text-sm font-medium leading-normal {{ request()->routeIs('settings') ? 'active-nav' : '' }}" href="{{ route('settings') }}">Settings</a>
                              <a href="{{ route('profile') }}">
                                <img src="img/Gen4_TP.png" width="40" style="margin: 0 auto; display: block;" />
                              </a>
                            </div>
                          </div>
                        </header>
                        @yield('content')
                        <footer>
                            <div style="background-color: #333; color: white; text-align: center; padding: 20px 0; position: relative;">
                                <p>© <span>Copyright</span> <strong class="px-1 sitename">WebApp 2025</strong> <span>All Rights Reserved</span></p>
                            </div>
                            </div>
                        </footer>
                      </div>
                    </div>
                    <script>
                      document.getElementById('menu-button').addEventListener('click', function() {
                        var menu = document.getElementById('menu');
                        menu.classList.toggle('hidden');
                      });
                    </script>
                  </body>
                </html>
            </div>
        </div>
    </div>
</x-app-layout>
