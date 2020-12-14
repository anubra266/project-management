<x-layout>
    <section class="container px-4 py-24 mx-auto">
        <div class="grid items-center w-full grid-cols-1 gap-10 mx-auto md:w-4/5 lg:grid-cols-1 xl:gap-32">
            <div>
                @if (session('status') == 'verification-link-sent')
                <div class="space-y-2">
                    <div class="alert bg-primary-light text-primary" role="alert">
                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                    </div>
                </div>
                @endif
                <h1
                    class="mb-4 text-2xl font-extrabold leading-tight tracking-tight text-left text-gray-900 md:text-4xl">
                    Thanks for signing up!
                </h1>
                <p class="mb-5 text-base text-left text-gray-800 md:text-xl">
                    Before getting started, could you verify your email address by clicking on the link we just emailed
                    to you? If you didn't receive the email, we will gladly send you another.
                </p>
                <div class="grid items-center w-full grid-cols-2 gap-10 mx-auto md:w-4/5">

                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="w-full mb-2 btn btn-lg btn-light sm:w-auto sm:mb-0">Resend
                            Verification
                            Email</button>
                    </form>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit" class="w-full mb-2 btn btn-lg btn-white sm:w-auto sm:mb-0">Logout</button>
                    </form>
                </div>


            </div>

        </div>
    </section>

</x-layout>
