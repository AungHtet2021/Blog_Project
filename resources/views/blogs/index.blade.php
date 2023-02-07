{{-- @dd($blogs) --}}

<x-layout>
    {{-- @dd(auth()->user()->name); --}}
    @if (session('success'))
    <div class="alert alert-primary text-center">{{session('success')}}</div>
    @endif
    <x-hero />
    <x-blogs-section :blogs="$blogs"/>
    <x-subscribe />
</x-layout>

