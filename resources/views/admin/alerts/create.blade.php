@extends('layouts.admin')

{{-- Page header section with dashboard title --}}
@section('header')
    <h2 class="font-semibold text-xl text-gray-100 leading-tight">
        {{ __('Alert Manage') }}
    </h2>
@endsection

{{-- Main dashboard content section --}}
@section('content')
    <div class="max-w-3xl mx-auto py-8">
    <div class="bg-gray-900 rounded-lg shadow p-6">
        <form method="POST" action="{{ route('admin.alerts.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-300 font-semibold mb-2">Title</label>
                <input
                    type="text"
                    name="title"
                    required
                    value="{{ old('title') }}"
                    class="w-full px-4 py-2 bg-gray-800 text-white border border-gray-600 rounded focus:ring-2 focus:ring-pink-500 focus:outline-none">
            </div>



            <div class="mb-4">
                <label class="block text-gray-300 font-semibold mb-2">Address</label>
            </div>

            <x-map />

            <div class="mb-4 mt-4">
                <label for="description" class="block text-sm font-medium text-white mb-1">Description</label>
                <textarea
                    name="description"
                    id="description"
                    class="w-full h-[120px] px-4 py-2 border bg-gray-800 text-white rounded-md focus:ring focus:ring-blue-200 focus:outline-none"
                    >{{ old('description') }}</textarea>
            </div>

            <!-- Type -->
            <div class="mb-4 mt-4">
                <label for="type" class="block text-gray-300 font-semibold mb-2">Type</label>
                <select
                    id="type"
                    name="type"
                    required
                    class="w-full px-4 py-2 bg-gray-800 text-white border border-gray-600 rounded focus:ring-2 focus:ring-pink-500 focus:outline-none">
                    <option value="">-- Select type --</option>
                    <option value="1" {{ old('type') == '1' ? 'selected' : '' }}>Flood</option>
                    <option value="2" {{ old('type') == '2' ? 'selected' : '' }}>Storm</option>
                    <option value="3" {{ old('type') == '3' ? 'selected' : '' }}>Earthquake</option>
                    <option value="4" {{ old('type') == '4' ? 'selected' : '' }}>Fire</option>
                    <option value="5" {{ old('type') == '5' ? 'selected' : '' }}>Other</option>
                </select>
            </div>

            <!-- Severity -->
            <div class="mb-4">
                <label for="severity" class="block text-gray-300 font-semibold mb-2">Severity</label>
                <select
                    id="severity"
                    name="severity"
                    required
                    class="w-full px-4 py-2 bg-gray-800 text-white border border-gray-600 rounded focus:ring-2 focus:ring-pink-500 focus:outline-none">
                    <option value="">-- Select severity --</option>
                    <option value="1" {{ old('severity') == '1' ? 'selected' : '' }}>Low</option>
                    <option value="2" {{ old('severity') == '2' ? 'selected' : '' }}>Medium</option>
                    <option value="3" {{ old('severity') == '3' ? 'selected' : '' }}>High</option>
                    <option value="4" {{ old('severity') == '4' ? 'selected' : '' }}>Critical</option>
                </select>
            </div>


            <div class="flex gap-2">
                <button
                    type="submit"
                    class="bg-pink-600 text-white px-4 py-2 rounded hover:bg-pink-700 transition">
                    Create
                </button>
                <button
                    type="button"
                    data-confirm-cancel
                    data-redirect-url="#"
                    class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700 transition">
                    Cancel
                </button>
            </div>
        </form>
    </div>
</div>

@endsection

@section('footer')
@endsection