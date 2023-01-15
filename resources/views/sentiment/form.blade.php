@if ($errors->any())
    <div class="lg:w-1/3 bg-sky-600	 rounded-lg p-8 flex flex-col mx-auto w-full mt-10 relative z-10 shadow-md">
        <span class="text-blue-200 font-bold">Sorry, we ran into an issue!</span>
        <ul class="text-white">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="post" action="{{ route('sentiment.check') }}">
    @csrf
    <div class="lg:w-1/3 bg-gray-700 rounded-lg p-8 flex flex-col mx-auto w-full mt-10 relative z-10 shadow-md">
        <h2 class="text-white text-2xl mb-1 font-medium title-font">Sentiment Detection</h2>
        <p class="leading-relaxed mb-5 text-white">Let's detect the amount of sentiment in a given text or string.</p>

        <div class="relative mb-4"
             x-data="{ count: 0 }" x-init="count = $refs.countme.value.length">

            <label for="text" class="leading-7 text-sky-400">Enter Text</label>
            <textarea id="text" name="text" placeholder="Enter your text here"
                      maxlength="180"
                      x-ref="countme" x-on:keyup="count = $refs.countme.value.length"
                      class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-32
                              text-base text-gray-600 outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>

            <div class="text-gray-300">
                Character Count: <span x-html="count"></span> / <span x-html="$refs.countme.maxLength"></span>
            </div>
        </div>

        <button class="text-white bg-sky-600 border-0 py-2 px-6 focus:outline-none hover:bg-sky-700 rounded text-lg">Process Sentiment</button>

        <p class="text-sm text-white mt-3">
            <i>Notes:</i><br>
            <strong>Requirement: text greater than 5 characters, less than 180.</strong><br><br>

            As of now, this returns a very basic
            rating, ranging from: Negative, Positive, and Neutral.
        </p>
    </div>
</form>
