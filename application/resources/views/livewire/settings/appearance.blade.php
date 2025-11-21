<div>
    <div class="glassmorphism rounded-2xl p-8 shadow-lg">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-gray-800">{{ __('Appearance') }}</h2>
            <p class="text-gray-600 mt-1">{{ __('Update the appearance settings for your account') }}</p>
        </div>

        <flux:radio.group x-data variant="segmented" x-model="$flux.appearance">
            <flux:radio value="light" icon="sun">{{ __('Light') }}</flux:radio>
            <flux:radio value="dark" icon="moon">{{ __('Dark') }}</flux:radio>
            <flux:radio value="system" icon="computer-desktop">{{ __('System') }}</flux:radio>
        </flux:radio.group>
    </div>
</div>
