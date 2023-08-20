<form class="w-full max-w-sm">
    <div class="mb-6">
        <label class="block text-gray-500 font-bold mb-1" for="organization-name">Organization name</label>
        <input name="organization-name" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="organization-name" type="text" placeholder="You organization name...">
    </div>
    <div class="mb-6">
        <label class="block text-gray-500 font-bold mb-1" for="email">Email</label>
        <input name="email" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="email" type="email" placeholder="you@email.com">
    </div>
    <div class="mb-6">
        <label for="message" class="block text-gray-500 font-bold mb-1">Message</label>
        <textarea
            id="message"
            rows="6"
            class="resize-none bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" placeholder="Enter you message here..."></textarea>
    </div>
    <div class="md:flex md:items-start">
        <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
            Send
        </button>
    </div>
</form>
