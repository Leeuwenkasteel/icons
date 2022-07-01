<div class="position-relative">
<div class="row mb-3">
  <label for="inputText" class="col-md-3 col-form-label">Icon</label>
  <div class="col-md-9">

    <div class="position-relative">
        <input
            type="text"
            class="form-control"
            placeholder="{{trans('icons::messages.search')}}"
            wire:model="query"
            wire:click="reset"
            wire:keydown.escape="hideDropdown"
            wire:keydown.tab="hideDropdown"
            wire:keydown.Arrow-Up="decrementHighlight"
            wire:keydown.Arrow-Down="incrementHighlight"
            wire:keydown.enter.prevent="selectAccount"
        />

        <input type="hidden" name="icon" id="account" wire:model="selectedAccount">

        @if ($selectedAccount)
            <a class="position-absolute cursor-pointer" style="top:2px; right:2px;" wire:click="reset">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </a>
        @endif
    </div>

    @if(!empty($query) && $selectedAccount == 0 && $showDropdown)
        <div class="absolute dropdown bg-white mt-1 w-full border border-gray-300 rounded-md shadow-lg">
            @if (!empty($accounts))
                @foreach($accounts as $i => $account)
                    <a
                        wire:click="selectAccount({{ $i }})"
                        class="text-decoration-none text-dark {{ $highlightIndex === $i ? 'bg-blue-50' : '' }}"
                    ><i class="{{ $account['icon'] }}"></i> {{ $account['icon'] }}</a><br/>
                @endforeach
            @else
                <span class="block py-1 px-2 text-sm">Geen resultaten</span>
            @endif
        </div>
    @endif
</div>
</div>
</div>