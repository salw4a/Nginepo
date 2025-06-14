@extends('admin.layouts.main')
@section('title', 'Manajemen user')
@section('content')

<div class="p-6">
    <h2 class="text-xl font-semibold mb-4">Manajemen Properti</h2>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 shadow">
            <thead class="bg-[#C49B7F] text-white">
                <tr>
                    <th class="py-3 px-4 border border-gray-300 text-left">No.</th>
                    <th class="py-3 px-4 border border-gray-300 text-left">Email</th>
                    <th class="py-3 px-4 border border-gray-300 text-left">Aktor</th>
                </tr>
            </thead>
            <tbody>
                {{-- Data akan diisi melalui query --}}
            </tbody>
        </table>
    </div>
</div>

@endsection
