<script src="https://cdn.tailwindcss.com"></script>
<form wire:submit.prevent="submit">
    {{ $this->form }}

    <button type="submit">
        Submit
    </button>
</form>
