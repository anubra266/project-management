<x-layout>
    <section class="bg-gray-100">
        <div class="container px-0 py-20 mx-auto sm:px-4">
            <a href="/" title="PMS Login" class="flex items-center justify-start sm:justify-center">
                <span class="sr-only">PMS</span>
            </a>
            <div
                class="w-full px-4 pt-5 pb-6 mx-auto mt-8 mb-6 bg-white rounded-none shadow-xl sm:rounded-lg sm:w-10/12 md:w-8/12 lg:w-6/12 xl:w-4/12 sm:px-6">
                <h1 class="mb-4 text-lg font-semibold text-left text-gray-900">
                    Reset your Password
                </h1>

                @if ($errors->any())
                <div class="space-y-2">
                    <div class="alert text-red-700 bg-red-100" role="alert"><svg xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="4.93" y1="4.93" x2="19.07" y2="19.07"></line>
                        </svg> <span>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </span></div>
                </div>
                @endif
                <form class="mb-8 space-y-4" method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    <label class="block">
                        <span class="block mb-1 text-xs font-medium text-gray-700">Your Email</span>
                        <input class="form-input" type="email" name="email" value="{{ old('email', $request->email) }}"
                            placeholder="Ex. james@bond.com" inputmode="email" required autofocus />
                    </label>
                    <label class="block">
                        <span class="block mb-1 text-xs font-medium text-gray-700">Your Password</span>
                        <input class="form-input" type="password" name="password" required autocomplete="new-password"
                            placeholder="••••••••" required />
                    </label>
                    <label class="block">
                        <span class="block mb-1 text-xs font-medium text-gray-700">Confirm Password</span>
                        <input class="form-input" type="password" name="password_confirmation" required
                            autocomplete="new-password" placeholder="••••••••" required />
                    </label>

                    <input type="submit" class="w-full py-3 mt-1 btn btn-primary" value="Login" />
                </form>
            </div>

        </div>
    </section>
</x-layout>
