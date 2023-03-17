<div>
        @if (session()->has('message'))
        <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
            <p class="font-bold">Success</p>
            <p class="text-sm">{{ session('message') }}</p>
        </div>
        @endif

    <div class="pl-6 pt-6">
        <h1>{{ $title }}</h1>
    </div>
    <div class="p-6">
        <button wire:click="getForceFullyDataFromApi" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-2 float-right">
        <span wire:loading>
            Fetching from server...
        </span>
        <span wire:loading.remove>
            Force Load From Api
        </span>
        </button>
        <table class="table-auto border min-w-full">
            <thead>
                <tr>
                    @foreach($headers as $header)
                    <th class="font-bold p-2 border-b text-left">{{ $header }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr >
                    <td class="p-2 border-b text-left">{{ $user->id }}</td>
                    <td class="p-2 border-b text-left">{{ $user->name }}</td>
                    <td class="p-2 border-b text-left">{{ $user->lname }}</td>
                    <td class="p-2 border-b text-left">{{ $user?->email }}</td>
                    <td class="p-2 border-b text-left">{{ $user?->created_at?->format('Y-m-d') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
