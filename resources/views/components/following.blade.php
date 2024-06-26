@foreach ($users as $user)
<x-card>
    <div class="flex items-center">
        <div class="flex-shrink-0 mr-3">
            <img class="w-10 h-10 rounded-full" src="{{ $user->gravatar() }}" alt="{{ $user->name }}">
        </div>
        <div>
            <div class="font-semibold">
                {{ $user->name }}
            </div>
            @if(request()->routeIs('users.index'))
            <div class="mt-2">
                <form action="{{ route('following.store', $user->username) }}" method="post">
                    @csrf
                    <x-button>
                        @if(Auth::user()->follows()->where('following_user_id', $user->id)->first())
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-person-x-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m6.146-2.854a.5.5 0 0 1 .708 0L14 6.293l1.146-1.147a.5.5 0 0 1 .708.708L14.707 7l1.147 1.146a.5.5 0 0 1-.708.708L14 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L13.293 7l-1.147-1.146a.5.5 0 0 1 0-.708" />
                        </svg>
                        <span class="mx-2">Unfollow</span>
                        @else
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-person-plus" viewBox="0 0 16 16">
                            <path
                                d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                            <path fill-rule="evenodd"
                                d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5" />
                        </svg>
                        <span class="mx-2">Follow</span>
                        @endif
                    </x-button>
                </form>
            </div>
            @endif
            <div class="text-sm text-gray-600">
                @if($user->pivot)
                {{ $user->pivot->created_at->diffForHumans() }}
                @endif
            </div>
        </div>
    </div>
</x-card>
@endforeach