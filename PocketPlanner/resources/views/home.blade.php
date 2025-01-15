@extends('dashboard')

@section('content')
<div class="px-40 flex flex-1 justify-center py-5" style="background-image: url('{{ asset("img/bgimage.jpg") }}'); background-size: cover; background-repeat: no-repeat; background-position: center;">
          <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
            
          <div class="flex flex-wrap justify-between gap-3 p-4">
            <div class="flex min-w-72 flex-col gap-3">
                  <p style = "color: white" class="text-[#111418] tracking-light text-[32px] font-bold leading-tight">{{ $currentMonthName }} {{ $currentYear }}</p>
                  @if ($remainingAmount >= 0) 
                    <p style = "color: white" class="text-[#617389] tracking-light text-[20px] font-normal leading-normal">
                      You have <span class="font-bold">RM {{ number_format($remainingAmount, 2) }} left</span> to spend this month
                    </p> 
                  @else 
                    <p class="text-[#617389] tracking-light text-[20px] font-normal leading-normal">
                      You have exceeded your budget by <span class="font-bold">RM {{ number_format(abs($remainingAmount), 2) }}</span> this month
                    </p> 
                  @endif
            </div>
          </div>

          <div class="flex flex-wrap gap-4 p-4">
            {{-- Balance --}}
            <div style="background: rgba(255, 255, 255, 0.54)" class="flex min-w-[158px] flex-1 flex-col gap-2 rounded-xl p-4 md:p-6 bg-[#f0f2f4]"> 
                <p class="text-[#111418] text-base font-medium leading-normal">Balance</p> 
                <p class="text-[#111418] tracking-light text-xl md:text-2xl font-bold leading-tight">RM {{ number_format($balance, 2) }}</p> 
            </div>
            {{-- Balance --}}

            {{-- Total Due --}}
            <div style="background: rgba(255, 255, 255, 0.54)" class="flex min-w-[158px] flex-1 flex-col gap-2 rounded-xl p-4 md:p-6 bg-[#f0f2f4]">
                <p class="text-[#111418] text-base font-medium leading-normal">Total Due</p> 
                <p class="text-[#111418] tracking-light text-xl md:text-2xl font-bold leading-tight">RM {{ number_format($totalDue, 2) }}</p> 
            </div>
            {{-- Total Due --}}
        </div>
        {{-- Progress Bar --}}
        <div style="background: rgba(255, 255, 255, 0.54)" class="flex min-w-[158px] flex flex-col gap-3 p-4 rounded-xl p-4 md:p-6 bg-[#f0f2f4]">
            <p class="text-[#111418] text-base font-bold leading-normal">Expense Progress for {{ $currentMonthName }}</p>
            <div class="w-full bg-gray-200 rounded-full h-4 flex">
            <div class="h-4 rounded-l-full {{ $budgetAmount > 0  ? (($totalExpenses / $budgetAmount) > 0.9 ? 'bg-red-500' : (($totalExpenses / $budgetAmount) > 0.5 ? 'bg-yellow-500' : 'bg-green-500')) : 'bg-gray-500'}}" style="width: {{ $budgetAmount > 0 ? min(($totalExpenses / $budgetAmount) * 100, 100) : 0 }}%;"></div>
               <div class="h-4 {{   $budgetAmount > 0 ? (($expectedExpenses / $budgetAmount) > 0.9  ? 'bg-red-500' : (($expectedExpenses / $budgetAmount) > 0.5   ? 'bg-yellow-500' : 'bg-green-500')) : 'bg-gray-500'}}" style="width: {{ $budgetAmount > 0 ? min((($expectedExpenses - $totalExpenses) / $budgetAmount) * 100, 100) : 0 }}%;"></div>
