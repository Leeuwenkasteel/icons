<?php

namespace Leeuwenkasteel\Icons\Http\Livewire;

use Leeuwenkasteel\Table\LivewireTable;
use Leeuwenkasteel\Icons\Models\Icon;

class IconTable extends LivewireTable
{
    public $paginate = true;
    public $pagination = 10;
	public $actions = false;
	public $page = 'icons';
	
	public function model(){
        return Icon::class;
    }

    public $fields = [
		[
			'title' => 'Icon',
			'name' => 'icon',
			'icon' => true,
		],[
			'title' => 'Title',
			'name' => 'icon',
		],[
			'title' => 'Slug',
			'name' => 'slug',
		]
	];  
}