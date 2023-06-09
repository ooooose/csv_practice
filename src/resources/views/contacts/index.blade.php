<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            お問合せ一覧
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class='flex'>
                        <form method='get' action="{{ route('create') }}">
                            <div class="p-2 w-full">
                                <button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">新規作成</button>
                            </div>
                        </form>
                        <form method='get' action="{{ route('csvDownload') }}">
                            <div class="p-2 w-full">
                                <button class="flex mx-auto text-white bg-gray-500 border-0 py-2 px-8 focus:outline-none hover:bg-gray-600 rounded text-lg">一覧をCSV出力する</button>
                            </div>
                        </form>
                    </div>
                    <div class="lg:w-2/3 w-full mx-auto overflow-auto mb-2">
                        <table class="table-auto w-full text-left whitespace-no-wrap">
                            <thead>
                            <tr>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">ID</th>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">氏名</th>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">タイトル</th>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">登録日</th>
                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">詳細</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contacts as $contact)
                                <tr>
                                    <td class="border-gray-200 px-4 py-3">{{ $contact->id }}</td>
                                    <td class="border-gray-200 px-4 py-3">{{ $contact->name }}</td>
                                    <td class="border-gray-200 px-4 py-3">{{ $contact->title }}</td>
                                    <td class="border-gray-200 px-4 py-3 text-lg text-gray-900">{{ $contact->created_at }}</td>
                                    <td class="border-gray-200 px-4 py-3 text-lg text-gray-900"><a class="text-blue-500" href="{{ route('show', ['id' => $contact->id]) }}">詳細をみる</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $contacts->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
