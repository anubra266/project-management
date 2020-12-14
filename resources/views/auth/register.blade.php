<x-layout>
    <section class="container px-4 py-24 mx-auto">
        <div class="w-full mx-auto space-y-5 sm:w-8/12 md:w-6/12 lg:w-4/12 xl:w-3/12">
            <h1 class="text-4xl font-semibold text-center text-gray-900">Sign up</h1>
            <div class="pb-6 space-y-2 border-b border-gray-200">
                <a href="#" class="w-full py-3 btn btn-icon btn-google">
                    <x-google-icon></x-google-icon>
                    Continue with Google
                </a>
            </div>
            @if ($errors->any())
            <div class="space-y-2">
                <div class="alert text-red-700 bg-red-100" role="alert"><svg xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
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
            <form class="space-y-4" method="POST" action="{{ route('register') }}">
                @csrf
                <label class="block">
                    <span class="block mb-1 text-xs font-medium text-gray-700">Name</span>
                    <input class="form-input" type="text" placeholder="Your full name" name="name"
                        value="{{ old('name') }}" required autofocus autocomplete="name" />
                </label>
                <label class="block">
                    <span class="block mb-1 text-xs font-medium text-gray-700">Your Email</span>
                    <input class="form-input" type="email" placeholder="Ex. james@bond.com" inputmode="email"
                        name="email" value="{{ old('email') }}" required />
                </label>
                <label class="block">
                    <span class="block mb-1 text-xs font-medium text-gray-700">Create a password</span>
                    <input class="form-input" type="password" placeholder="••••••••" name="password" required
                        autocomplete="new-password" />
                </label>
                <label class="block">
                    <span class="block mb-1 text-xs font-medium text-gray-700">Confirm password</span>
                    <input class="form-input" type="password" placeholder="••••••••" name="password_confirmation"
                        required autocomplete="new-password" />
                </label>
                <div class="flex items-center justify-between">
                    <a href="{{route('login')}}" class="w-full btn btn-sm btn-link sm:w-auto">Already have an account?</a>
                </div>
                <input type="submit" class="w-full btn btn-primary btn-lg" value="Sign Up" />
            </form>
            <p class="my-8 text-xs font-medium text-center text-gray-700">
                By clicking "Sign Up" you agree to our
                <a href="#" class="text-purple-700 hover:text-purple-900">Terms of Service</a>
                and
                <a href="#" class="text-purple-700 hover:text-purple-900">Privacy Policy</a>.
            </p>
        </div>
    </section>


</x-layout>