</div>
<p class="text-[#111418] text-base font-medium leading-normal">Total Expenses: RM {{ number_format($totalExpenses, 2) }} </p>
<p class="text-[#111418] text-base font-medium leading-normal">Expected Expenses: RM {{ number_format($expectedExpenses, 2) }}</p>
<p class="text-[#111418] text-base font-medium leading-normal">Budget: RM {{ number_format($budgetAmount, 2) }}</p>
</div>

        <!-- Error Messages -->
        <div>
          @if($errors->any())
            <div class="text-red-600">
              <ul>
                @foreach($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
        </div>
        <!-- Success Messages -->
        <div>
          @if(session()->has('success'))
            <div class="text-green-600">
              {{ session('success') }}
            </div>
          @endif
        </div>
        {{-- Progress Bar --}}

                {{-- Set Upcoming Bills --}}
                <h2 style="color:white" class="text-[#111418] text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5">Upcoming bills</h2>

                @foreach($upcomingBills as $bill)
                    <div style="background: rgba(255, 255, 255, 0.54); border-radius: 10px" class="flex items-center gap-4 bg-white px-4 min-h-[72px] py-2 justify-between">
                        <div class="flex items-center gap-4">
                            {{-- Icon --}}
                            @if ($bill->bill == 'Rent')
                                <div class="text-[#111418] flex items-center justify-center rounded-lg bg-[#f0f2f4] shrink-0 size-12" data-icon="House" data-size="24px" data-weight="regular">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                                  <path
                                    d="M218.83,103.77l-80-75.48a1.14,1.14,0,0,1-.11-.11,16,16,0,0,0-21.53,0l-.11.11L37.17,103.77A16,16,0,0,0,32,115.55V208a16,16,0,0,0,16,16H96a16,16,0,0,0,16-16V160h32v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V115.55A16,16,0,0,0,218.83,103.77ZM208,208H160V160a16,16,0,0,0-16-16H112a16,16,0,0,0-16,16v48H48V115.55l.11-.1L128,40l79.9,75.43.11.1Z"
                                  ></path>
                                </svg>
                                </div>
                            @elseif ($bill->bill == 'Electricity')
                                <div class="text-[#111418] flex items-center justify-center rounded-lg bg-[#f0f2f4] shrink-0 size-12" data-icon="Plug" data-size="24px" data-weight="regular">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                                  <path
                                    d="M237.66,66.34a8,8,0,0,0-11.32,0L192,100.69,155.31,64l34.35-34.34a8,8,0,1,0-11.32-11.32L144,52.69,117.66,26.34a8,8,0,0,0-11.32,11.32L112.69,44l-53,53a40,40,0,0,0,0,56.57l15.71,15.71L26.34,218.34a8,8,0,0,0,11.32,11.32l49.09-49.09,15.71,15.71a40,40,0,0,0,56.57,0l53-53,6.34,6.35a8,8,0,0,0,11.32-11.32L203.31,112l34.35-34.34A8,8,0,0,0,237.66,66.34ZM147.72,185a24,24,0,0,1-33.95,0L71,142.23a24,24,0,0,1,0-33.95l53-53L200.69,132Z"
                                  ></path>
                                </svg>
                                </div>
                            @elseif ($bill->bill == 'Internet')
                                <div class="text-[#111418] flex items-center justify-center rounded-lg bg-[#f0f2f4] shrink-0 size-12" data-icon="WifiHigh" data-size="24px" data-weight="regular">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                                  <path
                                    d="M140,204a12,12,0,1,1-12-12A12,12,0,0,1,140,204ZM237.08,87A172,172,0,0,0,18.92,87,8,8,0,0,0,29.08,99.37a156,156,0,0,1,197.84,0A8,8,0,0,0,237.08,87ZM205,122.77a124,124,0,0,0-153.94,0A8,8,0,0,0,61,135.31a108,108,0,0,1,134.06,0,8,8,0,0,0,11.24-1.3A8,8,0,0,0,205,122.77Zm-32.26,35.76a76.05,76.05,0,0,0-89.42,0,8,8,0,0,0,9.42,12.94,60,60,0,0,1,70.58,0,8,8,0,1,0,9.42-12.94Z"
                                  ></path>
                                </svg>
                                </div>
                            @elseif ($bill->bill == 'Groceries')
                                <div class="text-[#111418] flex items-center justify-center rounded-lg bg-[#f0f2f4] shrink-0 size-12" data-icon="ShoppingBag" data-size="24px" data-weight="regular">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                                  <path
                                    d="M216,40H40A16,16,0,0,0,24,56V200a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A16,16,0,0,0,216,40Zm0,160H40V56H216V200ZM176,88a48,48,0,0,1-96,0,8,8,0,0,1,16,0,32,32,0,0,0,64,0,8,8,0,0,1,16,0Z"
                                  ></path>
                                </svg>
                                </div>
                            @elseif ($bill->bill == 'Transport')
                                <div class="text-[#111418] flex items-center justify-center rounded-lg bg-[#f0f2f4] shrink-0 size-12" data-icon="Car" data-size="24px" data-weight="regular">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                                  <path
                                    d="M240,112H229.2L201.42,49.5A16,16,0,0,0,186.8,40H69.2a16,16,0,0,0-14.62,9.5L26.8,112H16a8,8,0,0,0,0,16h8v80a16,16,0,0,0,16,16H64a16,16,0,0,0,16-16V192h96v16a16,16,0,0,0,16,16h24a16,16,0,0,0,16-16V128h8a8,8,0,0,0,0-16ZM69.2,56H186.8l24.89,56H44.31ZM64,208H40V192H64Zm128,0V192h24v16Zm24-32H40V128H216ZM56,152a8,8,0,0,1,8-8H80a8,8,0,0,1,0,16H64A8,8,0,0,1,56,152Zm112,0a8,8,0,0,1,8-8h16a8,8,0,0,1,0,16H176A8,8,0,0,1,168,152Z"
                                  ></path>
                                </svg>
                                </div>
                            @else
                                <div class="text-[#111418] flex items-center justify-center rounded-lg bg-[#f0f2f4] shrink-0 size-12" data-icon="House" data-size="24px" data-weight="regular">
                                <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
                                <span class="material-icons">attach_money</span>
                                </div>
                            @endif
                            <div class="flex flex-col justify-center">
                                <p class="text-[#111418] text-base font-bold leading-normal line-clamp-1">{{ $bill->bill }}</p>
                                <p class="text-[#111418] text-sm font-bold leading-normal line-clamp-1">Due in {{(-1)*(number_format(\Carbon\Carbon::parse($bill->duedate)->diffInDays(Carbon\Carbon::now()) ,0))}} days</p>
                            </div>
                        </div>
                        <div class="shrink-0 flex items-center gap-2">
                            <p class="text-[#111418] text-base font-bold leading-normal">RM {{ number_format($bill->amount, 2) }}</p>
                            <form method="POST" action="{{ route('home.markAsDone', $bill->id) }}">
                                @csrf
                                <input
                                
                                type="submit" value="Done" class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-8 px-4 bg-[#f0f2f4] text-[#111418] text-sm font-bold leading-normal w-fit" 
                                />
                            </form>
                        </div>
                    </div>
                    <br>
                @endforeach
        {{-- Set Upcoming Bills --}}

@endsection
