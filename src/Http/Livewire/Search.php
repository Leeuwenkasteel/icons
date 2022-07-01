<?php

namespace Leeuwenkasteel\Icons\Http\Livewire;

use Livewire\Component;
use Leeuwenkasteel\Icons\Models\Icon;
class Search extends Component
{
	public $query= '';
    public array $accounts = [];
    public int $selectedAccount = 0;
    public int $highlightIndex = 0;
    public bool $showDropdown;

    public function mount()
    {
        $this->reset();
    }

    public function reset(...$properties)
    {
        $this->accounts = [];
        $this->highlightIndex = 0;
        $this->query = '';
        $this->selectedAccount = 0;
        $this->showDropdown = true;
    }

    public function hideDropdown()
    {
        $this->showDropdown = false;
    }

    public function incrementHighlight()
    {
        if ($this->highlightIndex === count($this->accounts) - 1) {
            $this->highlightIndex = 0;
            return;
        }

        $this->highlightIndex++;
    }

    public function decrementHighlight()
    {
        if ($this->highlightIndex === 0) {
            $this->highlightIndex = count($this->accounts) - 1;
            return;
        }

        $this->highlightIndex--;
    }

    public function selectAccount($id = null)
    {
        $id = $id ?: $this->highlightIndex;

        $account = $this->accounts[$id] ?? null;

        if ($account) {
            $this->showDropdown = true;
            $this->query = $account['icon'];
            $this->selectedAccount = $account['id'];
        }
    }

    public function updatedQuery()
    {
        $this->accounts = Icon::where('icon', 'like', '%' . $this->query. '%')
            ->get()
            ->toArray();
    }
    public function render()
    {
        return view('icons::livewire.search-icon');
    }
}
