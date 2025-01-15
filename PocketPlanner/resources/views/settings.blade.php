@extends('dashboard')

@section('content')
<div class="px-4 md:px-40 flex flex-1 justify-center py-5" style="background-image: url('{{ asset('img/bgimage.jpg') }}'); background-size: cover; background-repeat: no-repeat; background-position: center;">
    <div class="layout-content-container flex flex-col max-w-full md:max-w-[960px] flex-1">
      <div class="flex flex-col gap-3 p-4">
        <!-- Settings Heading -->
        <p style = "color: white" class="text-[#111418] tracking-light text-[24px] md:text-[32px] font-bold leading-tight min-w-72">Settings</p>
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
        {{-- Financial Start--}}
          <h3 style = "color: white" class="text-[#111418] text-lg font-bold leading-tight tracking-[-0.015em] px-4 pb-2 pt-4">Financial</h3>
          <br>
          {{-- Add balance --}}
            <form style="background: rgba(255, 255, 255, 0.54); border-radius: 10px" action="{{ route('balance.store') }}" method="POST" class="flex flex-col md:flex-row items-center gap-4 bg-white px-4 min-h-[72px] py-2 justify-between">
                @csrf
                <div class="flex flex-col justify-center w-full md:w-auto">
                    <p class="text-[#111418] text-base font-medium leading-normal line-clamp-1">Add balance</p>
                    <input
                        id="balance" name="balance" type="text" placeholder="RM 2000.00"
                        class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-[#111418] focus:outline-0 focus:ring-0 border-none bg-[#f0f2f4] focus:border-none h-14 placeholder:text-[#637488] p-4 text-base font-normal leading-normal"
                        value=""
                    />
                </div>
                <div class="shrink-0">
                    <input type="submit" value="Save" class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-8 px-4 bg-[#f0f2f4] text-[#111418] text-sm font-medium leading-normal w-fit" />
                </div>
            </form>
          {{-- Add balance --}}
          <br>
          {{-- Set Budget --}}
            <form style="background: rgba(255, 255, 255, 0.54); border-radius: 10px" action="{{ route('budget.store') }}" method="POST" class="flex flex-col md:flex-row items-center gap-4 bg-white px-4 min-h-[72px] py-2 justify-between">
                @csrf
                <div class="flex flex-col justify-center w-full md:w-auto">
                    <p class="text-[#111418] text-base font-medium leading-normal line-clamp-1">Set budget</p>
                    <div class="flex flex-col md:flex-row max-w-full md:max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
                        <label class="flex flex-col min-w-40 flex-1">
                            <p class="text-[#111418] text-base font-medium leading-normal pb-2">Month</p>
                            <select id="month" name="month" class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-[#111418] focus:outline-0 focus:ring-0 border-none bg-[#f0f2f4] focus:border-none h-14 text-base font-normal leading-normal">
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <option value="December">December</option>
                            </select>
                        </label>
                        <label class="flex flex-col min-w-40 flex-1">
                            <p class="text-[#111418] text-base font-medium leading-normal pb-2">Amount</p>
                            <input
                                placeholder="RM 2000.00" id="amount" name="amount" type="text"
                                class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-[#111418] focus:outline-0 focus:ring-0 border-none bg-[#f0f2f4] focus:border-none h-14 placeholder:text-[#637488] p-4 text-base font-normal leading-normal"
                                value=""
                            />
                        </label>
                    </div>
                </div>
                <input type="submit" value="Save" class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-8 px-4 bg-[#f0f2f4] text-[#111418] text-sm font-medium leading-normal w-fit" />
            </form>
            {{-- Set Budget --}}
<br>
            {{-- Set Upcoming Bills --}}  
            <form style="background: rgba(255, 255, 255, 0.54); border-radius: 10px" action="{{ route('upcomingbills.store') }}" method="POST" class="flex flex-col md:flex-row items-center gap-4 bg-white px-4 min-h-[72px] py-2 justify-between">
              @csrf
              <div class="flex flex-col justify-center w-full md:w-auto">
                <p class="text-[#111418] text-base font-medium leading-normal line-clamp-1">Set expenses for upcoming bills</p>
                <div class="flex flex-col md:flex-row max-w-full md:max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
                  {{-- Bills --}}
                  <label class="flex flex-col min-w-40 flex-1">
                    <p class="text-[#111418] text-base font-medium leading-normal pb-2">Bills</p>
                    <select id="bill" name="bill" class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-[#111418] focus:outline-0 focus:ring-0 border-none bg-[#f0f2f4] focus:border-none h-14 text-base font-normal leading-normal">
                      <option value="Rent">Rent</option>
                      <option value="Electricity">Electricity</option>
                      <option value="Internet">Internet</option>
                      <option value="Transport">Transport</option>
                      <option value="Groceries">Groceries</option>
                      <option value="Others">Others</option>
                    </select>
                    <input id="otherBill" name="otherBill" type="text" placeholder="Enter other bill" class="form-input hidden w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-[#111418] focus:outline-0 focus:ring-0 border-none bg-[#f0f2f4] focus:border-none h-14 placeholder:text-[#637488] p-4 text-base font-normal leading-normal" value="" />
                  </label>
                  {{-- Amount --}}
                  <label class="flex flex-col min-w-40 flex-1">
                    <p class="text-[#111418] text-base font-medium leading-normal pb-2">Amount</p>
                    <input
                      placeholder="RM 2000.00" id="amount" name="amount" type="text"
                      class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-[#111418] focus:outline-0 focus:ring-0 border-none bg-[#f0f2f4] focus:border-none h-14 placeholder:text-[#637488] p-4 text-base font-normal leading-normal"
                      value=""
                    />
                  </label>
                  {{-- Due Date --}}
                  <label class="flex flex-col min-w-40 flex-1">
                    <p class="text-[#111418] text-base font-medium leading-normal pb-2">Due Date</p>
                    <input
                      placeholder="dd/mm/yyyy" id="duedate" name="duedate" type="text"
                      class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-[#111418] focus:outline-0 focus:ring-0 border-none bg-[#f0f2f4] focus:border-none h-14 placeholder:text-[#637488] p-4 text-base font-normal leading-normal"
                      value=""
                    />
                  </label>
                </div>
              </div>
              <div class="shrink-0">
                <input type="submit" value="Save" class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-8 px-4 bg-[#f0f2f4] text-[#111418] text-sm font-medium leading-normal w-fit" />
              </div>
            </form>

            <script>
              // Show the other bill input when 'Others' is selected
              document.getElementById('bill').addEventListener('change', function() {
                var otherBillInput = document.getElementById('otherBill');
                if (this.value === 'Others') {
                    otherBillInput.classList.remove('hidden');
                } else {
                    otherBillInput.classList.add('hidden');
                }
              });

              // Initialize jQuery UI Datepicker
              $(function() {
                $("#duedate").datepicker({
                  dateFormat: "dd/mm/yy"
                });
              });
            </script>
            {{-- Set Upcoming Bills --}}
<br>
            {{-- Add Expenses --}}  
            <form style="background: rgba(255, 255, 255, 0.54); border-radius: 10px" action="{{ route('expenses.store') }}" method="POST" class="flex flex-col md:flex-row items-center gap-4 bg-white px-4 min-h-[72px] py-2 justify-between">
              @csrf
              <div class="flex flex-col justify-center w-full md:w-auto">
                  <h4 class="text-[#111418] text-base font-medium leading-normal line-clamp-1">Add today's expenses</h4>
                  <div class="flex flex-col md:flex-row max-w-full md:max-w-[480px] flex-wrap items-end gap-4 px-4 py-3">
                    {{-- Expenses --}}
                    <label class="flex flex-col min-w-40 flex-1">
                        <p class="text-[#111418] text-base font-medium leading-normal pb-2">Expenses</p>
                        <input placeholder="Groceries" id="expense" name="expense" type="text" 
                        class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-[#111418] focus:outline-0 focus:ring-0 border-none bg-[#f0f2f4] focus:border-none h-14 placeholder:text-[#637488] p-4 text-base font-normal leading-normal" 
                        value="" />
                    </label>
                    {{-- Amount --}}
                    <label class="flex flex-col min-w-40 flex-1">
                        <p class="text-[#111418] text-base font-medium leading-normal pb-2">Amount</p>
                        <input placeholder="RM 2000.00" id="amount" name="amount" type="text" 
                        class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-[#111418] focus:outline-0 focus:ring-0 border-none bg-[#f0f2f4] focus:border-none h-14 placeholder:text-[#637488] p-4 text-base font-normal leading-normal" 
                        value="" />
                    </label>
                    {{-- Date --}}
                    <label class="flex flex-col min-w-40 flex-1">
                        <p class="text-[#111418] text-base font-medium leading-normal pb-2">Date</p>
                        <input placeholder="dd/mm/yyyy" id="date" name="date" type="text" 
                        class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-[#111418] focus:outline-0 focus:ring-0 border-none bg-[#f0f2f4] focus:border-none h-14 placeholder:text-[#637488] p-4 text-base font-normal leading-normal" 
                        value="" />
                    </label>
                  </div>
              </div>
              <div class="shrink-0">
                  <input type="submit" value="Save" 
                  class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-8 px-4 bg-[#f0f2f4] text-[#111418] text-sm font-medium leading-normal w-fit" />
              </div>
            </form>

            <script>
              // Initialize jQuery UI Datepicker
              $(function() {
                  $("#date").datepicker({
                    dateFormat: "dd/mm/yy"
                  });
              });
            </script>
            {{-- Add Expenses --}}

          {{-- Financial Ends--}}
          {{-- Personal Starts--}}
          <h3 style = "color: white" class="text-[#111418] text-lg font-bold leading-tight tracking-[-0.015em] px-4 pb-2 pt-4">Personal Infomation</h3>
          <div style="background: rgba(255, 255, 255, 0.54); border-radius: 10px" class="flex items-center gap-4 bg-white px-4 min-h-[72px] py-2 justify-between">
              <div class="flex flex-col justify-center">
                <p class="text-[#111418] text-base font-medium leading-normal line-clamp-1">Edit profile</p>
              </div>
              <div class="shrink-0">
                <button
                  class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-8 px-4 bg-[#f0f2f4] text-[#111418] text-sm font-medium leading-normal w-fit"
                >
                  <span class="truncate">Edit</span>
                </button>
              </div>
            </div>
            <div style="background: rgba(255, 255, 255, 0.54); border-radius: 10px" class="flex items-center gap-4 bg-white px-4 min-h-[72px] py-2 justify-between">
              <div class="flex flex-col justify-center">
                <p class="text-[#111418] text-base font-medium leading-normal line-clamp-1">Email</p>
                <p class="text-[#111418] text-sm font-bold leading-normal line-clamp-2">irene@lang.io</p>
              </div>
              <div class="shrink-0">
                <button
                  class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-8 px-4 bg-[#f0f2f4] text-[#111418] text-sm font-medium leading-normal w-fit"
                >
                  <span class="truncate">Edit</span>
                </button>
              </div>
            </div>
            {{-- Personal Ends--}}

            
            <h3 style = "color: white" class="text-[#111418] text-lg font-bold leading-tight tracking-[-0.015em] px-4 pb-2 pt-4">Notifications</h3>
            <div style="background: rgba(255, 255, 255, 0.54); border-radius: 10px" class="flex items-center gap-4 bg-white px-4 min-h-14 justify-between">
              <p class="text-[#111418] text-base font-normal leading-normal flex-1 truncate">Total amount spent</p>
              <div class="shrink-0">
                <label
                  class="relative flex h-[31px] w-[51px] cursor-pointer items-center rounded-full border-none bg-[#f0f2f4] p-0.5 has-[:checked]:justify-end has-[:checked]:bg-[#1979e6]"
                >
                  <div class="h-full w-[27px] rounded-full bg-white" style="box-shadow: rgba(0, 0, 0, 0.15) 0px 3px 8px, rgba(0, 0, 0, 0.06) 0px 3px 1px;"></div>
                  <input type="checkbox" class="invisible absolute" />
                </label>
              </div>
            </div>
            <div style="background: rgba(255, 255, 255, 0.54); border-radius: 10px" class="flex items-center gap-4 bg-white px-4 min-h-14 justify-between">
              <p class="text-[#111418] text-base font-normal leading-normal flex-1 truncate">Budget exceed alerts</p>
              <div class="shrink-0">
                <label
                  class="relative flex h-[31px] w-[51px] cursor-pointer items-center rounded-full border-none bg-[#f0f2f4] p-0.5 has-[:checked]:justify-end has-[:checked]:bg-[#1979e6]"
                >
                  <div class="h-full w-[27px] rounded-full bg-white" style="box-shadow: rgba(0, 0, 0, 0.15) 0px 3px 8px, rgba(0, 0, 0, 0.06) 0px 3px 1px;"></div>
                  <input type="checkbox" class="invisible absolute" />
                </label>
              </div>
            </div>
            <h3 style = "color: white" class="text-[#111418] text-lg font-bold leading-tight tracking-[-0.015em] px-4 pb-2 pt-4">Support</h3>
            <div style="background: rgba(255, 255, 255, 0.54); border-radius: 10px" class="flex items-center gap-4 bg-white px-4 min-h-14 justify-between">
              <p class="text-[#111418] text-base font-normal leading-normal flex-1 truncate">Help center</p>
              <div class="shrink-0">
                <div class="text-[#111418] flex size-7 items-center justify-center" data-icon="CaretRight" data-size="24px" data-weight="regular">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                    <path d="M181.66,133.66l-80,80a8,8,0,0,1-11.32-11.32L164.69,128,90.34,53.66a8,8,0,0,1,11.32-11.32l80,80A8,8,0,0,1,181.66,133.66Z"></path>
                  </svg>
                </div>
              </div>
            </div>
            <div style="background: rgba(255, 255, 255, 0.54); border-radius: 10px" class="flex items-center gap-4 bg-white px-4 min-h-14 justify-between">
              <p class="text-[#111418] text-base font-normal leading-normal flex-1 truncate">Give feedback</p>
              <div class="shrink-0">
                <div class="text-[#111418] flex size-7 items-center justify-center" data-icon="CaretRight" data-size="24px" data-weight="regular">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                    <path d="M181.66,133.66l-80,80a8,8,0,0,1-11.32-11.32L164.69,128,90.34,53.66a8,8,0,0,1,11.32-11.32l80,80A8,8,0,0,1,181.66,133.66Z"></path>
                  </svg>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection