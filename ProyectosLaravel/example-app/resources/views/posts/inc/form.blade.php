<x-session-status class="mb-4" :status="session('status')" />
                    <form action="{{route('posts.store')}}" method="POST">
                        @csrf
                        Formularios
                        <div class="mt-4">
                            <x-input-label for="body" :value="__('Body')" />

                            <x-textarea class="block mt-1 w-full" name="body" require/>

                            <div class="flex justify-end mt-4">
                                <x-primary-button>
                                    {{ __('Save') }}
                                </x-primary-button>
                            </div>
                        </div>
                    </form>