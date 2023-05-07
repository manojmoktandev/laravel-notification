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
                    {{ __("You're logged in!") }}
                </div>
                @foreach (auth()->user()->unreadnotifications as $notification )
                <div class="bg-gray-100 p-3 m-2" style="padding:3px;margin:2px;">
                    <b>{{$notification->data['name']}}  </b> started following you !!!
                    <a href="{{route('database.notification-mark-read',['id'=>$notification->id])}}" style="padding:2px"class="p-2 bg-red-800 text-white rounded-lg">Mark as read</a>
                    <form action="{{ route('database.remove-notification', ['id'=>$notification->id,'user_id'=>$notification->data['user_id']]) }}" method="POST">
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                        <button type="submit" class="btn btn-sm btn-danger" style ="background-color:indianred !important" data-toggle="tooltip" title='Delete'>Delete Notification</button>
                    </form>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
