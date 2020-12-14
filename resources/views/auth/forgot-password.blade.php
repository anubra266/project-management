<x-layout>
    <section class="bg-gray-100">
        <div class="container px-4 py-20 mx-auto">

            <div
                class="w-full px-0 pt-5 pb-6 mx-auto mt-4 mb-0 space-y-4 bg-transparent border-0 border-gray-200 rounded-lg md:bg-white md:border sm:w-10/12 md:w-8/12 lg:w-6/12 xl:w-4/12 md:px-6 sm:mt-8 sm:mb-5">
                <h1 class="mb-5 text-xl font-light text-left text-gray-800 sm:text-center">
                    Forgot your password?
                </h1>
                <div class="space-y-2">
                    <div class="alert bg-primary-light text-primary" role="alert">Just let us know your email address
                        and we will email you a password reset link that will allow
                        you to choose a new one.</div>

                    @if (session('status'))
                    <div class="alert text-yellow-800 bg-yellow-100" role="alert">{{ session('status') }}</div>
                    @endif
                    @if ($errors->any())
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
                    @endif
                </div>
                <form method="POST" action="{{ route('password.email') }}" class="pb-1 space-y-4">
                    @csrf
                    <label class="block">
                        <span class="block mb-1 text-xs font-medium text-gray-700">Your Email</span>
                        <input class="form-input" type="email" placeholder="Ex. james@bond.com" inputmode="email"
                            name="email" value="{{ old('email') }}" required autofocus />
                    </label>
                    <div class="flex items-center justify-between">

                        <input type="submit" class="btn btn-primary" value="Get Reset Link" />
                    </div>
                </form>
            </div>
            <p class="mb-4 space-y-2 text-sm text-left text-gray-600 sm:text-center sm:space-y-0">
                <a href="{{route('login')}}" class="w-full btn btn-sm btn-link sm:w-auto">Login</a>
                <a href="{{route('register')}}" class="w-full btn btn-sm btn-link sm:w-auto">Create an account</a>
            </p>
        </div>
    </section>

</x-layout>
