<x-app-layout>
    <x-container>
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-8">
                <x-card>
                    <form action="{{ route('status.store') }}" method="post">
                        @csrf
                        <div class="flex">
                            <div class="flex-shrink-0 mr-3">
                                <img class="w-10 h-10 rounded-full" src="https://i.pravatar.cc/150" alt="">
                            </div>
                            <div class="w-full">
                                <div class="font-semibold">
                                    {{ Auth::user()->name }}
                                </div>
                                <div class="my-2">
                                    <textarea name="body"
                                        class="form-textarea w-full border-gray-300 rounded-xl resize-none focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200"
                                        id="body" placeholder="What is on your mind ?"></textarea>
                                </div>
                                <div class="text-right">
                                    <x-button>
                                        Post
                                    </x-button>
                                </div>
                            </div>
                        </div>
                    </form>
                </x-card>
                <div class="space-y-6 mt-5">
                    <div class="space-y-5">
                        @foreach ($statuses as $status)
                        <x-card>
                            <div class="flex">
                                <div class="flex-shrink-0 mr-3">
                                    <img class="w-10 h-10 rounded-full" src="https://i.pravatar.cc/150"
                                        alt="{{ Auth::user()->name }}">
                                </div>
                                <div>
                                    <div class="font-semibold">
                                        {{ $status->user->name }}
                                    </div>
                                    <div class="leading-relaxed">
                                        {{ $status->body }}
                                    </div>
                                    <div class="text-sm text-gray-600">
                                        {{ $status->created_at->diffForHumans() }}
                                    </div>
                                </div>
                            </div>
                        </x-card>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-span-4">
                <x-card>
                    <h1 class="font-semibold mb-5">Recently follows</h1>
                    <div class="space-y-6">
                        @foreach (Auth::user()->follows()->limit(5)->get() as $user)
                        <div class="flex items-center">
                            <div class="flex-shrink-0 mr-3">
                                <img class="w-10 h-10 rounded-full" src="https://i.pravatar.cc/150"
                                    alt="{{ $status->user->name }}">
                            </div>
                            <div>
                                <div class="font-semibold">
                                    {{ $user->name }}
                                </div>
                                <div class="text-sm text-gray-600">
                                    {{ $user->pivot->created_at->diffForHumans() }}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </x-card>
            </div>
        </div>
    </x-container>
</x-app-layout>