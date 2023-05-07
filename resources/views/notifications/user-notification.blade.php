<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @foreach (auth()->user()->unreadnotifications as $notification )
                        <div class="bg-gray-100 p-3 m-2" style="padding:3px;margin:2px;">
                            <b>{{$notification->data['name']}}  </b> started following you !!!
                            <a href="{{route('notification.mark-read',['id'=>$notification->id])}}" style="padding:2px"class="p-2 bg-red-800 text-white rounded-lg">Mark as read</a>
                            <a href="{{route('notification.remove-notification',['id'=>$notification->id])}}" style="padding:2px"class="p-2 bg-red-800 text-white rounded-lg">Delete Notification</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
