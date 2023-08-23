<form class="w-full max-w-sm" action="/contacts/" onsubmit="handleFeedbackSubmit(this); return false;">
    @csrf
    <div class="">
        <label class="block text-gray-500 font-bold mb-1" for="name">Organization name</label>
        <input name="name" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="organization-name" type="text" placeholder="You organization name...">
    </div>
    <div class="mt-6">
        <label class="block text-gray-500 font-bold mb-1" for="email">Email</label>
        <input
            name="email"
            id="email"
            type="email"
            placeholder="you@email.com"
            required
            class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
        >
    </div>
    <div class="mt-6">
        <label for="message" class="block text-gray-500 font-bold mb-1">Message</label>
        <textarea
            id="message"
            name="message"
            rows="6"
            class="resize-none bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" placeholder="Enter you message here..."></textarea>
    </div>
    <div class="js-feedback-response text-sm"></div>
    <div class="mt-6 md:flex md:items-start">
        <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
            Send
        </button>
    </div>
</form>
<script>
    function handleFeedbackSubmit(form)
    {
        let xhr = new XMLHttpRequest();
        xhr.open('POST', '/feedbacks/store', true);
        xhr.onreadystatechange = () => {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                let response = JSON.parse(xhr.response);
                let container = document.querySelector('.js-feedback-response');

                container.innerHTML = response.message;
                if (response.success) {
                    container.classList.remove('text-red-600');
                    container.classList.add('text-green-600');
                } else {
                    container.classList.remove('text-green-600');
                    container.classList.add('text-red-600');
                }
            }
        };
        xhr.send(new FormData(form));
        return false;
    }
</script>
