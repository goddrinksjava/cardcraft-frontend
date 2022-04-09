@props(['name', 'score'])

<div class="flex flex-col w-[200px] rounded-lg bg-white shadow-lg justify-center">
    <img class="  h-[300px]  rounded-t-lg" src="https://dummyimage.com/400x600/000/fff" alt="" />
    <div class="p-2 flex flex-col justify-start">
        <div class=" mb-2">
            <span
                class="bg-blue-100 text-blue-800 text-xs font-semibold  px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">{{ $score }}</span>
        </div>
        <h5 class="text-gray-900 text-xl font-medium">{{ $name }}</h5>
    </div>

</div>
