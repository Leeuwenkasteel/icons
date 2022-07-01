<x-layout::app>
<x-slot name="header">
    Icons
</x-slot>
<x-table::open name="icons"/>
        <x-table::head>
            <x-table::th name=' '/>
			<x-table::th name='nr'/>
			<x-table::th name='icon'/>
            <x-table::th_actions/>
        </x-table::head>
        <x-table::body>
            @foreach($icons as $item)
                <x-table::tr>
                    <x-table::icon name='{{$item->icon}}'/>
			        <x-table::td name='{{$item->id}}'/>
			        <x-table::td name='{{$item->icon}}'/>
                    <x-table::actions name="icons" slug='{{$item->slug}}'/>
                </x-table::tr>
            @endforeach
        </x-table::body>
    <x-table::close/>
</x-layout::app>