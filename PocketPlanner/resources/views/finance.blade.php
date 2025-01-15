@extends('dashboard')

@section('content')
<div class="px-4 md:px-40 flex flex-1 justify-center py-5" style="background-image: url('{{ asset('img/bgimage.jpg') }}'); background-size: cover; background-repeat: no-repeat; background-position: center;">
    <div class="layout-content-container flex flex-col max-w-full md:max-w-[960px] flex-1">
        {{-- This Month Info --}}
        <div class="gap-4 p-4">
            <p style = "color: white" class="text-[#111418] tracking-light text-[24px] md:text-[32px] font-bold leading-tight min-w-72">Expenses</p>
            <br>
            <p style = "color: white" class="text-[#111418] tracking-light text-[16px] md:text-[20px] font-bold leading-tight min-w-72">This Month</p>
        </div>
        <div class="flex flex-wrap gap-4 p-4">
            {{-- Total Expenses --}}
            <div style="background: rgba(255, 255, 255, 0.54)" class="flex min-w-[158px] flex-1 flex-col gap-2 rounded-xl p-4 md:p-6 bg-[#f0f2f4]">
                <p class="text-[#111418] text-base font-bold leading-normal">Total Expenses</p>
                <p class="text-[#111418] tracking-light text-xl md:text-2xl font-bold leading-tight">RM {{ $totalExpenses }}</p>
            </div>
            {{-- Total Expenses --}}

            {{-- Budget for the month --}}
            <div style="background: rgba(255, 255, 255, 0.54)" class="flex min-w-[158px] flex-1 flex-col gap-2 rounded-xl p-4 md:p-6 bg-[#f0f2f4]">
                <p class="text-[#111418] text-base font-bold leading-normal">Budget</p>
                <p class="text-[#111418] tracking-light text-xl md:text-2xl font-bold leading-tight">RM {{ $budgetForMonth }}</p>
            </div>
            {{-- Budget for the month --}}
        </div>
        {{-- This Month Info --}}

        {{-- Timeframe --}}
        <h3 style = "color: white" class="text-[#111418] text-md md:text-lg font-bold leading-tight tracking-[-0.015em] px-4 pb-2 pt-4">Timeframe</h3>
        <div class="flex gap-3 p-3 flex-wrap pr-4">
            <a href="{{ route('finance', ['timeframe' => 'today']) }}" class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-xl bg-[#f0f2f4] pl-4 pr-4">
                <p class="text-[#111418] text-base font-bold leading-normal">Today</p>
            </a>
            <a href="{{ route('finance', ['timeframe' => 'this week']) }}" class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-xl bg-[#f0f2f4] pl-4 pr-4">
                <p class="text-[#111418] text-base font-bold leading-normal">This week</p>
            </a>
            <a href="{{ route('finance', ['timeframe' => 'this month']) }}" class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-xl bg-[#f0f2f4] pl-4 pr-4">
                <p class="text-[#111418] text-base font-bold leading-normal">This month</p>
            </a>
            <a href="{{ route('finance', ['timeframe' => 'this year']) }}" class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-xl bg-[#f0f2f4] pl-4 pr-4">
                <p class="text-[#111418] text-base font-bold leading-normal">This year</p>
            </a>
        </div>
        {{-- Timeframe --}}

        {{-- Expenses --}}
        <h3 style = "color: white" class="text-[#111418] text-md md:text-lg font-bold leading-tight tracking-[-0.015em] px-4 pb-2 pt-4">Expenses</h3>
        @foreach($expenses as $expense)
            <div style="background: rgba(255, 255, 255, 0.54); border-radius: 10px" class="flex flex-col md:flex-row items-center gap-4 bg-white px-4 min-h-[72px] py-2 justify-between">
                <div class="flex flex-col justify-center">
                    <p style="font-size: 18px;" class="text-[#111418] text-base font-bold leading-normal line-clamp-1">{{ $expense->expense }}</p>
                    <p class="text-[#111418] text-base font-bold leading-normal line-clamp-2">{{ $expense->date }}</p>
                </div>
                <div class="shrink-0">
                    <p class="text-[#111418] text-base font-bold leading-normal">-RM {{ $expense->amount }}</p>
                </div>
            </div>
            <br>
        @endforeach
        {{-- Expenses --}}
    </div>
</div>
@endsection
