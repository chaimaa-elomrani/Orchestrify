@if(auth()->check() && auth()->user()->isChef())
    {{ $slot }}
@else
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded" role="alert">
        <strong class="font-bold">Access Denied!</strong>
        <span class="block sm:inline">You don't have permission to view this content.</span>
    </div>
@endif