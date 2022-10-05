<x-layout>

    <section class="container py-8 j">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 p-6 rounded-xl">
            <h1 class="text-center font-bold">LOG IN</h1>
            <form method="POST" action="/{{app()->getLocale()}}/login" class="mt-10 ">
                @csrf

                <x-form_input name="username"/>


                <x-form_input name="password" type="password"/>


                <div class="mb-6 ">
                    <button type="submit"
                            class="bg-blue-400 rounded py-2 px-4 hover:bg-blue-500">
                        Log In
                    </button>
                </div>

            </form>
        </main>
    </section>
</x-layout>
